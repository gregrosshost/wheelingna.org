<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'venue',
        'address',
        'city',
        'state',
        'zip',
        'starts_at',
        'ends_at',
    ];

  public function volunteers(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany(Volunteer::class);
  }

}
