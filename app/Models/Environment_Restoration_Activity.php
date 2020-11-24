<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment_Restoration_Activity extends Model
{
    use HasFactory;
    protected $table = "environment_restoration_activities";
    
    public function environment_restorations(){
        return $this->hasMany('App\Models\Environment_Restoration');
    }
}
