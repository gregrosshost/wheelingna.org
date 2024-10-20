<?php

namespace App\Filament\Resources\Reports\ReportResource\Pages;

use App\Filament\Resources\Reports\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReport extends EditRecord
{
  protected static string $resource = ReportResource::class;

  protected function mutateFormDataBeforeSave(array $data): array
  {
    // Ensure the submitted_by remains the original user's name
    $data['submitted_by'] = $this->record->user->name;
    // Remove related data before updating the report
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

    // Unset the related fields from the main data
    unset($data['committee_choice'], $data['group_name'], $data['active_members']);

    return $data;
  }

  protected function afterSave(): void
  {
    $report = $this->record;

    // Update the related data after saving the report
    if ($report->report_type === 'subcommittee') {
      $report->subCommitteeReport()->updateOrCreate(
          ['report_id' => $report->id],
          ['committee_choice' => $this->data['committee_choice']]
      );
    } elseif ($report->report_type === 'group') {
      $report->groupReport()->updateOrCreate(
          ['report_id' => $report->id],
          [
              'group_name' => $this->data['group_name'],
              'active_members' => $this->data['active_members'],
          ]
      );
    }
  }
}
