<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('formularios')
            ->orderByRaw('nivel DESC')
            ->get();

        return $orders;
    }

    /**
     * Display a listing of the resoucer
     * @return \Illuminate\Support\Collection
     */
    public function formForServico()
    {
        return DB::table('servicos')
            ->join('formularios','formularios.idServico','=','servicos.id')
            ->select('formularios.*', 'servicos.nome as nomeServico', 'servicos.tipo as tipoServico')
            ->get();
    }

    /**
     * Display a listing of the resoucer
     * @return \Illuminate\Http\JsonResponse
     */
    public function formForServicoOfId($id)
    {
       $formulario= DB::table('formularios')
            ->join('servicos','formularios.id','=','servicos.id')
            ->select('formularios.*', 'servicos.nome as nomeServico', 'servicos.tipo as tipoServico')
            ->where('servicos.id','=',$id)
            ->get();
       if ($formulario){
           return  response()->json($formulario);
       }else{
          return  response()->json(['msg'=>'Registro não encontrado'],404) ;
       }
    }

    /**
     * Display a listing of the resoucer
     * @return \Illuminate\Http\JsonResponse
     */
    public function formResolved()
    {
        $formulario = DB::table('formularios')
            ->where('realizada', '=', 1)
            ->orderByRaw('datahorasolicitacao DESC')
            ->get();

        if ($formulario){
            return  response()->json($formulario);
        }else{
            return  response()->json(['msg'=>'Registro não encontrado'],404) ;
        }
    }

    /**
     * Display a listing of the resoucer
     * @return \Illuminate\Http\JsonResponse
     */
    public function formnotResolved()
    {
        $formulario = DB::table('formularios')
            ->where('realizada', '=', 0)
            ->orderByRaw('dataHoraSolicitacao DESC')
            ->get();

        if ($formulario){
            return  response()->json($formulario);
        }else{
            return  response()->json(['msg'=>'Registro não encontrado'],404) ;
        }
    }

    public function Resolved($id)
    {
        $affected = DB::table('formularios')
            ->where('id', '=',$id)
            ->update(['realizada' => 1]);
        if ($affected > 0){
            $response = ['msg'=>"Resolvida com sucesso"];
            return response()->json($response,200);
        }else{
            return response()->json(['msg'=>'error'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Support\Collection
     */
    public function formCreateForServidor()
    {
        $users = DB::table('formularios')
            ->join('ordem_de_servicos', 'formularios.id', '=', 'ordem_de_servicos.idFormulario')
            ->join('servicos','servicos.id','=','ordem_de_servicos.idServico')
            ->join('servidors', 'servidors.id', '=', 'ordem_de_servicos.idServidor')
            ->select(
                'formularios.nomeOS',
                'formularios.nivel',
                'formularios.dataHoraSolicitacao',
                'formularios.realizada',
                'formularios.descricao',
                'formularios.local',
                'servicos.nome as nomeServico',
                'servicos.tipo as tipoServico',
                'servidors.nomeUsuario as nomeServidor')
            ->get();
        return $users;
    }

    public function formCreateForMy($id)
    {
        $users = DB::table('formularios')
            ->join('ordem_de_servicos', 'formularios.id', '=', 'ordem_de_servicos.idFormulario')
            ->join('servicos','servicos.id','=','ordem_de_servicos.idServico')
            ->join('servidors', 'servidors.id', '=', 'ordem_de_servicos.idServidor')
            ->where('ordem_de_servicos.idServidor','=',$id)
            ->select(
                'formularios.nomeOS',
                'formularios.nivel',
                'formularios.dataHoraSolicitacao',
                'formularios.realizada',
                'formularios.descricao',
                'formularios.local',
                'servicos.nome as nomeServico',
                'servicos.tipo as tipoServico',
                'servidors.nomeUsuario as nomeServidor')
            ->get();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Formulario::create($request->all())){
            return response()->json(['msg'=>'Formulario enviado com sucesso'],201) ;
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
        $formulario = Formulario::find($id);
        if ($formulario){
            return $formulario;
        }else {
            return response()->json(['msg'=>'Formulario não encontrado'],404) ;
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
        $formulario = Formulario::find($id);
        if ($formulario){
            $formulario->update($request->all());
            return $formulario;
        }else {
            return response()->json(['msg'=>'Formulario não encontrado'],404) ;
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
        if (Formulario::destroy($id)){
            response()->json(['msg'=>'Deletado com sucesso'],202);
        }else {
            return response()->json(['msg'=>'Não foi possivel deletar'],500);
        }

    }
}
