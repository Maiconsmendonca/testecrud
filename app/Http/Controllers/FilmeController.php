<?php

namespace App\Http\Controllers;

use App\Models\Filme as Filme;
use App\Http\Resources\Filme as FilmeResource;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmes = Filme::paginate(15);
        return FilmeResource::collection($filmes);
    }

    /**

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filme = new Filme;
        $filme-> titulo = $request->input('titulo');
        $filme-> descricao = $request->input('descricao');
        $filme-> categoria = $request->input('categoria');

        if ($filme->save()) {
            return new FilmeResource($filme);
        }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filmes = Filme::findOrFail($id);
        return new FilmeResource($filmes);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filme = Filme::findOrFail($request->id);
        $filme-> titulo = $request->input('titulo');
        $filme-> descricao = $request->input('descricao');
        $filme-> categoria = $request->input('categoria');

        if ($filme->save()) {
            return new FilmeResource($filme);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filme = Filme::findOrFail($id);
        if ($filme->delete()){
            return new FilmeResource($filme);
        }
    }
}
