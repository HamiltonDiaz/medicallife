@foreach ($products as $product)
    <!-- Modal ver-->
    <div class="modal fade" id="modalVer{{ $product->id }}" tabindex="-2"
        aria-labelledby="modalVer{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="titulos-modal modal-title text-uppercase" id="modalVer{{ $product->id }}">
                        {{ $product->nombre }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid text-center">
                        <img id="viewimg{{ $product->id }}" width="250px" height="300px"
                            src="{{ asset('storage/img') }}/{{ $product->img }} " alt="Sin imagen">
                    </div>
                    <small>*Esta una imagen de referencia, puede presentar variaciones.*</small>
                    <h6><b>Referencia:</b> {{ $product->referencia}}</h6>                    
                    <h6><b>Descripción:</b></h6>
                    <p style="word-break: break-all !important;"> {{ $product->descripcion }}</p>

                    <div class="text-right">
                        <b>Precio:</b>
                        <a class="btn btn-success"
                            href="https://api.whatsapp.com/send?phone={{ env('WHATSAPP_NUMBER') }}&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20sobre%20este%20producto%20{{ $product->nombre }}%20{{ route('welcome') . '/us/product/' . $product->id }}"
                            target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid text-center">
                        <button type="button" class="btn bg-registro" data-dismiss="modal"><i class="fa fa-power-off"
                                aria-hidden="true"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @extends('layouts.app')

@endforeach

@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-12 border rounded ml-4">
            <h6>Buscar</h6>
            <form action="{{ Route('filterproductname') }}" method="GET">
                {{-- <form action="" method="GET" > --}}
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="findprod" id="findprod" placeholder="Nombre producto">
                    <input class="form-check-input" type="hidden" value="" name="linea[]">
                </div>
                <div class="text-right mb-2">
                    <button type="submit" class="btn btn-success" style="color: white" >Buscar</button>
                </div>
            
                <hr>
            </form>

            <form action="{{ Route('filterproduct') }}" method="GET">
                <h6>Filtrar</h6>
            
                {{-- <form action="" method="GET" > --}}
                @csrf
                @foreach ($lines as $item)
                    <div class="form-check">
                        <input type="hidden" name="findprod" id="findprod">
                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="linea[]"
                            id="linea{{ $item->id }}">
                        <label class="form-check-label" for="linea">
                            {{ $item->nombre }}
                        </label>
                    </div>
                @endforeach
                <div class="text-right mb-2">
                    <button type="submit" class="btn btn-success" style="color: white" >Filtrar</button>
                </div>
            </form>
        </div>

        <div class="container col-xl-9 col-lg-9 col-md-9 col-sm-11 col-11 ">

            @if ($products)
                @if ($products[0])
                    <div class="text-center">
                        <h1 class="titulos-inicio">
                            @if ($filtro == 1)
                                {{ 'Filtrado' }}
                                <h6>
                                    (
                                        @if ($_GET['findprod']!="" )
                                            Producto: "{{$_GET['findprod']}}"
                                        @endif

                                        @foreach ($_GET['linea'] as $item)
                                            @foreach ($lines as $ln)
                                                @if ($item == $ln->id)
                                                    {{ $ln->nombre }}
                                                @endif
                                            @endforeach
                                        @endforeach
                                    )
                                </h6>
                            @elseif ($filtro==2)
                                {{ 'Todos' }}
                            @else
                                {{ $products[0]->linea }}
                            @endif
                        </h1>
                    </div>
                @else
                    <div class="container py-5 col-12">
                        <div class="alert alert-danger text-center " role="alert">
                            ¡No existen productos con estos parámetros!
                        </div>
                    </div>
                @endif
            @else
                <div class="container py-5 col-12">
                    <div class="alert alert-danger text-center " role="alert">
                        ¡No existen productos con estos parámetros!
                    </div>
                </div>
            @endif

            
            <div class="row d-flex justify-content-center aling-items-center">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 card mx-1">{{-- style="max-width: 15rem;" --}}
                        <div class="text-center mt-3 mx-3">
                            <img class="card-img-top " width="180" height="180"
                                src="{{ asset('storage/img') }}/{{ $product->img }} " alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $product->nombre }}</h4>
                            <p class="card-text text-truncate"> {{ $product->descripcion }}</p>
                            <p><small>Linea: {{ $product->linea }}</small> </p>
                            <div class="text-center my-2">
                                <button type="button" class="btn bg-registro" data-toggle="modal"
                                    data-target="#modalVer{{ $product->id }}">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i> Ver más
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="my-3 d-flex justify-content-center aling-items-center">
                @if ($products)
                    @if ($products[0])
                        @if ($filtro == 1)
                            {{ $products->appends(['findprod' => $_GET['findprod'], 'linea' => $_GET['linea']])->links('layouts.paginate.paginationlinks') }}
                        @else
                            {{ $products->appends(['id' => $lineid])->links('layouts.paginate.paginationlinks') }}
                        @endif
                    @endif
                @endif
            </div>

        </div>
    </div>

@endsection
