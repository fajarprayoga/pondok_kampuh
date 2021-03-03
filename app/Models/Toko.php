<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
      //inisialisasi nama tabel
      protected $table = 'toko';
      //allow tabel yg boleh di isi
      protected $fillable= ['logo', 'name', 'address', 'facebook', 'instagram', 'twitter'];
}
