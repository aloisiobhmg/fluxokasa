<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listadeCategorias = Categoria::All();
        return view('Categoria.index', ['listadeCategorias' => $listadeCategorias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategoriaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoriaRequest $request)
    {
        Categoria::create($request->all());
        Session::flash('alert-success', 'Categoria criada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    //public function show(Categoria $categoria)
    public function show($id)
    {
        $dadosCategoria = Categoria::find($id);
        return view('Categoria.update', ['dadosCategoria' => $dadosCategoria]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Categoria $categoria)
    public function update(Request $request)
    {
       
        $data = Categoria::findOrFail($request->id);
       $data->update($request->all());

        
        return back()
        ->with('alert-success', 'Categoria editada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoria::find($id);
        $data->delete();
        Session::flash('alert-success', 'Categoria excluida com sucesso!');
        return redirect('/Categoria/index');
    }
}
