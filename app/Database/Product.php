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

    public function getCategoryName()
    {
        return $this->category->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
