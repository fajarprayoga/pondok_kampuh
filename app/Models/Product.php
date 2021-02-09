<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable= ['name', 'slug', 'category_id', 'price', 'stock', 'weight', 'description', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
     
    public function image()
    {
        return $this->hasMany('App\Models\Images');
    }
    public function size()
    {
        return $this->hasMany('App\Models\Size');
    }
}
