<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    //inisialisasi nama tabel
    protected $table = 'size';
    //allow tabel yg boleh di isi
    protected $fillable= ['name', 'product_id', 'stock'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
