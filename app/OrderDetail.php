<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'produtc_id',
                         'unitprice', 'quantity', 
                         'amount', 'discount' ];
}
