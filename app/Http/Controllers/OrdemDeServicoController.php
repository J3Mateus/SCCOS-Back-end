<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return OrdemDeServico::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (OrdemDeServico::create($request->all())){
            return response()->json(['msg'=>'Ordem de serviço enviada com sucesso'],201) ;
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
        $OrdemDeServico =  OrdemDeServico::find($id);
        if ($OrdemDeServico){
            return $OrdemDeServico;
        }else {
            return response()->json(['msg'=>'Ordem de serviço não encontrada'],404) ;
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
        $ordemDeServico = OrdemDeServico::find($id);

        if ($ordemDeServico){
            $ordemDeServico->update($request->all());
            return  $ordemDeServico;
        }else {
            return response()->json(['msg'=>'Ordem de serviço não encontrada'],404) ;
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
        if ( OrdemDeServico::destroy($id)){
            response()->json(['msg'=>'Deletado com sucesso'],202);
        }else {
            return response()->json(['msg'=>'Não foi possivel deletar'],500);
        }

    }
}
