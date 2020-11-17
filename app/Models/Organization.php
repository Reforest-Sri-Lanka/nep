<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    
    // A user belongs to one organization and an organization has many users.
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
