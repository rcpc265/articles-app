@extends('layout')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Article</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('articles.index') }}">Back</a>
        </div>
    </div>
</div>

<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code" value="{{ old('code')}}">
            </div>
            @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name')}}">
            </div>
            @error('name')
            <div class="m-0 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description"
                    placeholder="Description">{{ old('description')}}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{-- <input type="text" name="status" class="form-control" placeholder="Status"
                    value="{{ old('status')}}"> --}}
                <select name="status" class="form-control">
                    <option value="">Eliga una opcion</option>
                    <option value="0">Activo</option>
                    <option value="1">Inactivo</option>
                </select>
            </div>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="text" name="price" class="form-control" placeholder="Precio" value="{{ old('price')}}">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {{-- <input type="text" name="category_id" class="form-control" placeholder="Category id" --}} {{--
                    value="{{ old('category') }}"> --}}
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection