<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TEST

Route::get('pdf', 'HomeController@test')->name('pdf');

//AUTORIZACIÖN

Route::auth();

Auth::routes(['except' => 'api/contenedores']);

//Logout

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//Login

Route::get('/','HomeController@index')->name('login');

//Puerto

Route::get('puerto','HomeController@home')->name('home');

//CARGAS Y DESCARGAS

Route::prefix('modulo/cargas-descargas/principal')->group(function () {

    Route::get('', 'CargasYDescargasController@index')->name('cargas-descargas.principal');

    Route::post('opcion','CargasYDescargasController@opcion')->name('buscar.cargas-descargas');

});

//MOVIMIENTOS DE TRENES

//Principal

Route::get('modulo/trenes/principal', function () {
    return view('moduloMovimientoTrenes.index');
})->name('trenes.principal');

//Principal

Route::resource('propietarios', 'PropietariosController',
    ['except' => ['show']
]);

Route::prefix('propietarios')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'PropietariosController@index')->name('propietarios.listado');

    //Delete

    Route::get('{id}/delete', 'PropietariosController@destroy')->name('propietarios.delete');

});

Route::resource('destinos', 'DestinosController',
    ['except' => ['show']
]);

Route::prefix('destinos')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'DestinosController@index')->name('destinos.listado');

    //Delete

    Route::get('{id}/delete', 'DestinosController@destroy')->name('destinos.delete');

});

Route::resource('operadores', 'OperadoresController',
    ['except' => ['show']
]);

Route::prefix('operadores')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'OperadoresController@index')->name('operadores.listado');

    //Delete

    Route::get('{id}/delete', 'OperadoresController@destroy')->name('operadores.delete');

});

Route::resource('movimientos', 'MovimientosController',
    ['except' => ['show']
]);

Route::prefix('movimientos')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'MovimientosController@index')->name('movimientos.listado');

    //Delete

    Route::get('{id}/delete', 'MovimientosController@destroy')->name('movimientos.delete');

});

//PREAVISOS TRENES

Route::prefix('modulo/preavisos/trenes/principal')->group(function () {

    Route::get('', 'PreavisosTrenesController@index')->name('preavisos.principal');

    Route::post('buscar','PreavisosTrenesController@buscar')->name('buscar.trenes');

});

//UTILIDADES

Route::get('modulo/utilidades/principal', function () {
    return view('moduloUtilidades.index');
})->name('utilidades.principal');

//Cortes

Route::resource('cortes', 'CorteController',
    ['except' => ['show']
]);

Route::prefix('cortes')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'CorteController@index')->name('cortes.listado');

    //Delete

    Route::get('{id}/delete', 'CorteController@destroy')->name('cortes.delete');

});

//Ayudas

Route::resource('ayudas', 'AyudaController',
    ['except' => ['show']
]);

Route::prefix('ayudas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'AyudaController@index')->name('ayudas.listado');

    //Modal

    Route::get('{id}/modal', 'AyudaController@modal')->name('ayudas.modal');

    //Delete

    Route::get('{id}/delete', 'AyudaController@destroy')->name('ayudas.delete');

});

//REGISTRO DE VISITAS

//Principal

Route::get('modulo/visitas/principal', function () {
    return view('moduloVisitas.index');
})->name('visitas.principal');

//Dashboard

Route::prefix('dashboard')->group(function () {

    //Datatable

    Route::get('visitas', 'DashboardController@indexVisita')->name('dashboard');

    Route::get('previsitas', 'DashboardController@indexPrevisita')->name('dashboard.previsitas');

    Route::prefix('visitas')->group(function () {

        Route::get('estado/{id}', 'DashboardController@estado')->name('dashboard.visitas.estado');

        //Datatables

        Route::get('visitantes', 'DashboardController@visitantes')->name('dashboard.visitas.visitantes');

        Route::get('previsitas', 'DashboardController@previsitas')->name('dashboard.visitas.previsitas');

        Route::get('activos', 'DashboardController@activos')->name('dashboard.visitas.activos');
        
        Route::get('hoySalen', 'DashboardController@hoySalen')->name('dashboard.visitas.hoySalen');
        
        Route::get('hoyEntran', 'DashboardController@hoyEntran')->name('dashboard.visitas.hoyEntran');
    });

});

//Visitas

Route::resource('visitas', 'VisitasController',
    ['except' => ['show']
]);

Route::prefix('visitas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'VisitasController@index')->name('visitas.listado');

    //Delete

    Route::get('{id}/delete','VisitasController@destroy')->name('visitas.delete');

});

//Previsitas

Route::resource('previsitas', 'PreVisitasController',
    ['except' => ['show']
]);

Route::prefix('previsitas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'PreVisitasController@index')->name('previsitas.listado');

    //Delete

    Route::get('{id}/delete', 'PreVisitasController@destroy')->name('previsitas.delete');

});

//Tablets

Route::resource('tablets', 'TabletsController',
    ['except' => ['show']
]);

