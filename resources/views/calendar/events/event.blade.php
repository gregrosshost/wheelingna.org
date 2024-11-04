<x-layouts.app>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1 class="text-2xl font-bold mb-4">{{ $event->title }}</h1>

          <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Event Details</h2>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Address:</strong> {{ $event->address }}</p>
            <p><strong>City:</strong> {{ $event->city }}, {{ $event->state }} {{ $event->zip }}</p>
{{--            <p><strong>Starts:</strong> {{ $event->starts_at->format('F j, Y g:i A') }}</p>--}}
{{--            <p><strong>Ends:</strong> {{ $event->ends_at->format('F j, Y g:i A') }}</p>--}}
          </div>

          <div>
            <a href="{{ route('calendar.events.volunteer', $event->id) }}"
               class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
              Sign Up to Bring Food
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>