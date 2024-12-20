<script>
    var success = "{{ session('success') }}";
    if (success) {
        toastr.success("{{ session('success') }}");
    }
</script>