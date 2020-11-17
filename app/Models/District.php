<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';

    public function tree_removal_requests(){
        return $this->hasMany('App\Models\Tree_Removal_Request');
    }
}
