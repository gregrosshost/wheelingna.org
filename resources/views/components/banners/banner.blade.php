<div class="hero-bg">
  <!-- Inner Container -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="py-12 md:py-16">
      <div class="text-center hero-content">
        <h1 class="text-xl font-extrabold text-white md:text-5xl lg:text-6xl">
          Our Primary Purpose - to carry the message to the addict who still suffers.
        </h1>
        <p class="mx-auto mt-3 max-w-md text-lg text-white md:mt-5 md:max-w-3xl md:text-xl">
          "An addict, any addict, can stop using drugs, lose the desire to use, and find a new way to live.
          Our message is hope and the promise of freedom." - Narcotics Anonymous Basic Text, p. 95
        </p>
      </div>
    </div>
  </div>
</div>

<style>
    .hero-bg {
        background-image: url('/assets/banner.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    .hero-bg::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(53, 89, 85, 0.9);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }
</style>