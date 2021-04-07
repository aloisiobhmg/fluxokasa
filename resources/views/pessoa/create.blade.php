@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css">
    <style>

    </style>

@endsection

@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">Inserir pessoas</h1>
        <div class=" mt-4 mb-8 ml-1">
            <a href="{{ route('index_pessoa') }}"
                class="bg-gray-800 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md  role="
                button" aria-pressed="true">

                voltar

            </a>
        </div>
    </div>


    <div class="main__container">
        <form class="form-group " id="novapessoa" action="{{ route('store_pessoa') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome">

            </div>
            <div class="form-group">
                <label for="Natureza">Natureza</label>
                <select class="form-control" name="Natureza" id="Natureza">
                    <option selected value="Fisica">Fisica</option>
                    <option value="Jurídica ">Jurídica</option>

                </select>
            </div>
            <div class="form-group">
                <label for="Endereço">Endereço</label>
                <input type="text" name="Endereco" class="form-control" id="Endereço" placeholder="Endereço">

            </div>
            <div class="form-group">
                <label for="Telefone">Telefone</label>
                <input type="text" name="Telefone" class="form-control telefone" id="Telefone" placeholder="Telefone">

            </div>

            <div class="form-group">
                <label for="EnderecoEmail">Endereço de email</label>
                <input type="email" class="form-control" name='EnderecoEmail' id="EnderecoEmail"
                    aria-describedby="emailHelp" placeholder="Endereço de email">

            </div>

            <div class="form-group">
                <label for="observacoes">observaçoes</label>
                <textarea class="form-control" name='observacoes' id="observacoes" placeholder=" observacoes"></textarea>

            </div>

            <button class="btn btn-primary" type="submit">Enviar</button>

        </form>

    </div>
@endsection

@section('script')
    {{-- https://codepen.io/riyos94/pen/NXgXdp --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
    <script>
        $(document).ready(function() {
            $('#Telefone').mask('(00) 0 0000-0000');
        });

    </script>





@endsection
