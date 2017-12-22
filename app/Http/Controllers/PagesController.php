<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

	protected $request;

	public function __construct(Request $request)
	{
        $this->middleware('example', ['only' => ['home']]);
        //$this->middleware('example', ['except' => ['home']]);
	}


    public function home()

    {
    	return view('home');
    }

    public function saludo($nombre = 'Invitado')	
    
    {
    	$html = "<h2>Contenido Html</h2>";

        $consolas = [
            "Playstation 4",
            "Xbox One",
            "Wii U",
        ];


        return view('saludo', compact('nombre', 'html', 'consolas'));
    }
}
