{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
        <li class="treeview">
            <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Carga y descarga</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href=""><i class='glyphicon glyphicon-cloud-upload'></i> Carga</a></li>
                <li><a href=""><i class='glyphicon glyphicon-cloud-download'></i> Descarga</a></li>
            </ul>
        </li>
    @endslot
@endcomponent

