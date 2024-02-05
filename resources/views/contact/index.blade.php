@extends('templates.template')

@section('head')
    <title>Contato index</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('main')
    <div id="main_table">
        <h1>Index</h1>

        <a id="btn_criar" href="{{ route('contacts-create') }}"><span>Criar</span> <span>+</span></a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="acoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <th scope="row">
                            {{ $contact->id }}
                        </th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td class="d-flex justify-content-between acoes">
                            <abbr onclick="mostrar_popup({{ $contact->id }})" title="Apagar"><a class="acao_apagar"><i
                                        class="fa fa-trash-o"></i></a></abbr>
                            <abbr title="Editar"><a href="{{ route('contacts-edit', ['id' => $contact->id]) }}"
                                    class="acao_editar"><i class="fa fa-pencil"></i></a></abbr>
                            <abbr title="Detalhes"><a href="{{ route('contacts-show', ['id' => $contact->id]) }}"
                                    class="acao_detalhes"><i class="fa fa-file-text-o"></i></a></abbr>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <div id="paginacao">
                {{ $contacts->links('pagination::bootstrap-4') }}
                <span>Total de registros: {{ $contacts->total() }}</span>
            </div>
        </table>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        conteudo_popup = $('#conteudo_popup')[0];

        function mostrar_popup(id) {
            $.get('{{ Request::url() }}' + '/' + id + '/json',
                function(data) {
                    conteudo_popup.innerHTML =
                        `
                        <div class="item_cofirm_deletar">
                            <div class="sub_item">
                                <span>Nome: </span>
                                ${data.name != null ? data.name : '--'}
                            </div>
                            <div class="sub_item">
                                <span>Email: </span>
                                ${data.email != null ? data.email : '--'}
                            </div>
                        </div>
                        <form method="POST" action="${'{{ Request::url() }}' + '/' + id}">
                            @csrf
                            @method('delete')
                            <button >Confirmar</button>
                        </form>
                    `;
                    mostrar_popup_deletar();
                });
        }
    </script>
@endsection
