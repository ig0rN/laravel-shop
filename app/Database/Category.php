<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function edited_by()
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    public function deleted_by()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
