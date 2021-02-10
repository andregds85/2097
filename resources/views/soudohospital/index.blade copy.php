@extends('layouts.app')

@section('content')




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
            <th>id</th>
            <th>Hospital</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach($tabela as $item)
	    <tr>

            <td>{{ $item->id }}</td>

            <td>{{ $item->name }}</td>



	        <td>
            <form action="{{ route('hospital.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('hospital.show',$item->id) }}">Mostrar</a>


                </form>
	        </td>
        </tr>
        @endforeach

    </table>







<p class="text-center text-primary"><small>Hospital</small></p>
@endsection
