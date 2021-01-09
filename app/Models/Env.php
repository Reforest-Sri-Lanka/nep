<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Env extends Model
{
    use HasFactory;

    protected $table = 'eco_systems';
    protected $fillable = ['ecosystem_type','description','created_by_user_id','status',];

    
    
    
    
    
   







}
