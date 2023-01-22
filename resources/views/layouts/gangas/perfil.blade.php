@extends('layouts/plantilla')
@section('titulo', 'Fitxa post')
@section('contenido')
    <h1>Perfil</h1>
    <div class="m-0 row justify-content-center align-items-top">
        <div class="card rounded-3 text-black col-auto p-5 text-left p-3 mb-5 bg-white rounded w-50">
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_960_720.png" width="75" height="75">
            <div>
                <label style="font-size: 50px">{{ $user->name }}</label>
            </div>

            <div class="mt-3">
                <p style="font-size: 30px">Email</p>

                <div>
                    <label>{{ $user->email }}</label>
                </div>
            </div>
        </div>
    </div>
    <h1>Tus Chollos</h1>
    <div class="container">
        <div class="row">
            @foreach($gangasUser as $ganga)
                <div class="card col-4 m-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset("storage/img/$ganga->id-ganga-severa.jpg") }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ganga->title }}</h5>
                        <p class="card-text">{{ $ganga->description }}</p>
                        <p>{{ $ganga->price }} $</p>
                        <a href="/ganga/{{ $ganga->id }}" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
