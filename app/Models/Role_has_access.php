<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Role_has_access extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = "role_has_access";

    protected $attributes = [
        'status' => 7,
    ];
    
    public function access()
    {
        return $this->belongsTo('App\Models\Access');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