Route::prefix('tablets')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'TabletsController@index')->name('tablets.listado');

    //Delete

    Route::get('{id}/delete', 'TabletsController@destroy')->name('previsitas.delete');

});

//Configuracion

Route::prefix('configuracion')->group(function () {

    Route::get('visitas', 'ConfiguracionesController@visitas')->name('configuracion.visitas');

    Route::get('notificacion', 'ConfiguracionesController@notificacion')->name('configuracion.notificacion');

    Route::prefix('guardar')->group(function () {

        Route::patch('visitas/{id}', 'ConfiguracionesController@guardarVisita')->name('configuracion.visita.guardar');

        Route::patch('notificacion/{id}', 'ConfiguracionesController@guardarNotificacion')->name('configuracion.notificacion.guardar');

    });

});

//SINIESTROS 

//Principal

Route::get('modulo/siniestros/principal', function () {
    return view('moduloSiniestros.index');
})->name('siniestros.principal');

//Create/Update/Index

Route::resource('siniestros', 'SiniestrosController',
    ['except' => ['show']
]);

Route::prefix('siniestros')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'SiniestrosController@index')->name('siniestros.listado');

    Route::match(['get', 'post'],'informes', 'SiniestrosController@informes')->name('informes.listado');

    //Delete

    Route::get('{id}/delete', 'SiniestrosController@destroy')->name('siniestros.delete');

    //Excel Siniestro

    Route::get('{id}/excelSiniestro','SiniestrosController@excelPorSiniestro')->name('siniestros.excel');

    Route::prefix('siniestro')->group(function () {

        Route::prefix('danio')->group(function () {

            //SINIESTROS DANIO

            Route::post('', 'SiniestrosDanioController@store')->name('siniestro.danio.store');

            Route::get('{id}/create','SiniestrosDanioController@create')->name('siniestro.danio.create');

            Route::get('{id}/delete','SiniestrosDanioController@destroy')->name('siniestro.danio.delete');

        });

        Route::prefix('reclamante')->group(function () {

            //SINIESTROS RECLAMANTE

            Route::post('', 'SiniestrosReclamanteController@store')->name('siniestro.reclamante.store');

            Route::get('{id}/create', 'SiniestrosReclamanteController@create')->name('siniestro.reclamante.create');

            Route::get('{id}/delete','SiniestrosReclamanteController@destroy')->name('siniestro.reclamante.delete');

        });

    });

});

//RECLAMANTES

//Create/Update/Index

Route::resource('reclamantes', 'ReclamantesController',
    ['except' => ['show']
]);

Route::prefix('reclamantes')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'ReclamantesController@index')->name('reclamantes.listado');

    //Delete

    Route::get('{id}/delete',  'ReclamantesController@destroy')->name('reclamantes.delete');

});

//MAQUINAS

//Create/Update/Index

Route::resource('maquinas', 'MaquinasController',
    ['except' => ['show']
]);

Route::prefix('maquinas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'MaquinasController@index')->name('maquinas.listado');

    //Delete

    Route::get('{id}/delete', 'MaquinasController@destroy')->name('maquinas.delete');

});

//TIPOS DE POLIZAS

//Create/Update/Index

Route::resource('polizas', 'PolizasController',
    ['except' => ['show']
]);

Route::prefix('polizas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'PolizasController@index')->name('polizas.listado');

    //Delete

    Route::get('{id}/delete', 'PolizasController@destroy')->name('polizas.delete');

});

//ELEMENTOS DAÑADOS

//Create/Update/Index

Route::resource('elementos', 'ElementosController',
    ['except' => ['show']
]);

Route::prefix('elementos')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'ElementosController@index')->name('elementos.listado');

    //Delete

    Route::get('{id}/delete', 'ElementosController@destroy')->name('elementos.delete');

});

//TIPOS DE OBJETOS

//Create/Update/Index

Route::resource('objetos', 'ObjetosController',
    ['except' => ['show']
]);

Route::prefix('objetos')->group(function () {

    //Datatable

     Route::match(['get', 'post'],'listado', 'ObjetosController@index')->name('objetos.listado');

    //Delete

    Route::get('{id}/delete','ObjetosController@destroy')->name('objetos.delete');

});

//ESTADISTICA

//Principal

Route::get('modulo/estadistica/principal', function () {
    return view('moduloEstadistica.index');
})->name('estadistica.principal');

//Camiones

Route::get('camiones', 'CamionesController@index')->name('camiones');

Route::post('camiones/store', 'CamionesController@store')->name('camiones.store');

//Escalas

Route::prefix('escalas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'buscar', 'EscalasController@listado')->name('estadisticas.escalas.listado');

});

//Estancias

Route::prefix('estancias')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'buscar', 'EstanciasController@listado')->name('estadisticas.estancias.listado');

});

//ADMINISTRACIÖN DEL SISTEMA

//Principal

Route::get('modulo/administracion/principal', function () {
    return view('moduloAdministracion.index');
})->name('administracion.principal');

//Priagelines

Route::resource('priagelines', 'PriagelinesController',
    ['except' => ['show']
]);

