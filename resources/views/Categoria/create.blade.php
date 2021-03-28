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
    <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">Inserir Categorias</h1>
    <div class=" mt-4 mb-8 ml-1">
        <a href="{{ route('index_Categoria') }}"
            class="bg-gray-800 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md  role="
            button" aria-pressed="true">

            voltar

        </a>
    </div>
</div>


    <div class="main__container">
        <form class="form-group " id="novaCategoria" action="{{ route('store_Categoria') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="DescricaoCategora">Descricao</label>
                <input type="text" name="DescricaoCategora" class="form-control" id="DescricaoCategora"
                    placeholder="DescricaoCategora">

            </div>
            <div class="form-group">
                <label for="Ativo">Ativo</label>
                <select class="form-control" name="Ativo" id="Ativo">
                    <option selected value="Sim">Sim</option>
                    <option value="Não">Não</option>

                </select>
            </div>


            <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
       
    </div>
@endsection

@section('script')
    {{-- https://codepen.io/riyos94/pen/NXgXdp --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //      // Default Configuration
        //     toastr.options = {
        //                     'closeButton': true,
        //                     'debug': false,
        //                     'newestOnTop': false,
        //                     'progressBar': false,
        //                     'positionClass': 'toast-top-right',
        //                     'preventDuplicates': false,
        //                     'showDuration': '1000',
        //                     'hideDuration': '1000',
        //                     'timeOut': '5000',
        //                     'extendedTimeOut': '1000',
        //                     'showEasing': 'swing',
        //                     'hideEasing': 'linear',
        //                     'showMethod': 'fadeIn',
        //                     'hideMethod': 'fadeOut',
        //                 }
        //             });

        //     $('#novaCategoria').on("submit", function (e) {

        //         console.log (new FormData(this))
        //         e.preventDefault();
        //         $.ajax({

        //             type: 'POST',
        //             url: "{{ route('store_Categoria') }}",
        //             data: new FormData(this),
        //             processData: false,
        //             contentType: false,
        //             success: function (data) {
        //                 toastr.success('Categoria criada com sucesso');
        //             }

        //         })
        //     });



        //         // Toast Type
        //             $('.btn-success').click(function(event) {
        //                 toastr.success('You clicked Success toast');
        //             });
        //             $('#info').click(function(event) {
        //                 toastr.info('You clicked Info toast')
        //             });
        //             $('#error').click(function(event) {
        //                 toastr.error('You clicked Error Toast')
        //             });
        //             $('#warning').click(function(event) {
        //                 toastr.warning('You clicked Warning Toast')
        //             });

        //         // Toast Image and Progress Bar
        //             $('#image').click(function(event) {
        //                 toastr.options.progressBar = true,
        //                 toastr.info('<img src="https://image.flaticon.com/icons/svg/34/34579.svg" style="width:150px;">', 'Toast Image')
        //             });


        //         // Toast Position
        //             $('#position').click(function(event) {
        //                 var pos = $('input[name=position]:checked', '#positionForm').val();
        //                 toastr.options.positionClass = "toast-" + pos;
        //                 toastr.options.preventDuplicates = false;
        //                 toastr.info('This sample position', 'Toast Position')
        //             });

    </script>


@endsection
