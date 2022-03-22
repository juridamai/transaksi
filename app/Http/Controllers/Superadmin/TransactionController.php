<?php


namespace App\Http\Controllers\Superadmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\Product;
use App\Models\Customer;

use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class TransactionController extends Controller
{
    public function index(){
        //untuk list transaction
        Session::put('title','Data Transaksi');

        $transaction = Transaction::select('transactions.*','customers.name')
            ->join('customers','customers.id','=','transactions.customer_id')->get();

        return view('superadmin/content/transaction/list',compact('transaction'));
    }

    public function detail($id){
        Session::put('title','Detail Transaksi');

        $transaction = Transaction::select('transactions.*','customers.name')
            ->join('customers','customers.id','=','transactions.customer_id')
            ->where('transactions.id',$id)
            ->first();

        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('products','products.id','=','items.product_id')
            ->where('transactions.id',$id)
            ->get();

        return view('superadmin/content/transaction/detail',compact('transaction','item'));
    }

    public function add(){
        Session::put('title','Tambah Transaksi Baru');
        $product = Product::all();
        $customer = Customer::all();
        return view('superadmin/content/transaction/add',compact('product','customer'));
    }

    public function store(Request $request){
        //insert ke dua table

        DB::beginTransaction();

        try{
            //semua proses insert
            $send = $request->send;
            $customer_id = $request->customer_id;

            $transaction = new Transaction();
            $transaction->date = date('Y-m-d H:i:s');
            $transaction->customer_id = $customer_id;
            $transaction->save();


            foreach ($send as $i){
                $product = Product::where('id',$i['product_id'])->first();
                $subtotal = $product->price * intval($i['product_qty']);

                $item = new Item();
                $item->qty = intval($i['product_qty']);
                $item->price = $subtotal;
                $item->transaction_id = $transaction->id;
                $item->product_id = intval($i['product_id']);
                $item->save();
            }

            DB::commit();
            return redirect(route('superadmin.transaction.index'))->with('pesan-berhasil','Anda berhasil menambah data transaksi');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect(route('superadmin.transaction.index'))->with('pesan-gagal','Anda gagal menambah data transaksi');
        }
    }


}
