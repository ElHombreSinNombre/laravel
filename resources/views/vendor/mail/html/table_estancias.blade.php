<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Cntr No</th>
        <th>In Date</th>
        <th>VSL</th>
        <th>Call Year</th>
        <th>Call Seq</th>
        <th>Diferencia</th>
    </thead>
    <tbody>
        @foreach ($slot as $estancia)
            <tr>
                <td>{{ Illuminate\Mail\Markdown::parse($slot->cntr_no) }}</td>
                <td>{{ Carbon\Carbon::parse(Illuminate\Mail\Markdown::parse($slot->in_date)->format('d-m-Y H:i:s')) }}</td>
                <td>{{ Carbon\Carbon::parse(Illuminate\Mail\Markdown::parse($slot->vsl_cd)) }}</td>
                <td>{{ Illuminate\Mail\Markdown::parse($slot->call_year) }}</td>
                <td>{{ Illuminate\Mail\Markdown::parse($slot->call_seq) }}</td>
                <td>{{ Illuminate\Mail\Markdown::parse($slot->diferencia) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> 
@if(count($slot)==1)
    <p>Se han encontrado<b>{{count($slot)}}</b>elementos.</p>
@elseif(count($slot)>1)
    <p>Se han encontrado<b>{{count($slot)}}</b>elementos.</p>
@else
    <p>No se han encontrado elementos.</p>
@endif