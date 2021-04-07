<?php

namespace App\Http\Controllers;

use App\Models\pessoas;
use Illuminate\Http\Request;


class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listadepessoas = pessoas::All();
        return view('pessoa.index', ['listadepessoas' => $listadepessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoas = pessoas::create($request->all());
        if ($pessoas) {
           
            return back()
            ->with('alert-success', 'pessoas criada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function show(pessoas $pessoas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function edit(pessoas $pessoas)
    {

        return view('pessoa.edit', compact('pessoas'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pessoas = pessoas::findOrFail($request->id);
        $pessoas->update($request->all());
        if ($pessoas) {
            
            return back()
            ->with('alert-success', 'pessoas editada com sucesso!');
        }
    }
    /*apagar
    public function update(Request $request, Product $product)
{
  $product->update([
    'product_title' => $request->title,
    'product_slug'  => $request->slug,
    'product_image' => $request->image
  ]);

  // redirect
  return redirect('edit');
}
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy(pessoas $pessoas)
    {
        // $customer = Customer::where('id', $id)->delete();
        $pessoas->delete();
        
        if ($pessoas) {
           # Session::flash('alert-success', 'pessoas excluida com sucesso!');
            return redirect('/pessoa/index')
            ->with('alert-success', 'pessoas excluida com sucesso!');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$pessoas} não pode ser excluído"]);
    }
}
