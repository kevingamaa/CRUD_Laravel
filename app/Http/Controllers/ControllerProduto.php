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
    public function create()
    {

        $cat = Categoria::all();
        return view('novoProduto', compact('cat') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $required = [
            'nome' => 'required|min:3|max:50|unique:produtos',
            'preco'=> 'required|min:3',
            'categoria'=> 'required'
        ];

        $msgs = [
            'required'=> 'O campo :attribute não pode estar em branco',
            'nome.unique' => 'Já existe esse produto',
            'nome.min' => 'O nome deve conter mais de 3 caracteres',
            'nome.max' => 'O nome deve conter menos de 50 caracteres'
        ];

        $request->validate($required, $msgs);

        $prod = new Produto();
        $prod->categoria_id = $request->input('categoria');
        $prod->nome = $request->input('nome');
        $prod->preco = $request->input('preco');
        $prod->estoque += 1;
        $prod->save();

        return redirect('/produtos');
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
            $prod->nome = $request->input('nome');
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
