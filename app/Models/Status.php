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

    public function environment_restorations(){
        return $this->hasMany('App\Models\Environment_Restoration');
    }

    public function Crime_Reports(){
        return $this->hasMany('App\Models\Crime_Report');
    }

    public function land_parcels(){
        return $this->hasMany('App\Models\Land_Parcel');
    }
}
