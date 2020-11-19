<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    
    protected $table = 'organizations';
    public $timestamps = true;


    protected $fillable = [
        'title',
       
    ];


    // A user belongs to one organization and an organization has many users.
    public function organizations(){
        return $this->hasMany('App\Models\Organizations');
    }
}
