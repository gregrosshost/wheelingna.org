<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
  use HasFactory;

  protected $fillable = [
      'name',
      'phone_number',
      'bringing',
  ];

  protected $casts = [
      'bringing' => 'array',
  ];

  public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Event::class);
  }
}
