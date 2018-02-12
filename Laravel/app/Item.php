<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item', 'quantity', 'price', 'discount', 'taxRate', 'expense', 'description', 'invoiceId',
    ];
    public function invoices()
    {
        return $this->belongsTo('App\Invoice');
    }
}
