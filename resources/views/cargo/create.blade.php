@extends('layout.app')
@section('content')
    <h2 class="text-center">
        Agregar nuevos Cargos
    </h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('cargo.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre del Cargo</label>
            <input type="text" class="form-control mb-3" id="exampleInputEmail1" name="nom_cargo">
        </div>
        <div class="form-group">
            <label >Area Respectiva</label>
            <select class="form-select mb-3" name="area_id">
                @foreach ($area as $areas)
                    <option value="{{$areas->id}}">{{$areas->nom_area}}</option>
                @endforeach
  
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
    
@endsection