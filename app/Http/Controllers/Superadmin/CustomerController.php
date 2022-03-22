<?php


namespace App\Http\Controllers\Superadmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        //untuk list customer
        Session::put('title','Data Customer');

        $customer = Customer::all();

        return view('superadmin/content/customer/list',compact('customer'));
    }


    public function add(){
        //menampilkan form tambah
        Session::put('title','Tambah Data Customer');
        return view('superadmin/content/customer/add');
    }



    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;

        try {
            $customer->save();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.customer.index'))->with('pesan-berhasil','Anda berhasil menambah data customer');
        }catch (\Exception $e){
            //pesan notifikasi tidak sukses
            //redirect
            return redirect(route('superadmin.customer.index'))->with('pesan-gagal','Anda gagal menambah data customer');
        }

    }

    public function edit($id){
        //menampilkan form ubah
        Session::put('title','Ubah Data Customer');
        $customer = Customer::findOrFail($id);
        return view('superadmin/content/customer/edit',compact('customer'));
    }

    public function update(Request $request){
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;

        try {
            $customer->save();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.customer.index'))->with('pesan-berhasil','Anda berhasil mengubah data customer');
        }catch (\Exception $e){
            //pesan notifikasi tidak sukses
            //redirect
            return redirect(route('superadmin.customer.index'))->with('pesan-gagal','Anda gagal mengubah data customer');
        }
    }

    public function delete($id){
        //pastikan ada data
        $customer = Customer::findOrFail($id);
        try {
            $customer->delete();
            return redirect(route('superadmin.customer.index'))->with('pesan-berhasil','Anda berhasil menghapus data customer');
        }catch (\Exception $e){
            return redirect(route('superadmin.customer.index'))->with('pesan-gagal','Anda gagal menghapus data customer');
        }
    }
}
