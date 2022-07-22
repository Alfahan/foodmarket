<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'foodId',
        'userId',
        'quantity',
        'total',
        'status',
        'payment_url'
    ];

    public function food()
    {
        return $this->hashOne(Food::class, 'id', 'food_id');
    }

    public function user()
    {
        return $this->hashOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAtAttribute($value) 
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value) 
    {
        return Carbon::parse($value)->timestamp;
    }
    
}
