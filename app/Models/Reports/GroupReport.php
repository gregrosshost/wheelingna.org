<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupReport extends Model
{
    protected $fillable = ['group_name', 'active_members', 'report_id'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
