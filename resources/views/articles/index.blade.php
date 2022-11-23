@extends('layout')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@elseif ($message = session()->get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    <form action="{{ route('articles.index') }}" method="GET">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Filtro por ID</strong>
                <input type="text" name="id" class="form-control" placeholder="Id">
            </div>
            <div class="form-group">
                <strong>Filtro por Nombre</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Filtro por Categoria Nombre</strong>
                <input type="text" name="category_name" class="form-control" placeholder="Category">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <br><br>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Articles</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New article</a>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nro</th>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Status Accessor</th>
        <th>Status Accessor Sale</th>
        <th>Category</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($articles as $key => $article)
    <tr>
        <td>{{ ($key+1) }}</td>
        <td>{{ $article->id }}</td>
        <td>{{ $article->name }}</td>
        <td>{{ $article->description }}</td>
        <td>{{ $article->status }}</td>
        <td>{{ $article->statusFormat }}</td>
        <td>{{ $article->statusFormatSale }}</td>
        <td>@dump($article->category_name)</td>
        <td>
            <a class="btn btn-info" href="{{ route('articles.show', $article->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}">Edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                onClick="return confirm('Esta seguro de eliminar?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
@endsection