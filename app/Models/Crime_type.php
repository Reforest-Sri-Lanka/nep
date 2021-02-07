<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime_type extends Model
{
    use HasFactory;
    protected $table = "crime_types";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
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
        'status' => 0,
    ];
    public function process_items(){
        return $this->hasMany('App\Models\Crime_report');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
