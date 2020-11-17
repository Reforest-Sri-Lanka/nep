<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree_Removal_Request extends Model
{
    use HasFactory;

    protected $table = 'tree_removal_requests';


    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function gs_division()
    {
        return $this->belongsTo('App\Models\GS_Division');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function land_parcel()
    {
        return $this->belongsTo('App\Models\Land_Parcel');
    }
}