Route::prefix('priagelines')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'PriagelinesController@index')->name('priagelines.listado');

    //Delete

    Route::get('{id}/delete', 'PriagelinesController@destroy')->name('priagelines.delete');

});

//Rutas

Route::prefix('rutas')->group(function () {

    Route::get('', 'RutasController@index');

    Route::prefix('guardar')->group(function () {

        Route::patch('{id}','RutasController@guardar')->name('rutas.guardar');

    });

});

//Seguridad

//Usuarios

Route::resource('usuarios', 'UsuariosController',
    ['except' => ['show']
]);

Route::prefix('usuarios')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'UsuariosController@index')->name('usuarios.listado');

    //Delete

    Route::get('{id}/delete', 'UsuariosController@destroy')->name('usuarios.delete');

    Route::prefix('informes')->group(function () {

        //Informes

        Route::get('', 'UsuariosController@informes')->name('usuarios.informes');

        //Excel

        Route::get('excel', 'UsuariosController@excel')->name('usuarios.excel');

    });

});

//Departamentos

Route::resource('departamentos', 'DepartamentosController',
    ['except' => ['show']
]);


Route::prefix('departamentos')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'DepartamentosController@index')->name('departamentos.listado');

    //Delete

    Route::get('{id}/delete', 'DepartamentosController@destroy')->name('departamentos.delete');

});

//Permisos

Route::resource('permisos', 'PermisosController',
    ['except' => ['show','create','delete','edit','update']
]);

Route::prefix('permisos')->group(function () {

    //Table

    Route::get('listado', 'PermisosController@index')->name('permisos.listado');

    Route::post('guardar', 'PermisosController@store')->name('permisos.guardar');

    Route::get('excel', 'PermisosController@excel')->name('permisos.excel');

});

//Programador

//Libros

Route::resource('libros', 'LibrosController',
    ['except' => ['show','create']
]);

Route::prefix('libros')->group(function () {

    Route::get('general', 'LibrosController@index')->name('libros.general');

    Route::get('libros', 'LibrosController@libros')->name('libros.libros');

    Route::get('cargar', 'LibrosController@cargar')->name('libros.cargar');

    Route::get('{id}/create','LibrosController@create')->name('libros.create');

    //Delete

    Route::get('{id}/delete', 'LibrosController@destroy')->name('libros.delete');

    //Parametros

    Route::prefix('guardar')->group(function () {

         Route::patch('{id}', 'LibrosController@updateIndex')->name('libros.general.guardar');

    });

});

//Estancias

Route::resource('estancias', 'EstanciasController',
    ['except' => ['show','edit','create','destroy']
]);

Route::prefix('estancias')->group(function () {

    //General

    Route::get('general', 'EstanciasController@index')->name('estancias.general');

    //Correos

    Route::prefix('correos')->group(function () {

        Route::get('', 'EstanciasController@correos')->name('estancias.correos');

        Route::prefix('guardar')->group(function () {

            Route::patch('{id}', 'EstanciasController@updateCorreos')->name('estancias.correos.guardar');
   
       });

    });

    //Parametros

    Route::get('parametros', 'EstanciasController@create')->name('estancias.create');

});

//Escalas

Route::resource('escalas', 'EscalasController',
    ['except' => ['show','edit','store','destroy']
]);

Route::prefix('escalas')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'EscalasController@index')->name('escalas.listado');

    //Parametros

    Route::get('parametros', 'EscalasController@create')->name('escalas.create');

});

//DEPOSITO ADUANERO

//Principal

Route::get('modulo/depositoaduanero/principal', function () {
    return view('moduloDepositoAduanero.index');
})->name('deposito-aduanero.principal');

//Clientes

Route::resource('clientes', 'ClientesController',
    ['except' => ['show']
]);

Route::prefix('clientes')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'ClientesController@index')->name('clientes.listado');

    //Delete

    Route::get('{id}/delete', 'ClientesController@destroy')->name('clientes.delete');

});

//Intermediarios

Route::resource('intermediarios', 'IntermediariosController',
    ['except' => ['show']
]);

Route::prefix('intermediarios')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'IntermediariosController@index')->name('intermediarios.listado');

    //Delete

    Route::get('{id}/delete', 'IntermediariosController@destroy')->name('intermediarios.delete');

});

//Operaciones

Route::resource('operaciones', 'OperacionesController',
    ['except' => ['show']
]);

Route::prefix('operaciones')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'OperacionesController@index')->name('operaciones.listado');

    //Create

    Route::get('{id}/create', 'OperacionesController@create')->name('operaciones.create');

    //Delete

    Route::get('{id}/delete', 'OperacionesController@destroy')->name('operaciones.delete');

});

//Expedientes

Route::resource('expedientes', 'ExpedientesController',
    ['except' => ['show']
]);

Route::prefix('expedientes')->group(function () {

    //Datatable

    Route::match(['get', 'post'],'listado', 'ExpedientesController@index')->name('expedientes.listado');

    //Delete

    Route::get('{id}/delete', 'ExpedientesController@destroy')->name('expedientes.delete');

});






