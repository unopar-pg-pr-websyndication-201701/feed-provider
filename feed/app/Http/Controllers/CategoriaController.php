<?php

namespace Feed\Http\Controllers;

use Illuminate\Http\Request;
use Feed\Http\Requests;
use Feed\Models\Categoria;

class CategoriaController extends Controller
{
    public function listaCategorias(){
        $categorias= Categoria::orderby('nome')->paginate(10);
        return view('categorias.listar_categorias')->with('categorias',$categorias);

    }
    public function novaCategoria(){
        return view('categorias.cadastrar_categorias');
    }
    public function adicionarCategoria(Request $r){

        $this->validate($r, [
            'nome' => 'required|min:3|unique:categorias|regex:/^([a-zA-ZãçÃáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'
        ],[
            'nome.required'=>'Nome Categoria Requerido',
            'nome.min'=>'Requerido no mínino 3 caracteres no campo Nome da Categoria',
            'nome.unique'=>'Nome da Categoria Já Existe',
            'nome.regex'=>'Nome da Categoria permite somente letras',
        ]);

                        
        Categoria::create($r->input());
        return redirect('/categorias')->with('mensagem-sucesso', 'Categoria cadastrada com sucesso!');
    }

    public function alterarCategoria(Categoria $categoria,$id){
        
        $categoria=$categoria->find($id);

        if($categoria !=null){
            $data['categorias']=$categoria;
            return view('categorias.editar_categoria', $data);
        }
        else{
            return redirect('/categorias');
        }
    }

    public function salvarCategoria(Request $request, Categoria $categoria){
        //verifica se existe o id para a alteracao

        if($request->has('id')){
            $categorias= $categoria->find($request->get('id'));

            if($categorias !=null){
                               
                $categorias->update($request->all());
                
                return redirect('/categorias')->with('mensagem-sucesso','Categoria ' . 'Alterada com Sucesso !!');
            }

  

        }
        $this->validate($request, [
            'nome' => 'required|min:3|unique:categorias|regex:/^([a-zA-ZãçÃáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'
        ],[
            'nome.required'=>'Nome Categoria Requerido',
            'nome.min'=>'Requerido no mínino 3 caracteres no campo Nome da Categoria',
            'nome.unique'=>'Nome da Categoria Já Existe',
            'nome.regex'=>'Nome da Categoria permite somente letras',
        ]);

        $categorias->create($request->all());
        return redirect('/categorias');
    }


    public function removerCategoria($id){
        $categoria=Categoria::find($id);
        $categoria->delete();
        return redirect()->action('CategoriaController@listaCategorias')->with('mensagem-sucesso','categoria ' . 'Excluída com Sucesso !!');
    }
}

