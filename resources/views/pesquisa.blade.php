<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <title>Rifa Afonso</title>
</head>
<body>
<div class="container">
    <center><h1>Ação entre Amigos</h1></center>
    <div class="container text-justify">
        <p>A Família Ferreira promove ação entre amigos em prol de José Afonso de Barros Ferreira, que desde 2022 busca
            diagnóstico conclusivo para Dissinergia, Estenose e Bexiga Hipoativa. Atualmente, encontra-se com uma sonda
            pela bexiga, cistostomia, com indicação médica de uso definitivo, ou seja, para o resto da vida.</p>
        <p>Em outra avaliação médica, houve a solicitação de realização de exames específicos em centro
            especializado.Tais exames, disponíveis em poucos Estados do país (São Paulo e Porto Alegre), são essenciais
            para um diagnóstico preciso e tratamento, que deve ser acompanhado por urologista especialista em uretra,
            dada a complexidade do caso, portanto, fora de Macapá.</p>

        <p>A destinação dos valores será para exames e tratamento a serem realizados em Porto Alegre/RS. Como
            retribuição serão sorteados no dia 05 de janeiro de 2024 às 20h, no Instagram @josiandreiasf, os seguintes
            prêmios:</p>
        <h3>Siga o passo a passo</h3>
    </div>
    <ul>
        <li>1 liquidificador</li>
        <li>1 kit Natura Feminino</li>
        <li>1 kit Natura Masculino</li>
        <li>1 kit Boticário</li>
        <li>1 Voucher Massagem Relaxante</li>
    </ul>
    <p>ou ajude por meio da Vakinha </p>
    <a class="btn btn-success" target="_blank" href="https://www.vakinha.com.br/4275963">Clique aqui para colaborar</a>
    <a class="btn btn-warning" href="{{url('/')}}">Voltar</a>
    <br><br>
    <div class="card">
        <div class="card-header"><h3>Número(s) adquirido(s) por {{$rifas[0]['name']}}</h3></div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Número</th>
                    <th>Status</th>
                    <th>Data da compra</th>
                </tr>
                </thead>
                <tbody>
                @forelse($rifas as $rifa)
                    <tr>
                        <td>{{$rifa['name']}}</td>
                        <td>{{$rifa['numero']}}</td>
                        <td>{{$rifa->statusFormat() }}</td>
                        <td>{{$rifa->created_at->format('d/m/Y')}}</td>
                    </tr>
                @empty
                    <h1>Não foram encontrados</h1>

                @endforelse

                </tbody>
            </table>

        </div>

    </div>

</div>
<br>


</body>

</html>
