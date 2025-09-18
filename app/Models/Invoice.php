<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model

{
    protected $fillable = ['invoice_number','customer','email','amount','status','type','user_id'];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}