<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land_Has_Organization extends Model
{
    use HasFactory;
    protected $table = 'land_has_organizations';

    protected $fillable = [
        'organization_id',
        'land_parcel_id',
        'status'
    ];

    protected $attributes = [
        
    ];
}
