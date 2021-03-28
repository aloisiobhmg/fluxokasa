@extends('layouts.app')

@section('style')


@endsection

@section('content')

<div class="d-flex justify-content-between">
    <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">Editar Categorias</h1>
    <div class=" mt-4 mb-8 ml-1">
        <a href="{{ route('index_Categoria') }}"
            class="bg-gray-800 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md  role="
            button" aria-pressed="true">

            voltar

        </a>
    </div>
</div>



    <form class="form-group " id="update_Categoria" action="{{ route('update_Categoria') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $dadosCategoria->id }}">


        <div class="form-group">
            <label for="DescricaoCategora">Descricao</label>
            <input type="text" name="DescricaoCategora" class="form-control" id="DescricaoCategora"
                value="{{ $dadosCategoria['DescricaoCategora'] }}">

        </div>
        <div class="form-group">
            <label for="Ativo">Ativo</label>
            <select class=" form-control" name="Ativo" id="Ativo" value="{{ $dadosCategoria['Ativo'] }}">
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>

            </select>

        </div>

        <button class="btn btn-primary" type="submit">Enviar</button>

    </form>


@endsection

@section('script')




@endsection
