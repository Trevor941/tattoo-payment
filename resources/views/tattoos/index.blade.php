
                   @extends('layouts.dashboard')
                   @section('content')
                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tattoo Price List</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @if($tattoos->count() > 0)
                        @foreach ($tattoos as $tattoo)
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                {{$tattoo->name}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R{{$tattoo->price}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript:{}" class="btn btn-indexbtns" onclick="document.getElementById('addtocarttattooform{{$tattoo->id}}').submit();">
                                                <i class="fas fa-credit-card fa-2x text-dark"></i>
                                            </a>
                                            <form action="{{route('addtocart', $tattoo->id)}}" method="POST" id="addtocarttattooform{{$tattoo->id}}">
                                                @csrf
                                                <input type="hidden" name="id" value="tattooid{{$tattoo->id}}">
                                                <input type="hidden" name="name" value="{{$tattoo->name}}">
                                                <input type="hidden" name="price" value="{{$tattoo->price}}">
                                                <input type="hidden" name="quantity" value="1">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                     @else
                     <p>No Tattoos Found</p>
                     @endif
                    </div>

                    @endsection