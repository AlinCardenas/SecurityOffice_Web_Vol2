@extends('layouts.plantilla')

@section('title', 'Bonos disponibles')
    
@section('content')
    {{-- ? Aqui --}}
    <div class="container-fluid ms-3">
        <section>
          <div class="row">
            <div class="col-12 mt-3">
                <h1>Bonos disponibles</h1>
            </div>
          </div>
          <div class="row mt-4">
            @foreach ($registros as $item)                
                <div class="col-xl-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between p-md-1">
                        <div class="d-flex flex-row">
                            <div class="align-self-center me-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/2811/2811487.png" alt="..." width="50" height="50">
                            </div>
                            <div>
                                <h4>{{$item->nombre}}</h4>
                                <p class="mb-0">{{$item->descripcion}}</p>
                            </div>
                        </div>
                        <div class="align-self-center">
                        <h2 class="h1 mb-0">${{$item->cantidad}}</h2>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
        </section>
      </div>
@endsection