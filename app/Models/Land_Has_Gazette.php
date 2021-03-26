<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land_Has_Gazette extends Model
{
    use HasFactory;
    protected $table = 'land_has_gazettes';

    protected $fillable = [
        'gazette_id',
        'land_parcel_id',
        'status'
    ];
}
