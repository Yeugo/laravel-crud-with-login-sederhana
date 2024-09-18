<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getCustomers() {
        $customers = Customer::all();
        return view('customers.list')->with(compact('customers'));
    }

    public function createCustomer() {
        return view('customers.form');
    }

    public function insertCustomer(Request $request) {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->age = $request->age;

        $customer->save();

        return redirect('/dashboard');
    }

    public function showFormUpdate($customer_id) {
        $customer = Customer::find($customer_id);

        return view('customers.edit')->with(compact('customer'));
    }

    public function updateCustomer(Request $request, $customer_id) {
        $customer = Customer::find($customer_id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->age = $request->age;

        $customer->save();        

        return redirect('/dashboard');
    }

    public function deleteCustomer($customer_id) {
        Customer::where('id',$customer_id)->delete();

        return redirect('/dashboard');
    }
}
