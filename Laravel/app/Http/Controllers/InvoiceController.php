<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Customer;
use App\Product;
use App\Item;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('items')->get();
        $customers = array();
        foreach ($invoices as $invoice){
        $customer = Customer::find($invoice->customer);
        $customers[] = $customer->customerName;
        }
        return view('Pages.Invoice.index', compact('invoices','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('customerName', 'id')->toArray();
        $products = Product::get();
        return view('Pages.Invoice.create', compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $invoice = Invoice::create($request->all());

        $invoiceId = $invoice->id;
//        --------------------- Save Images ----------------------------
        if (isset($request->item) && !empty($request->item)) {
            $count = count($request->item);
            for ($i=0;$i<$count;$i++) {
                $itemData = new Item();
                $itemData->item = $request->item[$i];
                $itemData->quantity = $request->quantity[$i];
                $itemData->price = $request->price[$i];
                $itemData->discount = $request->discount[$i];
                $itemData->taxRate = $request->taxRate[$i];
                $itemData->expense = $request->expense[$i];
                $itemData->description = $request->description[$i];
                $itemData->invoice_id = $invoiceId;
                $itemData->save();
            }
        }
        return redirect('invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editInvoice = Invoice::with('items')->find($id);
        $customer = Customer::find($editInvoice->customer);
        $editInvoice->customer = $customer->id;
        $editInvoice->customerName = $customer->customerName;
        $editInvoice->streetAddress = $customer->streetAddress;
        $editInvoice->phoneNumber = $customer->phoneNumber;
        $editInvoice->emailAddress = $customer->emailAddress;
        $customers = Customer::pluck('customerName', 'id')->toArray();
        $products = Product::get();
//        dd($editInvoice);
        return view('Pages.Invoice.edit', compact('editInvoice','customers','products'));
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
//        dd($request);
        $updateInvoice = Invoice::find($id);
        //dd($updateArticle);
        $updateInvoice->invoiceNo         = $request->invoiceNo;
        $updateInvoice->customer     = $request->customer;
        $updateInvoice->date       = $request->date;
        $updateInvoice->dueDate       = $request->dueDate;
        $updateInvoice->status  = $request->status;
        $updateInvoice->paymentMethod  = $request->paymentMethod;
        $updateInvoice->pdfPassword  = $request->pdfPassword;
        $updateInvoice->invoice_discount_amount  = $request->invoice_discount_amount;
        $updateInvoice->invoice_discount_percent  = $request->invoice_discount_percent;

        $updateInvoice->update();
        $item = Item::where('invoice_id','=',$updateInvoice->id)->delete();
        if (isset($request->item) && !empty($request->item)) {
            $count = count($request->item);
            for ($i=0;$i<$count;$i++) {
                $itemData = new Item();
                $itemData->item = $request->item[$i];
                $itemData->quantity = $request->quantity[$i];
                $itemData->price = $request->price[$i];
                $itemData->discount = $request->discount[$i];
                $itemData->taxRate = $request->taxRate[$i];
                $itemData->expense = $request->expense[$i];
                $itemData->description = $request->description[$i];
                $itemData->invoice_id = $updateInvoice->id;
                $itemData->save();
            }
        }
        return redirect('invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteInvoice = Invoice::find($id);
        foreach ($deleteInvoice->items as $invoiceItem) {
            if (isset($invoiceItem->item) && !empty($invoiceItem->item)) {
                $invoiceItem->delete();
            }
        }
        $deleteInvoice->delete();

        return redirect('invoice');
    }
}
