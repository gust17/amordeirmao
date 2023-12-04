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

<div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar rifas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{'consulta'}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Digite seu telefone</label>
                        <input type="text" name="telefone" class="form-control telefone">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-success">Consultar</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <center><h1>Ação entre Amigos</h1></center>
    <div class="container text-justify">
        <p>A Família Ferreira promove ação entre amigos em prol de José Afonso de Barros Ferreira, que desde 2022 busca
            diagnóstico conclusivo para Dissinergia, Estenose e Bexiga Hipoativa. Atualmente, encontra-se com uma sonda
            pela
            bexiga, cistostomia, com a informação de uso da sonda para o resto da vida.</p>
        <p>A destinação dos valores será para exames e cirurgia a serem realizados em Porto Alegre/RS. Como retribuição
            serão sorteados no dia 05 de janeiro de 2024 às 20h, no Instagram @josiandreiasf, os seguintes prêmios:</p>

    </div>
    <ul>
        <li> 1º Liquidificador</li>
        <li> 2º Kit Natura</li>
        <li> 3º Kit Natura</li>
    </ul>
    <p>ou ajude por meio da Vakinha </p>
    <a class="btn btn-success" target="_blank" href="https://www.vakinha.com.br/4275963">Clique aqui para colaborar</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal">
        Consulte suas rifas
    </button>
    <br><br>
    <h3>Siga o passo a passo</h3>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{url('cadRifa')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" class="form-control telefone" name="telefone">
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="inputsContainer">
                                <div class="form-group">
                                    <label for="">Escolha seu número</label>
                                    <input type="number" name="numeros[]" class="form-control" min="1" max="5000" oninput="validarNumero(this)">
                                    <p class="mensagemErro" style="color: red;"></p>
                                </div>
                            </div>
                        </div>
                        <label for=""></label>
                        <div class="col-md-4"><button class="btn btn-secondary" type="button" onclick="adicionarInput()">Adicionar número</button></div>
                    </div>
                </div>



                <br>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn w-100 btn-primary">Cadastrar</button>
                </div>
            </form>

        </div>

    </div>

</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Números já adquiridos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse($rifas as $rifa)
                    <div class="col-sm-1">
                        <div class="card text-center">
                            <div class="card-body">
                               <p style="font-size: 12px"> {{$rifa['numero']}}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>

</body>
{{--<script>--}}
{{--    let numerosDigitados = new Set();--}}

{{--    function validarNumero(input) {--}}
{{--        const mensagemErro = input.nextElementSibling;--}}
{{--        const novoNumero = input.value;--}}

{{--        if (numerosDigitados.has(novoNumero)) {--}}
{{--            mensagemErro.textContent = 'Este número já foi digitado. Por favor, escolha outro.';--}}
{{--        } else {--}}
{{--            mensagemErro.textContent = '';--}}
{{--        }--}}
{{--    }--}}

{{--    function adicionarInput() {--}}
{{--        const inputsContainer = document.getElementById('inputsContainer');--}}
{{--        const ultimoInput = inputsContainer.lastElementChild.querySelector('input');--}}
{{--        const ultimoNumero = ultimoInput.value;--}}

{{--        if (numerosDigitados.has(ultimoNumero)) {--}}
{{--            alert('O último número ainda não foi validado. Por favor, escolha outro.');--}}
{{--        } else {--}}
{{--            const novoInput = document.createElement('div');--}}
{{--            novoInput.className = 'form-group';--}}
{{--            novoInput.innerHTML = `--}}
{{--                <label for="">Escolha seu número</label>--}}
{{--                <input type="number" class="form-control" name="numeros[]" oninput="validarNumero(this)">--}}
{{--                <p class="mensagemErro" style="color: red;"></p>--}}
{{--            `;--}}
{{--            inputsContainer.appendChild(novoInput);--}}
{{--            numerosDigitados.add(ultimoNumero);--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function() {
        // Aplica a máscara de telefone ao campo de entrada
        $('.telefone').inputmask('(99) 99999-9999');
    });
</script>

<script>
    let numerosDigitados = new Set();

    function validarNumero(input) {
        const mensagemErro = input.nextElementSibling;
        const novoNumero = input.value.trim(); // Remover espaços em branco

        if (numerosDigitados.has(novoNumero)) {
            mensagemErro.textContent = 'Este número já foi digitado. Por favor, escolha outro.';
        } else {
            mensagemErro.textContent = '';
        }
    }

    function verificarNumero(numero) {
        return new Promise(async (resolve) => {
            try {
                const response = await fetch(`/api/busca/${numero}`);
                const data = await response.json();

                resolve(data.result === 0);
            } catch (error) {
                console.error('Erro ao verificar o número:', error);
                resolve(false);
            }
        });
    }

    async function adicionarInput() {
        const inputsContainer = document.getElementById('inputsContainer');
        const ultimoInput = inputsContainer.lastElementChild.querySelector('input');
        const ultimoNumero = ultimoInput.value.trim(); // Remover espaços em branco

        if (ultimoNumero === '') {
            alert('Por favor, insira um número.');
            return;
        }

        const isValido = await verificarNumero(parseInt(ultimoNumero));

        console.log(ultimoNumero);
        if (numerosDigitados.has(ultimoNumero) || !isValido) {
            alert('Por favor, escolha outro número válido.');
        } else {
            const novoInput = document.createElement('div');
            novoInput.className = 'form-group';
            novoInput.innerHTML = `
                <label for="">Escolha seu número</label>
                <input type="number" class="form-control" name="numeros[]" min="1" max="5000"  oninput="validarNumero(this)">
                <p class="mensagemErro" style="color: red;"></p>
            `;
            inputsContainer.appendChild(novoInput);
            numerosDigitados.add(ultimoNumero);
        }
    }
</script>





</html>
