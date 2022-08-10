<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Servico::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Servico::create($request->all())){
            return response()->json(['msg'=>'Serviço criado com sucesso'],201) ;
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
        $servico = Servico::find($id);
        if ($servico){
            return $servico;
        }else {
            return response()->json(['msg'=>'Servico não encontrado'],404) ;
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
        $servico = Servico::find($id);
        if ($servico){
            $servico->update($request->all());
            return $servico;
        }else {
            return response()->json(['msg'=>'Serviço não encontrado'],404) ;
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
        if (Servico::destroy($id)){
            response()->json(['msg'=>'Deletado com sucesso'],202);
        }else {
            return response()->json(['msg'=>'Não foi possivel deletar'],500);
        }
    }
}
