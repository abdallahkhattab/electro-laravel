	<!-- jQuery -->
    <script src="{{ asset('dashboardAssets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboardAssets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboardAssets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboardAssets/js/demo.js')}}"></script>

    <script src="{{ asset('dashboardAssets/plugins/dropzone/min/dropzone.min.js') }}"></script>


    <script>
        Dropzone.autoDiscover = false;    
        $(function () {
            // Summernote
            $('.summernote').summernote({
                height: '300px'
            });
           
            const dropzone = $("#image").dropzone({ 
                url:  "{{ route('dashboard.createProducts') }}",
                maxFiles: 5,
                addRemoveLinks: true,
                acceptedFiles: "image/jpeg,image/png,image/gif",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }, success: function(file, response){
                    $("#image_id").val(response.id);
                }
            });

        });
    </script>
