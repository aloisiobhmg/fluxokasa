@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css"
        integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://www.tinymce.com/css/codepen.min.css"/>
    <style>

    </style>

@endsection

@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">Inserir conta</h1>
        <div class=" mt-4 mb-8 ml-1">
            <a href="{{ route('index_conta') }}"
                class="bg-gray-800 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md  role="
                button" aria-pressed="true">

                voltar

            </a>
        </div>
    </div>


    <div class="main__container">
        <form class="form-group " id="novaconta" action="{{ route('store_conta') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="pessoas_id">Quem Fez: </label>
                <select class="form-control" name="pessoas_id" id="pessoas_id">
                    @foreach ($listadepessoas as $pessoas)
                        <option selected value="{{ $pessoas->id }}">{{ $pessoas->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="centroCusto">Centro de Custo:</label>
                <select class="form-control" name="centroCusto" id="centroCusto">


                    @foreach ($listadepessoas as $pessoas)
                        <option selected value="{{ $pessoas->id }}">{{ $pessoas->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="dataCompra">Data da compra:</label>
                <input type="text" name="dataCompra" class="form-control" id="dataCompra" placeholder="data">

            </div>
            <div class="form-group">
                <label for="categorias_id">Categorias:</label>
                <select class="form-control" name="categorias_id" id="categorias_id">
                    @foreach ($listadecategoria as $categoria)
                        <option selected value="{{ $categoria->id }}">{{ $categoria->DescricaoCategora }}</option>
                    @endforeach


                </select>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" name="valor" class="form-control" id="valor" placeholder="valor" required
                    onkeyup="formatarcomodinheiro(this);" maxlength="13">

            </div>



            <div class="form-group">
                <label for="observacoes">observacoes</label>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"
        integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg=="
        crossorigin="anonymous"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script>
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

        //     $('#novaconta').on("submit", function (e) {

        //         console.log (new FormData(this))
        //         e.preventDefault();
        //         $.ajax({

        //             type: 'POST',
        //             url: "{{ route('store_conta') }}",
        //             data: new FormData(this),
        //             processData: false,
        //             contentType: false,
        //             success: function (data) {
        //                 toastr.success('conta criada com sucesso');
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
        $(document).ready(function() {
            $("#pessoas_id").select2({
                placeholder: 'Selecione que Efetuou',
                allowClear: true,
            });
            $("#centroCusto").select2({
                placeholder: 'Selecione onde surge o custo',
                allowClear: true,
            });
            $("#categorias_id").select2({
                placeholder: 'Selecione o tipo de custo',
                allowClear: true,
            });

            $('#dataCompra').datepicker();

            tinymce.init({
  selector: 'textarea',
  height: 100,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
        });



        function formatarcomodinheiro(valor) {
            let v = valor.value.replace(/\D/g, '');
            v = (v / 100).toFixed(2) + '';
            v = v.replace(".", ",");
            v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
            v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
            valor.value = 'R$  ' + v;
        }
        formatarcomodinheiro(0);

    </script>


@endsection
