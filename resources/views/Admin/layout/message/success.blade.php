<script>
    var success = "{{ session('success') }}";
    var status = "{{ session('status') }}";
    if (success) {
        alert(success);
    }
    if (status) {
        alert(status);
    }
</script>