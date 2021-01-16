<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    //inisialisasi nama tabel
    protected $table = 'images';
    //allow tabel yg boleh di isi
    protected $fillable= ['name', 'product'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
