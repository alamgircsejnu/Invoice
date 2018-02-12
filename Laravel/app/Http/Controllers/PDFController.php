<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Customer;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function InvoicePDF($id)
    {
        $invoice = Invoice::find($id);
        $customer = Customer::find($invoice->customer);
        $invoice->customer = $customer;
        $view = view('Pages.PDF.invoice', compact('invoice'))->render();
        $pdf = \PDF::loadHTML($view)->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->download('invoice.pdf');
    }
}
