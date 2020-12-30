<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function development_projects(){
        return $this->hasMany('App\Models\Development_Project');
    }

    public function process_items(){
        return $this->hasMany('App\Models\Process_Item');
    }

    public function tree_removal_requests(){
        return $this->hasMany('App\Models\Tree_Removal_Request');
    }

    public function Crime_Reports(){
        return $this->hasMany('App\Models\Crime_Report');
    }
}
