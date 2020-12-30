<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GS_Division extends Model
{
    use HasFactory;
    protected $table = 'gs_divisions';

    public function tree_removal_requests(){
        return $this->hasMany('App\Models\Tree_Removal_Request');
    }
}
