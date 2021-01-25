<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'identity', 'code', 'status', 'payment_method', 'date'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sales')
                    ->withPivot('qty', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
