<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCommitteeReport extends Model
{
    protected $fillable = ['committee_choice', 'report_id'];

  public function report(): BelongsTo
  {
    return $this->belongsTo(Report::class);
  }
}
