<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class TitleSource extends Model
{
    protected $guarded=['_token'];
    public function category()
    {
        return $this->belongsTo('App\AdminModel\TitleCategory','typeid');
    }
}
