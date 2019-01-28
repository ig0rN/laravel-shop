<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Trackable;

class Product extends Model
{
    use SoftDeletes;
    use Trackable;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


    public function getRealPriceAttribute()
    {
        if ($this->onSale()) {
            return "On Sale: " .$this->price * ((100 - $this->sale->discount) / 100);
        }
        return $this->price;
    }

    public function onSale()
    {
        if ($this->sale_id != null) {
            if (!$this->sale->end_date->isPast()) {
                return true;
            }
        }
        return false;
    }

    public function scopeAvailableForSale($query)
    {
        return $query->where('sale_id', NULL)->get();
    }

    public function getCategoryName()
    {
        return $this->category->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
