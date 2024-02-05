<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @yield('head')
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            CRUD
        </a>
    </nav>

    {{-- Alertas --}}
    <div id="alertas">
        <div id="alert_sucess" class="alert alert-success d-none" role="alert">
            Ação efetuada com <strong>Sucesso</strong>!
        </div>
        <div id="alert_danger" class="alert alert-danger d-none" role="alert">
            <strong>O servidor encontrou uma situação com a qual não sabe lidar!</strong>
        </div>
        <div id="alert_warning" class="alert alert-warning d-none" role="alert">
            Ação <strong>não</strong> efetuada, confira seus dados!
        </div>
        @yield('alert_custom')
    </div>

    {{-- Popup --}}
    <div id="fundo_popup">
        <div class="popup" id="popup_deletar">
            <i class="fa fa-exclamation-triangle"></i>
            <h1>DELETAR</h1>
            <div id="conteudo_popup">

            </div>
            {{--
            <div class="item_cofirm_deletar">
                <div id="item_nome_deletar" class="sub_item">
                    <span>Nome:</span> offkevyn
                </div>
                <div id="item_email_deletar" class="sub_item">
                    <span>Email:</span>
                </div>
            </div>
            <button id="btn_confirm_deleta">Confirmar</button>
            --}}
        </div>
    </div>

    <main>
        @yield('main')
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript">
        @if (session()->has('resposta') || isset($resposta))

            resposta =
                @if (session()->has('resposta'))
                    {{ session('resposta') }}
                @else
                    {{ $resposta }}
                @endif ;

            if (resposta == 200)
                alert = $('#alert_sucess');
            else if (resposta == 400)
                alert = $('#alert_warning');
            else if (resposta == 500)
                alert = $('#alert_danger');

            alertFunction();

            function alertFunction() {
                alert.stop().fadeTo(1, 1).removeClass('d-none');
                window.setTimeout(function() {
                    alert.fadeTo(500, 0).slideUp(500, function() {
                        alert.addClass('d-none');
                    });
                }, 4000);
            }
        @endif
    </script>

    @yield('script')
</body>

</html>
