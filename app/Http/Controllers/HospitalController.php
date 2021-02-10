<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PacienteController;
use App\Models\Categoria;
use App\Models\Hospital;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pacientes-list|pacientes-create|pacientes-edit|pacientes-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:pacientes-create', ['only' => ['create','store']]);
         $this->middleware('permission:pacientes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pacientes-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $hospital = Hospital::orderby('id', 'asc')->paginate();
            return view('hospital.index',['itens' => $hospital]);
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
    public function show($id){

     return view('hospital.vizualiza',['id'=>$id]);
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




    public function id($id){
        return  $id;
    }

    public function selectCliente() {
        $results = Pacientes::select('select * from cliente where id = ?', [1]);

        return response()->view('hospital.vizualiza',$results);
    }






}
