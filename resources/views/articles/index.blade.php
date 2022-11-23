@extends('layout')

@section('content')
    @if ($message = Session::get('success'))
        {{-- @php
        session()->get('success');
    @endphp --}}
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = session()->get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
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
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $article->description }}</td>
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
