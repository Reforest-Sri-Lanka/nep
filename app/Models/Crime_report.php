<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crime_report extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id',
        'crime_type',
        'description',
        'action_taken',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    

    

    public function Crime_type()
    {
        return $this->belongsTo('App\Models\Crime_type');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function Land_parcel()
    {
        return $this->belongsTo('App\Models\Land_Parcel');
    }
}