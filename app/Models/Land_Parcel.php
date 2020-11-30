<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land_Parcel extends Model
{
    use HasFactory;
    protected $table = 'land_parcels';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'governing_organizations',
        'logs',
        'polygon',
        'protected_area',
        'status',
    ];

   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'created_by_user_id' => 0,
        'status' => 0,
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
