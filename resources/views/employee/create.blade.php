@extends('layout.app')
@section('content')
<h2 class="text-center">
    Nuevo Empleado
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

    <form action="{{route('employee.store')}}" method="post">
        @csrf
        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input type="text"  name="name"  class="form-control" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input type="text" name="lastname" class="form-control mb-3" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">DNI</label>
                    <input type="number" name="dni" class="form-control " />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">N° Celular</label>
                    <input type="number" name="phone" class="form-control " />
                    </select>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="date" />
                </div>
                <div class="form-group">
                    
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" >
                </div>  
            </div>
        </div>
        
        <div class="col text-right">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    
@endsection