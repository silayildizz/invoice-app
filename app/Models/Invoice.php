<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model

{
    protected $fillable = ['invoice_number','customer','amount','status','type'];

    
}