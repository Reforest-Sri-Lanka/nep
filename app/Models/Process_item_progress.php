<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_item_progress extends Model
{
    use HasFactory;

    public function Status()
    {
        return $this->belongsTo('App\Models\Process_item_status','status_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User','created_by_user_id');
    }
}
