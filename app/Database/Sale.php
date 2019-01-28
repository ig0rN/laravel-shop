<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Trackable;

class Sale extends Model
{
    use SoftDeletes;
    use Trackable;

    protected $guarded = ['id'];
    protected $dates = ['end_date', 'deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
