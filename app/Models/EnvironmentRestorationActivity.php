<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentRestorationActivity extends Model
{
    use HasFactory;

    // protected $table = "environment_restoration_activities";
    
    public function environment_restorations(){
        return $this->hasMany('App\Models\EnvironmentRestoration');
    }
}
