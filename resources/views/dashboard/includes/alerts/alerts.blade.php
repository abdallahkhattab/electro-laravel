@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });

    </script>
@endif

@if ($errors->any())

<script>
	Swal.fire({
		icon: 'error',
		title: 'Error',
		text: '{{ $errors->first() }}',
	});
</script>

@endif