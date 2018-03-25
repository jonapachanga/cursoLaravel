<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\MessageWasReceived;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    function __construct(){

        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages = DB::table('messages')->get(); // Query Builder

        $messages = Message::with(['user', 'note', 'tags'])
                ->orderBy('created_at', \request('sorted', 'DESC'))
                ->paginate(10); // Eloquent
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        // Eloquent Forma 2
        //Model::unguard(); // Deshabilitar la asignacion de proteccion masiva

        $message = Message::create($request->all());

        //Redireccionar

        if (auth()->check()) 
        {
            auth()->user()->messages()->save($message);
        }
        Alert::message('Hemos recibido el mensaje!');

        event(new MessageWasReceived($message));

        
        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //$message = DB::table('messages')->where('id', $id)->first();

        $message = Message::findOrFail($id); // Eloquent

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id); // Eloquent
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {
        // Actualizar el mensaje
        // DB::table('messages')->where('id', $id)->update([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now(),
        // ]);

        // Eloquent
        Message::findOrFail($id)->update($request->all());

        //Redireccionar

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('messages')->where('id', $id)->delete();
        Message::findOrFail($id)->delete();

        Alert::success('Mesaje eliminado!')->persistent("Cerrar");

        return redirect()->route('mensajes.index');
    }
}
