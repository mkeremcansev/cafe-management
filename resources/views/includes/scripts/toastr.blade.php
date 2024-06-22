<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    @if(session()->has('success'))
        toastr.success("{{ session()->get('success') }}")
    @endif
</script>
