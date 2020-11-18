<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentRestorationSpecies extends Model
{
    use HasFactory;
    public function environment_restorations(){
        return $this->belongsTo('App\Models\EnvironmentRestoration');
    }
}
