<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use Illuminate\Http\Request;

class ServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Servidor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Servidor::create($request->all())){
            return response()->json(['msg'=>'Servidor criado com sucesso'],201) ;
        }else {
            return response()->json(['msg'=>'Erro durante a inserção de dados'],500) ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $servidor= Servidor::find($id);
        if ( $servidor){
            return  $servidor;
        }else {
            return response()->json(['msg'=>'Servidor não encontrado'],404) ;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $servidor = Servidor::find($id);
        if ($servidor){
            $servidor->update($request->all());
            return $servidor;
        }else {
            return response()->json(['msg'=>'Servidor não encontrado'],404) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (Servidor::destroy($id)){
            response()->json(['msg'=>'Deletado com sucesso'],202);
        }else {
            return response()->json(['msg'=>'Não foi possivel deletar'],500);
        }
    }
}
