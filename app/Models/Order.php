<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'full_name',
        'phone',
        'message',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
