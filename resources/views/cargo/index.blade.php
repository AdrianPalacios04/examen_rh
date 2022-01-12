@extends('layout.app')
@section('content')
  <h2 class="text-center">
      Area y Cargos
  </h2>
  <a href="{{route('cargo.create')}}" class="btn btn-primary">
    Nueva Area
  </a>
  <div class="card-body">
      @if(session('notification'))
        <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
      @endif
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Cargo</th>
        <th scope="col">Area</th>
        {{-- <th scope="col">Acciones</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($cargo as $cargos)
      <tr>
        <td>{{$cargos->nom_cargo}}</td>
        <td>{{$cargos->area->nom_area}}</td>
        {{-- <td>
          <form action="{{route('cargo.destroy',['cargo' => $cargos->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
          </form>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection