<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Restoration_Update extends Model implements Auditable
{
    use HasFactory;
    protected $table = "environment_restoration_updates";
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'situation_update',
        'suggestions',
        'futher_remarks',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $attributes = [
        'photos' => '{}',
        'status' => 0,
    ];


    
    public function environment_restoration()
    {
        return $this->belongsTo('App\Models\Environment_Restoration','env_rest_id');
    }

    public function create_user(){
        return $this->belongsTo('App\Models\User','created_by');
    }
}
