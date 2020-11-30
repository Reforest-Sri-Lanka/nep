<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecosystem extends Model
{
    use HasFactory;
    protected $table = "eco_systems";
    public function environment_restorations(){
        return $this->hasMany('App\Models\Environment_Restoration');
    }
}
