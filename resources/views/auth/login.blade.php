@extends('puerto.template.main') 
@section ('title', 'Entrar') 
@section('styles')
	<link rel="stylesheet" href="{{asset('/css/partials/login.css') }}">
	<link rel="stylesheet" href="{{asset('/css/partials/main.css') }}">
	<link rel="stylesheet" href="{{asset('/css/partials/minimal.css') }}">
@endsection 
 @section('content')
<div class="container-fluid">
	<div class="row vertical-center ">
		<div class="col-md-4 col-md-offset-4 ">
			<div class="panel panel-default ">
				<div class="panel-heading">Entrar</div>
				<div class="panel-body">
					@include('dashboard.partials.error',['type'=> 'danger'])
					{!! Form::open(['url' => '/login', 'class' => 'form-horizontal']) !!}
						<div class="form-group has-feedback">
							{!! Form::label('user_name', 'Usuario:', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::text('user_name', null, ['placeholder'=>'Nombre de usuario', 'class' => 'form-control', 'value'=>'{{ old("user_name")}}']) !!}
							  	<i class="glyphicon glyphicon-user form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group has-feedback">
							{!! Form::label('password', 'Contraseña:', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::password('password', ['placeholder'=>'Contraseña', 'class' => 'form-control']) !!}
								<i class="glyphicon glyphicon-lock form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									{!! Form::checkbox('recuerdame') !!} Recuérdame
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									{!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}

								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
	<script src="{{asset('/js/partials/icheck.js')}}" type="text/javascript"></script> 
	<script src="{{asset('/js/partials/check.js')}}" type="text/javascript"></script> 
@endsection