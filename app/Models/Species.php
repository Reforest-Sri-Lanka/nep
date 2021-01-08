<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Species extends Model

{
    use HasFactory;
    protected $fillable = ['type', 'title', 'scientefic_name', 'habitats', 'taxa', 'description','status_id',
];
    protected $table = 'species_information';



    protected $attributes = [
        'photos' => 0,
     
        




    ];
    protected $casts = [
        'habitats' => 'array',
        'taxa' => 'array',


    ];
}
