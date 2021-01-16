<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //inisialisasi nama tabel
    protected $table = 'category';
    //allow tabel yg boleh di isi
    protected $fillable= ['name', 'slug'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
