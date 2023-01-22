@extends('layouts/plantilla')
@section('titulo', 'Crear')
@section('contenido')
    <div class="row">
        <div>
            <form action="{{ route('ganga.store') }}" method='POST' enctype="multipart/form-data" novalidate>
                @csrf
                <fieldset>
                    <legend class="bg-dark text-white text-center">Añadir Ganga</legend>
                    <!-- Aquí los inputs y botones del form -->
                    <div class="form-group">
                        <label for="newprod-name">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" value="{!! old('titulo') !!}">
                    </div>
                    @if ($errors->has('titulo'))
                        <div class="text-danger">
                            {{ $errors->first('titulo') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Descripcion:</label>
                        <textarea type="text" name="descripcion" class="form-control">{!! old('descripcion') !!}</textarea>
                    </div>
                    @if ($errors->has('descripcion'))
                        <div class="text-danger">
                            {{ $errors->first('descripcion') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Categoria:</label>
                        <select name="categoria">
                            <option value="">--Please choose an option--</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('categoria'))
                        <div class="text-danger">
                            {{ $errors->first('categoria') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Url página:</label>
                        <input type="text" name="pagina" class="form-control" value="{!! old('pagina') !!}">
                    </div>
                    @if ($errors->has('pagina'))
                        <div class="text-danger">
                            {{ $errors->first('pagina') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Precio Actual:</label>
                        <input type="number" name="precioActual" class="form-control" value="{!! old('precioActual') !!}">
                    </div>
                    @if ($errors->has('precioActual'))
                        <div class="text-danger">
                            {{ $errors->first('precioActual') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Precio Anterior:</label>
                        <input type="number" name="precioAntiguo" class="form-control" value="{!! old('precioAntiguo') !!}">
                    </div>
                    @if ($errors->has('precioAntiguo'))
                        <div class="text-danger">
                            {{ $errors->first('precioAntiguo') }}
                        </div>
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="newprod-name">Imagen:</label>
                        <input name="archivo" type="file"/>
                    </div>
                    @if ($errors->has('archivo'))
                        <div class="text-danger">
                            {{ $errors->first('archivo') }}
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </fieldset>
            </form>
        </div>
@endsection
