<x-site.layout>
  <x-page-details-container>
    <section class="p-6">
      <h1 class="text-2xl font-bold mb-4 text-primary dark:text-dark-secondary">
        {{ $event->title }}
      </h1>

      <div class="mb-4 space-y-2">
        <h2 class="text-xl font-semibold mb-2 text-primary dark:text-dark-secondary">
          Event Details
        </h2>

        <p class="text-primary/90 dark:text-dark-secondary/90">
          <strong class="text-primary dark:text-dark-secondary">Venue:</strong>
          {{ $event->venue }}
        </p>

        <p class="text-primary/90 dark:text-dark-secondary/90">
          <strong class="text-primary dark:text-dark-secondary">Address:</strong>
          {{ $event->address }}
        </p>

        <p class="text-primary/90 dark:text-dark-secondary/90">
          <strong class="text-primary dark:text-dark-secondary">City:</strong>
          {{ $event->city }}, {{ $event->state }} {{ $event->zip }}
        </p>

        {{--
        <p class="text-primary/90 dark:text-dark-secondary/90">
            <strong class="text-primary dark:text-dark-secondary">Starts:</strong>
            {{ $event->starts_at->format('F j, Y g:i A') }}
        </p>

        <p class="text-primary/90 dark:text-dark-secondary/90">
            <strong class="text-primary dark:text-dark-secondary">Ends:</strong>
            {{ $event->ends_at->format('F j, Y g:i A') }}
        </p>
        --}}
      </div>

      <div>
        <a href="{{ route('calendar.events.volunteer', $event->id) }}"
           class="inline-flex items-center justify-center px-4 py-2 bg-primary dark:bg-dark-secondary text-secondary dark:text-dark-primary rounded-lg hover:bg-secondary border border-primary dark:border-dark-primary transition-colors duration-200">
          Sign Up to Bring Food
        </a>
      </div>
    </section>
  </x-page-details-container>
</x-site.layout>