@if(session()->has('notify'))
    <script>
        $.notify("{{ session('notify.message') }}", "{{ session('notify.type') }}");
    </script>
@endif