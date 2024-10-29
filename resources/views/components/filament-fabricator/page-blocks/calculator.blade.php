@aware(['page'])
@push('htmlHead')
  <link rel="stylesheet" href="{{ Vite::asset('resources/css/nacc.css') }}">
  <script type="text/javascript" src="{{ Vite::asset('resources/js/nacc.js') }}"></script>
  <script>
      window.keytag_path = "{{ asset('assets/nacc-keytags') }}";
  </script>
@endpush


@push('htmlBody')
  <div id="nacc-container" class="NACC-Linear"></div>
  <script type="text/javascript">new NACC('nacc-container')</script>
@endpush
