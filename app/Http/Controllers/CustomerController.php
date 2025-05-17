<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCustomerRequest;

use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Customer;



class CustomerController extends Controller
{
    


    public function create(Request $request)
    {

        // $customers = Customer::get();

        $customers = Auth::user()->customers;
        
        return view('customer.add', [
            'user' => $request->user(),'customers'=>$customers
        ]);
    }




    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());

        // die;
    
        return redirect()->route('customer.add')->with('success', 'Customer added successfully!');
    }


    public function edit(string $id)
    {

        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));

    
        //
    }


    public function update(StoreCustomerRequest $request, $id)
    {
        
        $customer = Customer::findOrFail($id);
        $customer->update($request->validated());
    
        return redirect()->route('customer.edit', $id)->with('success', 'Customer updated successfully!');
    }
    



        public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.add')->with('success', 'Customer deleted successfully.');
    }



   

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store1(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  


    

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
   
}
