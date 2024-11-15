<x-site.layout>
  <x-site.content-container>

    <!-- Volunteer Form Section -->

    <header class="px-2 py-4 md:p-6 border-t border-secondary/10 dark:border-dark-secondary/10">
      <livewire:volunteer-form :event-id="$event->id"/>
    </header>

    <!-- Volunteers List Section -->
    <section class="px-2 py-4 md:p-6 bg-neutral-100 dark:bg-neutral-800">
  <h2 class="text-2xl font-bold mb-4 text-neutral-900 dark:text-neutral-100">Current Volunteers</h2>

  @if($event->volunteers && count($event->volunteers) > 0)
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-neutral-300 dark:divide-neutral-700">
        <thead class="bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-neutral-100">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
              Name
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
              Food Item
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
              Signed Up
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
          @foreach($event->volunteers as $volunteer)
            @php
              $volunteerData = is_string($volunteer) ? json_decode($volunteer, true) : $volunteer;
            @endphp
            <tr class="hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-neutral-900 dark:text-neutral-100">
                  {{ $volunteerData['name'] ?? 'N/A' }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-neutral-900 dark:text-neutral-100">
                  {{ $volunteerData['food_item'] ?? 'N/A' }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-600 dark:text-neutral-400">
                {{ isset($volunteerData['signed_up_at']) ? \Carbon\Carbon::parse($volunteerData['signed_up_at'])->format('M j, Y g:i A') : 'N/A' }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-center py-8 text-neutral-600 dark:text-neutral-400">
      <p>No volunteers have signed up yet. Be the first!</p>
    </div>
  @endif
</section>


  </x-site.content-container>
</x-site.layout>