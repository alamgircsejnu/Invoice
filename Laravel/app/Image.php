<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_name', 'product_id',
    ];
    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
