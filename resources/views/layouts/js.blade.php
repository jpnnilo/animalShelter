@section('js')
    <script>
        $(document).ready(function() {
            $("#save").click(function(e) {
                e.preventDefault();
                console.log("test");
            });

            $("p").click(function() {
                $(this).hide();
            });
        });
    </script>
@endsection
