<script>
    $(function(){
        $('#previsitas-table').DataTable({    
            order: [[ 0, "asc" ]],
            dom:  "<'row'<'col-xs-12't>>"+ "<'row'<'col-xs-12'<'col-xs-6'i>>>",
            @include('dashboard.partials.translate'),
            processing: true,
            serverSide: true,
            responsive: true,
            searching: false,
            pageLength: 5,
            ajax: {    
                url: '{!! url('dashboard/previsitas') !!}',     
            },
            //Columnas  
            columns: [
                { data: 'f_entrada', name: 'f_entrada'},
                { data: 'nombre', name: 'nombre'},
                { data: 'empresa', name: 'empresa'},
                { data: 'visitado_id', name: 'visitado_id'},
                { data: 'estado', name: 'estado', orderable:false,searchable:false, exportable:false},
            ],                    
        });
    });
</script>