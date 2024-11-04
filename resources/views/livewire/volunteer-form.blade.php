<div>
  <form wire:submit="submit">
    @if (session()->has('success'))
      <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    <div class="space-y-4">
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" wire:model="name">
      </div>

      <div>
        <label for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" wire:model="phone_number">
      </div>

      <div>
        <label for="food_item">Food Item</label>
        <input type="text" id="food_item" wire:model="food_item">
      </div>

      <button type="submit">Sign Up</button>
    </div>
  </form>
</div>