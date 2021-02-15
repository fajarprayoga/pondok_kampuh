<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //inisialisasi nama tabel
    protected $table = 'order';
    //allow tabel yg boleh di isi
    protected $fillable= ['users_id', 'destination', 'status', 'total'];
    
    
    public function orderDetail()
    {
        return $this->belongsToMany(Product::class, 'orderdetail', 'order_id', 'product_id')
        ->withPivot([
            'quantity',
            'price'
        ]);
    }
}