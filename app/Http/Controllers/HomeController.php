<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeServices;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(HomeServices $homeServices, Request $request)
    {
        $this->homeServices = $homeServices;
        $this->request = $request;
    }

    public function index()
    {
        $listClientes = $this->homeServices->listCliente();
        $maiorCompra = $this->homeServices->maiorCompra();
        $ano = $this->request['parameters'] == null ? "2018" : $this->request['parameters'];
        $listaClienteComprante = $this->homeServices->listaClienteComprante($ano);
        $recomendado = $this->homeServices->recomendado();
        return view('home', compact('listClientes','maiorCompra', 'listaClienteComprante', 'recomendado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
