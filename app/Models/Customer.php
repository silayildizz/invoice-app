<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guard = 'customer';
    protected $fillable = ['name', 'email', 'phone','address'];
    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
