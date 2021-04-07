<?php

namespace App\Http\Controllers;

use App\Models\conta;
use App\Models\Categoria;
use App\Models\pessoas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $listadeconta = conta::All();
        $listadeconta = DB::select(DB::raw("
SELECT contas.id,
        pessoas.name                  AS pessoas,
        categorias.DescricaoCategora  AS categorias,
        (DATE_FORMAT(dataCompra,'%d/%m/%Y')) as dataCompra,
        (
            SELECT pessoas.name
            FROM   pessoas
            WHERE  pessoas.id = contas.centroCusto
        )                             AS centroCusto,
        CONCAT('R$ ', format(valor,2,'de_DE')) AS valor,
        contas.observacoes,
        contas.created_at,
        contas.updated_at
FROM   contas
        INNER JOIN categorias
             ON  categorias.id = contas.categorias_id
        INNER JOIN pessoas
             ON  pessoas.id = contas.pessoas_id
        

        "));


        return view('conta.index', ['listadeconta' => $listadeconta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listadecategoria = categoria::all()->where('Ativo', 'Sim');
        $listadepessoas = pessoas::all();


        return view('conta.create', compact('listadepessoas', 'listadecategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $source = array('.', ',','R$  ');
        $replace = array('', '.','');
        $request['valor'] =  str_replace($source, $replace, $request['valor']);
        $request['valor'] =  str_replace('RS ', '', $request['valor']);
        $request['dataCompra'] = date('Y-m-d', strtotime(str_replace('/', '-', $request['dataCompra'])));
        //dd($request->all());
        $conta = conta::create($request->all());


        if ($conta) {

            return back()
                ->with('alert-success', 'conta criada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function show(conta $conta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function edit(conta $conta)
    {
        $replace = array('', '.','');
        
        $source = array('.', ',','R$  ');
        $conta['valor'] = str_replace($source, $replace, $conta['valor']);
        $conta['valor'] ='R$  '. number_format((float)$conta['valor'], 2, ',', '');
        $listadecategoria = categoria::all()->where('Ativo', 'Sim');
        $listadepessoas = pessoas::all();
        return view('conta.edit', compact('conta','listadecategoria','listadepessoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conta $conta)
    {

        $conta = conta::findOrFail($request->id);
        $source = array('.', ',','R$  ');
        $replace = array('', '.','');
        $request['valor'] =  str_replace($source, $replace, $request['valor']);
        
        //dd( $request['valor']);
        $conta->update($request->all());
        if ($conta) {

            return back()
                ->with('alert-success', 'conta editada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function destroy(conta $conta)
    {
        $conta->delete();

        if ($conta) {
            # Session::flash('alert-success', 'conta excluida com sucesso!');
            return back()
                ->with('alert-success', 'conta excluida com sucesso!');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$conta} não pode ser excluído"]);
    }
}
