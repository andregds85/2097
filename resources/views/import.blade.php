@extends('layouts.app')
@section('content')

<div class="container">
	<h3>Importa e Exporta Usuários EXCEL</h3>
	<form action="{{ url('import') }}" method="POST" name="importform"
	  enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="file">File:</label>
			<input id="file" type="file" name="file" class="form-control">
		</div>
		<div class="form-group">
			<a class="btn btn-info" href="{{ url('export') }}">Exportar Arquivo</a>
		</div> 
		<button class="btn btn-success">Importar Arquivo</button>
	</form>
</div>
<br>


<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">Modelo para importar EXCEL</h5>
    <p class="card-text">A extensão do Arquivo XLSX, não colocar a linha 1 da foto. </p>
  </div>
</div>


<div class="card">
  <div class="card-body">
  </div>
  <img class="card-img-bottom" src="../img/foto.jpg" alt="Card image cap">
</div>
@endsection
