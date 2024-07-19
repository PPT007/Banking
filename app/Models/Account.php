<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'address',
        'account_number',
        'balance'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
         $model->account_number = static::generateAccountNumber();
        });
    }

    private static function generateAccountNumber(){
        do {
            $number = mt_rand(1000000000, 9999999999);
        } while (static::where('account_number', $number)->exists());

        return $number;
    }
}
