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
      'images',
      'volunteers',
  ];

  protected $casts = [
      'volunteers' => 'array',
      'is_active' => 'boolean',
      'starts_at' => 'datetime',
  ];
}
