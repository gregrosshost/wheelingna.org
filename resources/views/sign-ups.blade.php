<x-site.layout>
  <x-site.content-container>

    <!-- Volunteer Form Section -->
    <header class="p-6 border-t border-secondary/10 dark:border-dark-secondary/10">
      <h1 class="text-2xl font-bold mb-4 ">
        {{ $event->title }} - Sign Ups
      </h1>

      <div class="mb-6 /90 /90">
        <h2 class="text-xl font-semibold mb-2  ">Event Details</h2>
        {{--<p><strong class=" ">Date:</strong> {{ $event->starts_at->format('F j, Y g:i A') }}</p>--}}
        <p><strong class="text-black">Location:</strong> {{ $event->venue }}</p>
      </div>

      <livewire:volunteer-form :event-id="$event->id"/>
    </header>

    <!-- Volunteers List Section -->
    <section class="p-6">
      <h2 class="text-xl font-semibold mb-4  ">Current Volunteers</h2>

      @if($event->volunteers && count($event->volunteers) > 0)
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-secondary/10 dark:divide-dark-secondary/10">
            <thead class="bg-secondary/5 dark:bg-dark-secondary/5">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium /70 /70 uppercase tracking-wider">
                  Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium /70 /70 uppercase tracking-wider">
                  Food Item
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium /70 /70 uppercase tracking-wider">
                  Signed Up
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-secondary/10 dark:divide-dark-secondary/10">
              @foreach($event->volunteers as $volunteer)
                @php
                  $volunteerData = is_string($volunteer) ? json_decode($volunteer, true) : $volunteer;
                @endphp
                <tr class="hover:bg-secondary/5 dark:hover:bg-dark-secondary/5 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium  ">
                      {{ $volunteerData['name'] ?? 'N/A' }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  ">
                      {{ $volunteerData['food_item'] ?? 'N/A' }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm /70 /70">
                    {{ isset($volunteerData['signed_up_at']) ? \Carbon\Carbon::parse($volunteerData['signed_up_at'])->format('M j, Y g:i A') : 'N/A' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="text-center py-8 /70 /70">
          <p>No volunteers have signed up yet. Be the first!</p>
        </div>
      @endif
    </section>



  </x-site.content-container>
</x-site.layout>