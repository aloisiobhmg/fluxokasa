@extends('layouts.app')

@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

    <style>
    </style>

@endsection
@section('content')

    <div class="d-flex  justify-content-between">
        <h1 class="font-weight-bold mt-4 mb-8 ml-1 text-3xl">pessoas</h1>
        <div class=" mt-4 mb-8 ml-1">
            <a href="{{ route('create_pessoa') }}"
                class="bg-gray-900 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md "
                role="button" aria-pressed="true">
                Inserir
            </a>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold mt-4 mb-8 ml-1 text-2xl">Confirmação de Exclusão </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo apagar <span class="nome font-weight-bold"></span>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Sim</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <table id="TABELA" class="display" cellspacing="0" width="100%">
        <thead>
            <tr class="">
                <th scope="col">name</th>
                <th scope="col">Natureza</th>
                <th scope="col">Endereco</th>
                <th scope="col">Telefone</th>
                <th scope="col">EnderecoEmail</th>
                <th scope="col">observacoes</th>
                <th scope="col">acao</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listadepessoas as $pessoa)
                <tr class="">
                    <td>{{ $pessoa->name }}</td>
                    <td>{{ $pessoa->Natureza }}</td>
                    <td>{{ $pessoa->Endereco }}</td>
                    <td>{{ $pessoa->Telefone }}</td>
                    <td>{{ $pessoa->EnderecoEmail }}</td>
                    <td>{{ $pessoa->observacoes }}</td>
                    <td>
                        <button data-nome="{{ $pessoa->name }}" data-id="{{ $pessoa->id }}"
                            type="button" class="btn btn-danger btn-sm delete ">Delete</button>
                        <a href="{{ 'edit/' . $pessoa->id }}" class="btn btn-success btn-sm " role="button">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
   
    <script>
       
            $('.delete').on('click', function() {
                var nome = $(this).data(
                    'nome'
                ) // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
                var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
                // $('span.nome').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
                $('span.nome').text(nome);
                $('a.delete-yes').attr('href', 'destroy/' +
                    id); // mudar dinamicamente o link, href do botão confirmar da modal
                $('#myModal').modal('show'); // modal aparece
            });

            var table = $('#TABELA').DataTable({
                dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
                "columnDefs": [{
                    className: "d-flex justify-content-around",
                    "targets": [1],
                    "visible": true,
                    "searchable": false
                }],
                buttons: {
                    dom: {
                        container: {
                            tag: 'div',
                            className: 'flexcontent'
                        },
                        buttonLiner: {
                            tag: null
                        }
                    },
                    buttons: [{
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o"></i>CSV',
                        title: 'Titulo de tabla en CSV',
                        titleAttr: 'CSV',
                        className: 'bg-gray-900 hover:bg-gray-700 text-gray-100 hover:text-gray-100 hover:no-underline  py-2 px-4 rounded-md',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        }
                    }, 
                ] }
            });
        
    </script>
@endsection
