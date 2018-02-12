<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('Pages.Customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Customer::create($request->all());
        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json(['success'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCustomer = Customer::find($id);
        return view('Pages.Customer.edit', compact('editCustomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateCustomer = Customer::find($id);
        $updateCustomer->customerName = $request->customerName;
        $updateCustomer->streetAddress = $request->streetAddress;
        $updateCustomer->streetAddress2 = $request->streetAddress2;
        $updateCustomer->city = $request->city;
        $updateCustomer->state = $request->state;
        $updateCustomer->state = $request->state;
        $updateCustomer->zipCode = $request->zipCode;
        $updateCustomer->country = $request->country;
        $updateCustomer->phoneNumber = $request->phoneNumber;
        $updateCustomer->faxNumber = $request->faxNumber;
        $updateCustomer->mobileNumber = $request->mobileNumber;
        $updateCustomer->emailAddress = $request->emailAddress;
        $updateCustomer->webAddress = $request->webAddress;
        $updateCustomer->vatId = $request->vatId;
        $updateCustomer->taxesCode = $request->taxesCode;
        $updateCustomer->crmId = $request->crmId;

        $updateCustomer->update();
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCustomer = Customer::find($id);
        $deleteCustomer->delete();

        return redirect('customer');
    }
}
