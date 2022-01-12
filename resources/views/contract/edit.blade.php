@extends('layout.app')
@section('content')
<h2 class="text-center">
    Editando el contrato
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
    <form action="{{route('contract.update',['contract' => $contract->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Personal</label>
                    <select name="user_id" class="form-select">
                     @foreach ($user as $users)
                        <option value="{{$users->id}}" {{$users->id == $contract->user_id ? 'selected': 'No'}}>{{$users->name}} {{$users->lastname}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Cargo Personal</label>
                    <select name="cargo_id" class="form-select mb-3">
                        @foreach ($cargo as $cargos)
                                <option value="{{$cargos->id}}" {{$cargos->id == $contract->cargo_id ? 'selected': ''}}>{{$cargos->nom_cargo}}</option>
                        @endforeach
                    </select>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Inicio</label>
                    <input type="date" name="date_start" class="form-control" value="{{$contract->date_start}}"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Final</label>
                    <input type="date" name="date_end" class="form-control "  value="{{$contract->date_end}}"/>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Inicio</label>
                    <select name="type_contrat" class="form-select">
                        <option value="contrato indefinido" {{$contract->type_contrat == 'contrato indefinido' ? 'selected':''
                        }}>contrato indefinido</option>
                        <option value="contrato de practicas"{{$contract->type_contrat == 'contrato de practicas' ? 'selected':''
                        }}>contrato de practicas</option>
                        <option value="contrato temporal"{{$contract->type_contrat == 'contrato temporal' ? 'selected':''
                        }}>contrato temporal</option>
                        <option value="contrato de formacion" {{$contract->type_contrat == 'contrato de formacion' ? 'selected':''
                        }}>contrato de formación y aprendizaje</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col text-right">
            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
        </div>
    </form>
    
@endsection