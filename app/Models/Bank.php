<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
        //inisialisasi nama tabel
        protected $table = 'Bank';
        //allow tabel yg boleh di isi
        protected $fillable= ['name', 'owner', 'account_number'];
}
