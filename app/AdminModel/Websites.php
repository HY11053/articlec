<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    protected $fillable=['weburl','webname','isused'];
}
