@props([
    'title' => "Welcome, glad you're here!"
])

<div class="bg-primary dark:bg-dark-primary">
  <!-- Inner Container -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="py-4 md:py-6 lg:py-8">
      <div class="text-center">
        <h1 class="text-2xl font-extrabold text-secondary dark:text-dark-secondary md:text-4xl lg:text-5xl">
          {{ $title }}
        </h1>
      </div>
    </div>
  </div>
</div>