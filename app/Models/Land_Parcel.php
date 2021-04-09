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
        'polygon',
        'protected_area',
        'created_by_user_id',
        'status_id',
        'district_id',
        'province_id',
        'gs_division_id',
        'activity_organization',
    ];

    protected $attributes = [
        'protected_area' => 0,
    ];

    protected $casts = [
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
    //relation for activity organization
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization','activity_organization');
    }

    //relation for m-m relationship between land_parcels and organizations
    public function organizations()
    {
        return $this->belongsToMany('App\Models\Organization','land_has_organizations','land_parcel_id','organization_id');
    }

    public function gazettes()
    {
        return $this->belongsToMany(Gazette::class, 'Land_Has_Gazette');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function crime_reports(){
        return $this->hasMany('App\Models\Crime_report');
    }

    public function gs_division()
    {
        return $this->belongsTo('App\Models\GS_Division');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

}