@php use App\Filament\Widgets\CalendarWidget; @endphp
@aware(['page'])
<div class="px-4 py-4 md:py-8">
  <div class="max-w-7xl mx-auto">
    {!! $calendarContent !!}
{{--    @livewire(CalendarWidget::class)--}}
    {!! $calendar !!}
  </div>
  <div class="event-list">
    @foreach($events as $event)
      <a href="{{ route('calendar.events.event', $event->id) }}" >
        <div class="event-item">
          <h3>{{ $event->name }}</h3>
          <p>{{ $event->starts_at }} - {{ $event->ends_at }}</p>
          <p>{{ $event->venue }}</p>
        </div>
      </a>
    @endforeach
  </div>
</div>