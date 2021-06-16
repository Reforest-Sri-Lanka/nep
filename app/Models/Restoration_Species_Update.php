<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Restoration_Species_Update extends Model implements Auditable
{
    use HasFactory;
    protected $table = "environment_restoration_species_updates";
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'current_height',
        'improvement_suggestions',
        'qty_of_successful_trees',
        'futher_remarks',
        'env_rest_update_id',
        'env_rest_species_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    

    
    public function environment_restoration_update()
    {
        return $this->belongsTo('App\Models\Restoration_Update','env_rest_update_id');
    }

    public function environment_restoration_species()
    {
        return $this->belongsTo('App\Models\Environment_Restoration_Species','env_rest_species_id');
    }

}
