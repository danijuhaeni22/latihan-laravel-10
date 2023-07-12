<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(){
        $customers = Customer::all();
        return view('customers.index', compact(['customers']));
    }

    function create(){
        return view('customers.create');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required'
        ]);
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        return redirect('/customers')->with('success', 'Data customer berhasil ditambahkan');
    }

    function edit($id){
        $customer = Customer::find($id);
        return view('customers.edit', compact(['customer']));
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        return redirect('/customers')->with('success', 'Data customer berhasil diubah');
    }

    function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Data customer berhasil di hapus');
    }
}
