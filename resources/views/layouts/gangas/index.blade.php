@extends('layouts/plantilla')
@section('titulo', 'Fitxa post')
@section('contenido')
    <div class="container">
        <div class="row">
    @foreach($gangas as $ganga)
    <div class="card col-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset("storage/img/$ganga->id-ganga-severa.jpg") }}" alt="Card image cap" height="200px" width="200px">
        <div class="card-body">
            <h5 class="card-title">{{ $ganga->title }}</h5>
            <p class="card-text">{{ $ganga->description }}</p>
            <p style="font-size: 30px">{{ $ganga->price }} € <label style="font-size: 15px"><del>{{ $ganga->price_sale }}€</del></label></p>
            <a href="ganga/{{ $ganga->id }}" class="btn btn-primary">Detalles</a>
            <div class="mt-3">
                <label><button class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.559 5.448a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zm-.07-5.448c1.397-.864 3.543 1.838-.953 3.434-3.067-3.554.19-4.858.952-3.434z"/>
                            </svg></button></label>
                {{ $ganga->likes }}
                <label><button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-frown-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm-2.715 5.933a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 0 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
                            </svg></button></label>
                {{ $ganga->unlikes }}
            </div>
        </div>

    </div>
    @endforeach
        </div>
    </div>
@endsection
