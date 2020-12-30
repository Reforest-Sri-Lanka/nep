<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EnvironmentRestoration extends Model
{
    use HasFactory, Notifiable;

    protected $table = "environment_restorations";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'er_activity',
        'ecosystem',
        'organization_id',
        'status',
    ];

   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'species' => 'array',
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

    public function environment_restoration_activity()
    {
        return $this->belongsTo('App\Models\EnvironmentRestorationActivity');
    }
}
