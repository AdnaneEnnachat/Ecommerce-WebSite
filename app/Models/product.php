<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'nameProduct',
        'prix',
        'category_name',
        'description',
        'quantiteStock',
        'image',
        'status',
        'slug'
    ] ;
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name', 'name');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_numero')
            ->withPivot('quantite', 'price');
    }
}
