<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customerName', 'streetAddress', 'streetAddress2', 'city', 'state', 'zipCode', 'country', 'phoneNumber', 'faxNumber', 'mobileNumber', 'emailAddress', 'webAddress', 'vatId','taxesCode','crmId',
    ];
    protected $dates=['deleted_at'];
}
