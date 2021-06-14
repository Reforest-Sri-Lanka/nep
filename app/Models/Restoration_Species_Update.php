<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoration_Species_Update extends Model
{
    use HasFactory;
    protected $table = "environment_restoration_species";
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'current_height',
        'improvement_suggestions',
        'qty_of_successful_trees',
        'futher_remarks',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $attributes = [
        'status' => 0,
    ];

    
    public function environment_restoration_update()
    {
        return $this->belongsTo('App\Models\Restoration_Update','env_rest_update_id');
    }

    public function environment_restoration_species()
    {
        return $this->belongsTo('App\Models\Environment_Restoration_Species','env_rest_species_id');
    }

    public function Species(){
        return $this->belongsTo('App\Models\Species');
    }
}
