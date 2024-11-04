<x-layouts.app>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1 class="text-2xl font-bold mb-4">Sign Up - {{ $event->title }}</h1>

          <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Event Details</h2>
{{--            <p><strong>Date:</strong> {{ $event->starts_at->format('F j, Y g:i A') }}</p>--}}
            <p><strong>Location:</strong> {{ $event->venue }}</p>
          </div>

          <livewire:volunteer-form :event-id="$event->id" />
        </div>
      </div>
    </div>
  </div>

  <!-- Volunteers List Section -->
  <!-- Volunteers List Section -->
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
      <h2 class="text-xl font-semibold mb-4">Current Volunteers</h2>

      @if($event->volunteers && count($event->volunteers) > 0)
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Food Item</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Signed Up</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($event->volunteers as $volunteer)
                @php
                  $volunteerData = is_string($volunteer) ? json_decode($volunteer, true) : $volunteer;
                @endphp
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $volunteerData['name'] ?? 'N/A' }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $volunteerData['food_item'] ?? 'N/A' }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ isset($volunteerData['signed_up_at']) ? \Carbon\Carbon::parse($volunteerData['signed_up_at'])->format('M j, Y g:i A') : 'N/A' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="text-center py-8 text-gray-500">
          <p>No volunteers have signed up yet. Be the first!</p>
        </div>
      @endif
    </div>
  </div>



</x-layouts.app>