<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment_Restoration extends Model
{
    use HasFactory;

    protected $table = "environment_restorations";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'environment_restoration_activity_id',
        'ecosystem_id',
        'organization_id',
        'land_parcel_id',
        'status',
    ];

   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'approval_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'created_by_user_id' => 0,
        'status' => 0,
    ];

    // public function role(){
    //     return $this->belongsToMany('App\Role');
    // }

    // public function organization(){
    //     return $this->belongsTo('App\Organization');
    // }

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function ecosystem()
    {
        return $this->belongsTo('App\Models\Ecosystem');
    }

    public function land_parcel()
    {
        return $this->belongsTo('App\Models\Land_Parcel');
    }

    public function environment_restoration_activity()
    {
        return $this->belongsTo('App\Models\Environment_Restoration_Activity');
    }

    public function environment_restoration_species()
    {
        return $this->hasMany('App\Models\Environment_Restoration_Species');
    }
}
