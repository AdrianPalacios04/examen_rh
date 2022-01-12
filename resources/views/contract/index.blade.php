@extends('layout.app')
@section('content')
    <h2 class="text-center ">
        Lista de contratos
    </h2> 
    <a href="{{route('contract.create')}}" class="btn btn-warning mb-3 " >
      Nuevo Contrato</a>
      
        <form action="{{route('contract.search')}}" method="get" class="d-inline">
          <div class="col-md-4">
            <div class="form-group">
                <select name="cargo" class="form-select mb-3">
                  @foreach ($cargo as $item)
                      <option value="{{$item->id}}">{{$item->nom_cargo}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        
      
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
            <th scope="col">Personal</th>
            <th scope="col">Cargo Ocupado</th>
            <th scope="col">Area Ocupada</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Final</th>
            <th scope="col">Contrato adquirido</th>
            <th scope="col">Acciones</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($contract as $contracts)
            <tr>
                <td>{{$contracts->user->name}} {{$contracts->user->lastname}}</td>
                  <td>{{$contracts->cargo->nom_cargo}}</td>
                  <td>{{$contracts->cargo->area->nom_area}}</td>
                  <td>{{$contracts->date_start}}</td>
                  <td>{{$contracts->date_end}}</td>
                  <td>{{$contracts->type_contrat}}</td>
                  <td>
                    <a href="{{route('contract.edit',['contract' => $contracts->id])}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                    <form action="{{route('contract.destroy',['contract' => $contracts->id])}}" method="post" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
            </tr>      
            @endforeach
          
        </tbody>
      </table>
@endsection