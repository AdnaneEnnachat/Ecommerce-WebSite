<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'numero';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_numero', 'numero');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_numero', 'product_id')
            ->withPivot('quantite', 'price');
    }
}
