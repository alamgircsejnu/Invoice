<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productId', 'productName', 'productCategory', 'quantity', 'price', 'gst_price', 'supplier', 'expenseType', 'amount', 'gst_exp', 'profit', 'gst_payable', 'recProduct',
    ];
    protected $dates=['deleted_at'];

//    public function categories()
//    {
//        return $this->belongsToMany('App\Category');
//    }
//
    public function images()
    {
        return $this->hasMany('App\Image');
    }
//
//    public function comments()
//    {
//        return $this->hasMany('App\Comment');
//    }
//    public function reply_comments()
//    {
//        return $this->hasManyThrough('App\ReplyComments', 'App\Comment');
//    }
}
