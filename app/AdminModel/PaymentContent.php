<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class PaymentContent extends Model
{
    protected $fillable=['typeid','content','write'];

    public function category()
    {
        return $this->belongsTo('App\AdminModel\PaymentCategory','typeid');
    }
}
