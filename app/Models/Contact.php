<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'organization_contacts';
    public $timestamps = true;

 
   
    protected $fillable = [
        'org_id'
  ];

  /**
   * The roles that belong to the User.
   */
  public function organizations_contact()
  {
    return $this->belongsTo('App\Models\Organization', 'org_id');
  }
}