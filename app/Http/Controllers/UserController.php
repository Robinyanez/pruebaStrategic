<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Str;
use Http;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{

            $user = new Prueba;
            $user->first_name       = Str::upper($request->get('first_name'));
            $user->last_name        = Str::upper($request->get('last_name'));
            $user->document         = $request->get('document');
            $user->email            = $request->get('email');
            $user->phone            = $request->get('phone');
            $user->mobile_phone     = $request->get('mobile_phone');
            $user->address          = Str::upper($request->get('address'));
            $user->birthdate        = $request->get('birthdate');
            $user->second_name      = Str::upper($request->get('second_name'));
            $user->second_last_name = Str::upper($request->get('second_last_name'));
            /* dd($user); */
            $user->save();

            session()->flash('success', 'Su registro se ingreso correctamente');
            return redirect()->route('user.index');

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar el formulario');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Prueba::findOrFail($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Prueba::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{

            $user = Prueba::findOrFail($id);
            $user->first_name       = Str::upper($request->get('first_name'));
            $user->last_name        = Str::upper($request->get('last_name'));
            $user->document         = $request->get('document');
            $user->email            = $request->get('email');
            $user->phone            = $request->get('phone');
            $user->mobile_phone     = $request->get('mobile_phone');
            $user->address          = Str::upper($request->get('address'));
            $user->birthdate        = $request->get('birthdate');
            $user->second_name      = Str::upper($request->get('second_name'));
            $user->second_last_name = Str::upper($request->get('second_last_name'));
            /* dd($user); */
            $user->save();

            session()->flash('success', 'Su registro se actualizo correctamente');
            return redirect()->route('user.index');

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar el formulario');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $user = Prueba::findOrFail($id);
            $user->delete();

            session()->flash('success', 'Su registro se elimino correctamente');
            return redirect()->back();

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar la acción');
            return redirect()->back();
        }
    }

    /**
     * getDataHttp
     *
     * @return void
     */
    public function getDataHttp()
    {

        /* Variables para en consumo de WS */
        $urlAuth = 'http://3.208.158.199/magnussucre/wsdl/tokenApp';
        $urlData = 'http://3.208.158.199/magnussucre/wsdl/customerApp';
        $username = 'SEGUROS';
        $password = 'pruebas2021*';
        $grant_type = 'client_credentials';
        $document = '1757612005';

        $responseAuth = Http::withBasicAuth($username,$password)->post($urlAuth,['grant_type' => $grant_type]);
        $responseAuth = $responseAuth->json();

        $responseData = Http::withToken($responseAuth['token'])->post($urlData,['document' => $document]);
        $responseData = $responseData->json();

        /* Variables para el mensaje en caso de fallar el ingreso */
        $httpDocument = $responseData['mensaje']['document'];
        $httpEmail = $responseData['mensaje']['email'];

        /* Metodo para crear el registro del consumo de WS */
        try{

            $user = new Prueba;
            $user->first_name       = Str::upper($responseData['mensaje']['first_name']);
            $user->last_name        = Str::upper($responseData['mensaje']['last_name']);
            $user->document         = $responseData['mensaje']['document'];
            $user->email            = $responseData['mensaje']['email'];
            $user->phone            = $responseData['mensaje']['phone'];
            $user->mobile_phone     = $responseData['mensaje']['mobile_phone'];
            $user->address          = Str::upper($responseData['mensaje']['address']);
            $user->birthdate        = $responseData['mensaje']['birthdate'];
            $user->second_name      = Str::upper($responseData['mensaje']['second_name']);
            $user->second_last_name = Str::upper($responseData['mensaje']['second_last_name']);
            $user->save();

            session()->flash('success', 'Su registro se ingreso correctamente');
            return redirect()->route('user.index');

        }catch(\Exception $e){

            session()->flash('error', 'El registro ya existe y no puede volver hacer cargado nuevamente,
                                intente eliminando el registro con la Cédula: '.$httpDocument.' o con el E-mail: '.$httpEmail);
            return redirect()->back();

        }
    }
}
