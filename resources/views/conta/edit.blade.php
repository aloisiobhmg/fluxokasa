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
    <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">Editar conta</h1>
    <div class=" mt-4 mb-8 ml-1">
        <a href="{{ route('index_conta') }}"
            class="bg-gray-800 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md  role="
            button" aria-pressed="true">

            voltar

        </a>
    </div>
</div>



<div class="main__container">
    <form class="form-group " id="novaconta" action="{{ route('update_conta') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $conta->id }}">
        <div class="form-group">
            <label for="pessoa_id">pessoa</label>
            <select class="form-control" name="pessoa_id" id="pessoa_id" value = "{{$conta->pessoas_id}}">
                @foreach ($listadepessoas as $pessoa)
                <option selected value="{{$pessoa->id}}">{{$pessoa->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="centroCusto">centro de Custo</label>
            <select class="form-control" name="centroCusto" id="centroCusto" value = "{{$conta->centroCusto}}">
                
                
                @foreach ($listadepessoas as $pessoa)
                <option selected value="{{$pessoa->id}}">{{$pessoa->name}}</option>
                @endforeach
              
            </select>
        </div>
    
        <div class="form-group">
            <label for="dataCompra">data</label>
            <input type="date" name="dataCompra" class="form-control" id="dataCompra"
                placeholder="data" value = "{{$conta->dataCompra}}">

        </div>
        <div class="form-group">
            <label for="categorias_id">categorias</label>
            <select class="form-control" name="categorias_id" id="categorias_id" value = "{{$conta->categorias_id}}">
                @foreach ($listadecategoria as $categoria)
                <option selected value="{{$categoria->id}}">{{$categoria->DescricaoCategora}}</option>
                @endforeach
                

            </select>
        </div>
        <div class="form-group">
            <label for="valor">valor</label>
            <input type="text" name="valor" class="form-control" id="valor"
                placeholder="valor" required onkeyup="formatarcomodinheiro(this);" value = "{{$conta->valor}}" maxlength="13">

        </div>

       

          <div class="form-group">
            <label for="observacoes">observacoes</label>
            <textarea class="form-control" name='observacoes' id="observacoes" placeholder=" observacoes" >{!! $conta->observacoes !!}</textarea>
            
          </div>

        <button class="btn btn-primary" type="submit">Enviar</button>

    </form>
   
</div>
@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"
    integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg=="
    crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script>
<script type="text/javascript">
   

    $(document).ready(function() {
        // alert($('#observacoes').html());
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

// setup: function (editor) {
//       editor.on('init', function (e) {
//         editor.setContent();
//       });
//     }
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
