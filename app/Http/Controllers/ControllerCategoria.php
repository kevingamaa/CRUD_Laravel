<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class ControllerCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        return view('categorias', compact('cats' )) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novacategoria');
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
            'nome' => 'required|min:3|max:50|unique:categorias'
        ];

        $msgs = [
            'nome.required' => 'O nome da categoria é requirido',
            'nome.unique' => 'Já existe essa categoria',
            'nome.min' => 'O nome deve conter mais de 3 caracteres',
            'nome.max' => 'O nome deve conter menos de 50 caracteres'
        ];
        $request->validate($required, $msgs);

        $cat = new Categoria();
        $cat->nome = $request->input('nome');
        $cat->save();
        return redirect('/categorias');
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
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $result =  view('editarCategoria', compact('cat') );
        }else{
            $result = redirect('/categorias');
        }

        return $result;
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
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->nome = $request->input('nome');
            $cat->save();
        }
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if (isset($cat) ) {
            $cat->delete();
        }

        return redirect('/categorias');
    }

    public function destroyAll(){
        $cat = Categoria::where('id','>=',0);
        $cat->delete();
        return redirect('/categorias');
    }




    public function indexJson()
    {
        $cats = Categoria::all();

        header('Content-type: Application/json');

        return json_encode($cats);
    }
}
