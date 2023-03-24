@extends('layouts.plantilla')

@section('title', 'Mis bonos obtenidos')

@section('content')

  {{-- ? Aqui --}}
  <div class="container-fluid ms-3">
    <section>
      <div class="row">
        <div class="col-12 mt-3">
            <h1>Mis bonos obtenidos</h1>
        </div>
      </div>
      <div class="row mt-4">
        @foreach ($registros as $item)                
            <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                        <div>
                            <h4>{{$item->bono->nombre}}</h4>
                            <p class="mb-0">{{$item->bono->descripcion}}.</p>
                            <p><strong>Monto:</strong> ${{$item->bono->cantidad}}</p>
                        </div>
                    </div>
                    <div class="align-self-center mx-3">
                      <p class="h4 mb-0">Obtenido el:</p>
                      <p class="h5 mb-0">{{$item->fecha}}</p>
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