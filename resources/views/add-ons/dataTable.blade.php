<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#data-table').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf' ]
            } );
        
            table.buttons().container()
                .prependTo( '.add-button' );
        } );
</script>