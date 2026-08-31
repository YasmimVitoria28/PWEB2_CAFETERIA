<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $dados = Post::all();
        return view('post.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('post.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'numero_pedido' => 'required|integer',
            'nome' => 'required',
            'valor_t' => 'required|numeric',
        ], [
            'numero_pedido.required' => "O :attribute é obrigatorio",
            'nome.required' => "O :attribute é obrigatorio",
            'valor_t.required' => "O :attribute é obrigatorio",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        Post::create($request->all());
        return redirect('post')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Post::find($id);
        return view('post.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        Post::find($id)->update($request->all());
        return redirect('post')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Post::destroy($id);
        return redirect('post')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Post::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Post::all();
        }
        return view('post.list', compact('dados'));
    }
}