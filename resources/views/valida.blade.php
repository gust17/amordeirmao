
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Numero Rifa</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rifas as $rifa)
                                <tr>
                                    <td>{{$rifa->name}}</td>
                                    <td>{{$rifa->telefone}}</td>
                                    <td>{{$rifa->numero}}</td>
                                    <td>{{$rifa->statusFormat()}}</td>
                                    <td>{{$rifa->created_at->format('d/m/y')}}</td>
                                    <td>
                                        @if($rifa->status == 0)
                                            <a target="_blank" class="btn btn-success"
                                               href="{{url('ativar',$rifa->id)}}">Ativar</a>
                                            <a class="btn btn-danger" href="">Deletar</a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#example', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
            },
        });
    </script>
@endsection
