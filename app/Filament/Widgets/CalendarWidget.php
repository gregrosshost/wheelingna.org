<?php
//
//namespace App\Filament\Widgets;
//
//use App\Filament\Resources\EventResource;
//use App\Models\Event;
////use Filament\Actions\DeleteAction;
////use Filament\Actions\EditAction;
//use Filament\Forms\Components\DateTimePicker;
//use Filament\Forms\Components\Grid;
//use Filament\Forms\Components\TextInput;
//use Filament\Forms\Form;
//use Illuminate\Database\Eloquent\Model;
//use Saade\FilamentFullCalendar\Actions\DeleteAction;
//use Saade\FilamentFullCalendar\Actions\EditAction;
//use Saade\FilamentFullCalendar\Actions\ViewAction;
//use Saade\FilamentFullCalendar\Data\EventData;
//use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
//
//class CalendarWidget extends FullCalendarWidget
//{
//  public Model | string | null $model = Event::class;
//
//  public function getFormSchema(): array
//  {
//    return [
//        TextInput::make('name'),
//
//        Grid::make()
//            ->schema([
//                DateTimePicker::make('starts_at'),
//
//                DateTimePicker::make('ends_at'),
//            ]),
//    ];
//  }
//
//  protected function modalActions(): array
//  {
//    return [
//        EditAction::make()
//            ->mountUsing(
//                function (Event $record, Form $form, array $arguments) {
//                  $form->fill([
//                      'name' => $record->name,
//                      'venue' => $record->venue,
//                      'starts_at' => $arguments['events']['start'] ?? $record->starts_at,
//                      'ends_at' => $arguments['events']['end'] ?? $record->ends_at
//                  ]);
//                }
//            ),
//        DeleteAction::make(),
//        ViewAction::make()
//    ];
//  }
//
//
//  public function fetchEvents(array $fetchInfo): array
//  {
//    return Event::query()
//        ->where('starts_at', '>=', $fetchInfo['start'])
//        ->where('ends_at', '<=', $fetchInfo['end'])
//        ->get()
//        ->map(
//            fn (Event $events) => EventData::make()
//                ->id($events->id)
//                ->title($events->name)
//                ->start($events->starts_at)
//                ->end($events->ends_at)
//        )
//        ->toArray();
//  }
//
//
//}
