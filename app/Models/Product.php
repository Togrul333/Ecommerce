<?php

namespace App\Models;

use App\Traits\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Price;

    protected $guarded = [];

    public function category()
    {
      return  $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return  $this->belongsTo(Brand::class);
    }
}
