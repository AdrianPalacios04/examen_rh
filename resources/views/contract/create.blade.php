@extends('layout.app')
@section('content')
<h2 class="text-center">
    Crear nuevo Contrato 
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
    <form action="{{route('contract.store')}}" method="post">
        @csrf
        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Personal</label>
                    <select name="user_id" id="" class="form-select">
                        @foreach ($user as $users)
                            <option value="{{$users->id}}">{{$users->name}} {{$users->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Cargo Personal</label>
                    <select name="cargo_id" class="form-select mb-3">
                        @foreach ($cargo as $cargos)
                                <option value="{{$cargos->id}}">{{$cargos->nom_cargo}}</option>
                        @endforeach
                    </select>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Inicio</label>
                    <input type="date" name="date_start" class="form-control"  min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{Carbon\Carbon::now()->format('Y-m-d')}}"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Final</label>
                    <input type="date" name="date_end" class="form-control " min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{Carbon\Carbon::now()->format('Y-m-d')}}"/>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Inicio</label>
                    <select name="type_contrat" class="form-select">
                        <option value="contrato indefinido">contrato indefinido</option>
                        <option value="contrato de practicas">contrato de practicas</option>
                        <option value="contrato temporal">contrato temporal</option>
                        <option value="contrato de formación y aprendizaje">contrato de formación y aprendizaje</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col text-right">
            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
        </div>
    </form>
    
@endsection