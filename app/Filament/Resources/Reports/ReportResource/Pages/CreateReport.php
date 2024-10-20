<?php

namespace App\Filament\Resources\Reports\ReportResource\Pages;

use App\Filament\Resources\Reports\ReportResource;
use App\Models\Reports\Report;
use App\Models\Reports\SubCommitteeReport;
use App\Models\Reports\GroupReport;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateReport extends CreateRecord
{
  protected static string $resource = ReportResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    $data['user_id'] = Auth::id();
    $data['submitted_by'] = Auth::user()->name;
    // Ensure date_submitted is set, use the current date if not provided
    $data['date_submitted'] = $data['date_submitted'] ?? now();


    // Remove related data before creating the report
    $relatedData = [];
    if ($data['report_type'] === 'subcommittee') {
      $relatedData = [
          'committee_choice' => $data['committee_choice'],
      ];
    } elseif ($data['report_type'] === 'group') {
      $relatedData = [
          'group_name' => $data['group_name'],
          'active_members' => $data['active_members'],
      ];
    }

    // Unset the related fields from the main data to prevent errors
    unset($data['committee_choice'], $data['group_name'], $data['active_members']);

    return $data;
  }

  protected function afterCreate(): void
  {
    $report = $this->record;

    // Save the related data after creating the report
    if ($report->report_type === 'subcommittee') {
      SubCommitteeReport::create([
          'report_id' => $report->id,
          'committee_choice' => $this->data['committee_choice'],
      ]);
    } elseif ($report->report_type === 'group') {
      GroupReport::create([
          'report_id' => $report->id,
          'group_name' => $this->data['group_name'],
          'active_members' => $this->data['active_members'],
      ]);
    }
  }
}

