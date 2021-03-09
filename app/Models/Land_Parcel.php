<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land_Parcel extends Model
{
    use HasFactory;
    protected $table = 'land_parcels';

    protected $fillable = [
        'title',
        'governing_organizations',
        'logs',
        'polygon',
        'protected_area',
        'created_by_user_id',
        'status_id',
    ];

    protected $attributes = [
        'logs' => 0,
        'protected_area' => 0,
        'status_id' => 1,
    ];

    protected $casts = [
        'governing_organizations' => 'array',
        'logs' => 'array',
        'polygon' => 'array',
    ];

    public function development_projects(){
        return $this->hasMany('App\Models\Development_Project');
    }

    public function tree_removal_requests(){
        return $this->hasMany('App\Models\Tree_Removal_Request');
    }

    public function environment_restorations(){
        return $this->hasMany('App\Models\EnvironmentRestoration');
    }
}