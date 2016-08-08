<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script>

    $(document).ready(function() {
        $('#tableFaturas').dataTable({
            processing: true,
            serverSide: true,
            paging: true,
            autoWidth: false,
            ajax: {
                url : "{!! route('sistema.fatura.index') !!}"
            },
            rowId: 'id',
            responsive: true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'valorFatura', name: 'valorFatura'}
            ]
        });
    } );

</script>