@extends('layout.app')
@section('content')
    <h2 class="text-center ">
        Lista de Empleados
    </h2> 
    <a href="{{route('employee.create')}}" class="btn btn-primary mb-3">
      Nuevo Personal</a>
    @empty($user)
    <div class="alert alert-danger" role="alert">
      No hay contratos!
    </div>
    @else
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
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">DNI</th>
            <th scope="col">N° Celular</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Email</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($user as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->lastname}}</td>
                <td>{{$users->dni}}</td>
                <td>{{$users->phone}}</td>
                <td>{{$users->date}}</td>
                <td>{{$users->email}}</td>
                <td>
                  @if ($users->status == 'activo')
                  <span class="badge bg-success" style="color:white">Activo</span>
                  @else
                  <span class="badge bg-danger" style="color:white">Inactivo</span>    
                  @endif
                </td>
                <td>
                  <a href="{{route('employee.edit',['employee' => $users->id])}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{route('employee.destroy',['employee' => $users->id])}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
            </tr>      
            @endforeach
          
        </tbody>
      </table>
    @endempty
    
@endsection