@extends('layout.app')
@section('content')
<h2 class="text-center">
   Editar Personal 
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
    <form action="{{route('employee.update',['employee' => $user->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row"> 
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input type="text"  name="name"  class="form-control" value="{{$user->name}}"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input type="text" name="lastname" class="form-control mb-3" value="{{$user->lastname}}" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">DNI</label>
                    <input type="number" name="dni" class="form-control" value="{{$user->dni}}" disabled/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">N° Celular</label>
                    <input type="number" name="phone" class="form-control" value="{{$user->phone}}" />
                    </select>
                </div>  
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="date" value="{{$user->date}}"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>  
                
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Estado</label>
                    <select name="status" class="form-select">
                        <option value="activo" {{$user->status == 'activo'?'selected':''}}>activo</option>
                        <option value="inactivo" {{$user->status == 'inactivo'?'selected':''}}>inactivo</option>
                    </select>
                </div>
            </div>
        </div> 
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
    
@endsection