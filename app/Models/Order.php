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
    protected $fillable= ['users_id', 'code','destination', 'status', 'total', 'name', 'email', 'image', 'phone', 'courier', 'service', 'postcode', 'notif'];
    
    
    public function orderDetail()
    {
        return $this->belongsToMany(Product::class, 'orderdetail', 'order_id', 'product_id')
        ->withPivot([
            'quantity',
            'price'
        ]);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // public function product()
    // {
    //     # code...
    // }
}
