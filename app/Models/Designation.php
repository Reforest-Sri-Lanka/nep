<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    
    // A user has one designation and a designation can belong to many users.
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
