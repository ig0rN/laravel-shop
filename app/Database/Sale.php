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
    protected $dates = ['deleted_at'];
}
