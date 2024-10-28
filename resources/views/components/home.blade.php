<div class="min-h-screen bg-gray-100">
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="flex-shrink-0 flex items-center">
            <span class="text-2xl font-bold text-gray-900">{{ config('app.name', 'Laravel') }}</span>
          </div>
        </div>
        <div class="flex items-center">
          @auth
            <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
      <h1 class="text-3xl font-bold text-gray-900 mb-8">Welcome to {{ config('app.name', 'Laravel') }}</h1>

      <!-- Navigation Grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
        <!-- Dashboard -->
        <a href="/dashboard" class="group">
          <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all">
            <div class="flex flex-col items-center md:items-start">
              <svg class="w-8 h-8 text-gray-600 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <h3 class="mt-2 font-semibold text-gray-900">Dashboard</h3>
              <p class="mt-1 text-sm text-gray-500 hidden md:block">View your application overview and metrics</p>
            </div>
          </div>
        </a>

        <!-- Users -->
        <a href="/users" class="group">
          <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all">
            <div class="flex flex-col items-center md:items-start">
              <svg class="w-8 h-8 text-gray-600 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
              </svg>
              <h3 class="mt-2 font-semibold text-gray-900">Users</h3>
              <p class="mt-1 text-sm text-gray-500 hidden md:block">Manage user accounts and roles</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </main>
</div>