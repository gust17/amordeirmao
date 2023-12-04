<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <title>Rifa Afonso</title>
</head>
<body>
<div class="container">
    <center><h1>Ação entre Amigos</h1></center>
    <h3>Siga o passo a passo</h3>

    <div class="card">
        <div class="card-body text-center">

            <img class="img img-fluid" src="{{asset('img.png')}}" alt="">
            <br>
            <strong>Beneficiário: </strong> Ingrid Clayse D Martins <br>

            <strong>Chave:</strong>(96) 98110-4257 <br>

            <input id="campoParaCopiar" value="00020126360014BR.GOV.BCB.PIX0114+55969811042575204000053039865802BR5923Ingrid Clayse D Martins6006Macapa62070503***6304F9A6"><br>
            <button class="btn btn-secondary" id="botao-copiar" onclick="copiarConteudo()">Copiar</button>

            <hr>
            <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=5596981104257&text=Olá este é compravante do Pix da compra nº {{$rifas[0]['compra']}}">Envie seu comprovante aqui </a>
        </div>

    </div>

</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Seus Dados</h3>
        </div>
        <div class="card-body">
            <p>Nome: {{$rifas[0]['name']}}</p>
            <p>Telefone: {{$rifas[0]['telefone']}}</p>
            <p>Seus Numeros: </p>
            @forelse($rifas as $numero)
                <p>{{$numero->numero}}</p>
            @empty
            @endforelse
            <p>Valor total: R${{count($rifas)*5}}</p>
            <br>
            <br>
            <a href="{{url('pesquisa',$rifas[0]['telefone'])}}" class="btn btn-primary">Confirmar</a>
        </div>
    </div>
</div>

<script>
    function copiarConteudo() {
        // Seleciona o conteúdo do campo de entrada
        var campoParaCopiar = document.getElementById("campoParaCopiar");
        campoParaCopiar.select();

        // Copia o conteúdo para a área de transferência
        document.execCommand("copy");

        // Alerta ou feedback opcional
        alert("Conteúdo copiado para a área de transferência!");
    }
</script>
</body>
</html>
