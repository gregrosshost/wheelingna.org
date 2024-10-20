<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Report extends Model
{
    protected $fillable = ['report_type', 'date_submitted', 'submitted_by', 'report_text', 'file_upload'];


    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'submitted_by');
    }

  public function subCommitteeReport(): HasOne
  {
    return $this->hasOne(SubCommitteeReport::class, 'report_id');
  }

  public function groupReport(): HasOne
  {
    return $this->hasOne(GroupReport::class, 'report_id');
  }

    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }

  // Accessor for committee_choice for Sub-committee reports
  public function getCommitteeChoiceAttribute()
  {
    return $this->report_type === 'subcommittee'
        ? $this->subCommitteeReport?->committee_choice
        : null;
  }

  // Accessor for group_name for Group reports
  public function getGroupNameAttribute()
  {
    return $this->report_type === 'group'
        ? $this->groupReport?->group_name
        : null;
  }

  // Accessor for active_members for Group reports
  public function getActiveMembersAttribute()
  {
    return $this->report_type === 'group'
        ? $this->groupReport?->active_members
        : null;
  }
}
