<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoiceNo', 'customer', 'date', 'dueDate', 'status', 'paymentMethod', 'pdfPassword', 'invoice_discount_amount', 'invoice_discount_percent',
    ];
    protected $dates=['deleted_at'];

//    public function categories()
//    {
//        return $this->belongsToMany('App\Category');
//    }
//
    public function items()
    {
        return $this->hasMany('App\Item');
    }


}
