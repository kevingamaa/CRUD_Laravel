<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
class ControllerProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Produto::all();
        $cat = Categoria::all();
        return view('produtos', compact(['prod', 'cat']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($error)
    {

        $cat = Categoria::all();
        return view('novoProduto', compact(['cat', 'error']) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = Produto::where('nome', $request->input('nomeProduto') )->first();

        if (!isset($prod)) {
            $newProd = new Produto();
            $newProd->categoria_id = $request->input('categoria');
            $newProd->nome = $request->input('nomeProduto');
            $newProd->preco = $request->input('preco');
            $newProd->estoque += 1;
            $newProd->save();

            $retorno = redirect('/produtos');
        }else{
            $retorno = redirect('/produtos/novo/error');
        }

        return $retorno;
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
        $prod = Produto::find($id);
        $cat = Categoria::all();

        return view('editarProduto', compact(['prod', 'cat']));
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
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->categoria_id = $request->input('categoria');
            $prod->nome = $request->input('nomeProduto');
            $prod->preco = $request->input('preco');
            $prod->estoque = $request->input('estoque');
            $prod->save();
        }

        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->delete();
        }

        return redirect('/produtos');
    }

    public function destroyAll()
    {
        $prod = Produto::where('id','>',0);
        if (isset($prod)) {
            $prod->delete();
        }
        return redirect('/produtos');
    }
}
