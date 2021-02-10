@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Paciente</h2>
            </div>
            <div class="pull-right">
                @can('pacientes-create')
                <a class="btn btn-success" href="{{ route('pacientes.create') }}"> Novo Paciente</a>
                @endcan
            </div>

        </div>
    </div>



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <?php
    use App\Models\Categoria;
    $tabela = categoria::all();
?>


    <table class="table table-bordered">
        <tr>
            <th>Status</th>
            <th>Solicitação</th>
            <th>Hospital</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($pacientes as $paciente)
	    <tr>

            <td>{{ $paciente->statusSolicitacao }}</td>
            <td>{{ $paciente->solicitacao }}</td>
            <?php $a=$paciente->categorias_id; ?>



                @foreach($tabela as $item)
               <?php $b=$item->id; ?>
               <?php  $c=$item->name; ?>

                <?php

                if($b==$a){
                    echo "<td>";
                    echo "$c";
                    echo "</td>";
                } ?>


                @endforeach


	        <td>
            <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pacientes.show',$paciente->id) }}">Mostrar</a>
                    @can('pacientes-edit')
                    <a class="btn btn-primary" href="{{ route('pacientes.edit',$paciente->id) }}">Editar</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('pacientes-delete')
                    <button type="submit" class="btn btn-danger">Apagar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>




    {!! $pacientes->links() !!}
        {!! $pacientes->links() !!}


<p class="text-center text-primary"><small>Pacientes</small></p>
@endsection
