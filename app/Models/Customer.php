<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // eğer factories kullanıyorsan HasFactory kalabilir
    // use HasFactory;

    protected $table = 'customers'; // tablo adın buysa sorun yok; farklıysa düzelt
    protected $fillable = ['name', 'email', 'phone']; // <-- ÖNEMLİ
    // timestamps kullanıyorsan migration'da $table->timestamps(); olmalı
}

