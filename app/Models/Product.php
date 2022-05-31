<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;

use App\Filters\QueryFilter;
use App\Traits\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    use HasFactory, Price;

    protected $guarded = [];

    public function scopeFilter(Builder $builder,QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
