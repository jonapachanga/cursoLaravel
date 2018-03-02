<?php

// www.misitio.com = Route::get('/');

// www.misitio.com/contacto = Route::get('contacto', function(){});
    // App\User::create([
    //     'name' => 'Moderador',
    //     'email' => 'mod@email.com',
    //     'role_id' => 2,
    //     'password' => bcrypt('123456'),
    // ]);

    // App\Role::create([
    //     'name' => 'moderador',
    //     'display_name' => 'Moderador del Sitio',
    //     'description' => 'Role que permite administrar los mensajes',
    // ]);

    // App\Role::create([
    //     'name' => 'admin',
    //     'display_name' => 'Administrador del Sitio',
    //     'description' => 'Permite administrar todo el sitio',
    // ]);

// Para ver las consultas sql

//    DB::listen(function ($query){
//        echo "<pre>{ $query->sql }</pre>";
//    });
    
    Route::get('roles', function(){
        return \App\Role::with('user')->get();
    });
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);//->middleware('example');

    Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

    Route::resource('mensajes', 'MessagesController');
    Route::resource('usuarios', 'UsersController');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    //Route::get('login', ['as' => 'login','uses' =>'Auth\LoginController@showLoginForm']);
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    /** 
     * Route::resource('<Ruta>', '<Controller>') Contruye todas las rutas
     */
    // Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
    // Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    // Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    // Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    // Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
    // Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    // Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);