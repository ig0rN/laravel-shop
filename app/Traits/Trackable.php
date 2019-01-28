<?php 

namespace App\Traits;

use App\Database\User;
use Carbon\Carbon;

trait Trackable
{
    // THIS METHOD SHOULD BE USED IN EVERY MODEL THAT IS PART OF SHOP(categories, products, sales)
    public function belongToShop()
    {
        return $this->shop_id == session()->get('shop_id');
    }

    // THIS METHODS SHOULD BE USED IN EVERY MODEL THAT NEED TO TRACK CRUD
    public function createdBy()
    {
        return $this->created_by_user->name. " on " .$this->correct_format($this->created_at);
    }

    public function editedBy()
    {
        if ($this->edited_by) {
            return $this->edited_by_user->name. " on " .$this->correct_format($this->edited_at);
        }
        return "No one made changes";
    }

    public function deletedBy()
    {
        // I will leave this method like this because it can be used in archive part. On show page it will be useless to have it.
        return "Deleted by: " .$this->deleted_by_user->name. " on " .$this->correct_format($this->deleted_at);
    }

    public function correct_format($date)
    {
        $instance = Carbon::parse($date);
        // task says that date format should be like this "dd/mm/yyyy (03/01/2019)" but I added hours and minutes on that format because that can be really important in some situations
        return $instance->format('d/m/Y'). ' in ' .$instance->format('H:i');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function edited_by_user()
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    public function deleted_by_user()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}