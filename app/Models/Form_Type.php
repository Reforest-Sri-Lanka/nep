<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_Type extends Model
{
    use HasFactory;
    protected $table = 'form_types';

    public function process_items(){
        return $this->hasMany('App\Models\Process_Item');
    }
}
