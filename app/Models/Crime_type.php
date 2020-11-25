<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime_type extends Model
{
    use HasFactory;

    public function process_items(){
        return $this->hasMany('App\Models\Crime_report');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
