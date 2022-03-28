@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Home</h1>

    <div class="row justify-content-center">

        <div class="col-lg-10 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">
                    <form method="get" action="" class="form form-horizontal">
                        <div class="form-group row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <select name="tipo" class="form-control" value="">
                                    <option value="">Selecione um tipo</option>
                                    @foreach($veiculos as $veiculo)
                                        <option value="{{ $veiculo->id }}" {{ isset($request['tipo']) && $request['tipo'] == $veiculo->id? 'selected':'' }}>{{ $veiculo->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <input type="text" class="form-control" name="busca" value="{{ isset($request['busca'])?$request['busca']:'' }}" placeholder="Buscar por nome, modelo, versao...">
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <button type="submit" class="btn btn-primary form-control">Filtrar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        @forelse($dicas as $dica)
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-lg-4">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs-left mb-0 font-weight-bold text-gray-800">Tipo: {{ $dica->veiculo->nome }}</div>
                                                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                                    {{ $dica->nome }}</div>
                                                <div class="text-sm-left mb-0 font-weight-bold text-gray-800">{{ $dica->marca }}</div>
                                                <div class="text-sm-left mb-0 font-weight-bold text-gray-800">{{ $dica->modelo }}</div>
                                                @if($dica->versao != "")
                                                    <div class="text-sm-left font-weight-bold text-gray-800">{{ $dica->marca }}</div>
                                                @endif
                                                <div class="row mt-4 justify-content-center">
                                                    <div class="col-8">
                                                        <a role="button" href="{{ route('dicas.show', ['dica' => $dica->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>

                        @empty
                            <div class="h1 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                                Nenhuma dica encontrada
                            </div>
                        @endforelse
                    </div>
                    <div class="row justify-content-center">
                        {{ $dicas->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
