<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_Item extends Model
{
    use HasFactory;
    protected $table = 'process_items';

    protected $fillable = [
        'form_type_id',
        'form_id',
        'requst_organization',
        'activity_organization',
        'activity_user_id',
        'remark',
        'prerequisite',
        'prerequsite_id',
        'created_by_user_id',
        'status_id',
    ];

    protected $attributes = [
        'prerequisite' => 0,
        'prerequsite_id' => 0,
        'remark' => 0,
        'status_id' => 0,
        'activity_user_id' => 0,
        'activity_organization' => 0,
    ];

    public function form_type_id()
    {
        return $this->belongsTo('App\Models\Form_Type');
    }

    public function status_id()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
