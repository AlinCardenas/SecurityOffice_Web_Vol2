@extends('layouts.plantilla')

@section('title', 'Mis bonos obtenidos')

@section('content')
    <style>
        card {
          box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
          transition: all 0.2s ease-in-out;
          box-sizing: border-box;
          margin-top:10px;
          margin-bottom:10px;
          background-color:#FFF;
        }

        .card:hover {
          box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }
        .card > .card-inner {
          padding:10px;
        }
        .card .header h2, h3 {
          margin-bottom: 0px;
          margin-top:0px;
        }
        .card .header {
          margin-bottom:5px;
        }
        .card img{
          width:100%;
        }
    </style>
    <h1>Mis bonos obtenidos</h1>
    {{-- ? --}}
    <div class="row row-cols-1 row-cols-md-2 g-4 mx-5">
        @foreach ($registros as $item)
        <div class="col">
            <div class="card">
                <img src="https://picsum.photos/seed/picsum/200/300" class="card-img-top" alt="img" height="150">
                <div class="card-body">
                    <h5 class="card-title">Ganancia: ${{$item->bono->cantidad}}</h5>
                    <h6 class="card-title">Fecha: {{$item->fecha}}</h6>
                    <p class="card-text">{{$item->bono->descripcion}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
@endsection