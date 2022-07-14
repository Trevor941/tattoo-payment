
                   @extends('layouts.dashboard')
                   @section('content')
                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Orders List</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row p-2 justify-content-center">
                        @isset($singleorder)
                        <div class="col-md-3 p-4 bg-columns">
                            <h5 class="text-center">Order Details | {{$singleorder->orderno}}</h5>
                            <hr>
                            <ul class="list-group">
                            @foreach ($order_items as $order_item)
                            @if($singleorder->id === $order_item->order_id)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  {{$order_item->name}}
                                  <span class="">R{{$order_item->price}}</span>
                                </li>
                            @endif
                            @endforeach
                        </ul>
                            
                        </div>
                        <div class="col-md-9 p-4 borderline">
                        @endisset
                        @empty($singleorder)
                        <div class="col-md-12 p-4 borderline">
                        @endempty
                            <h5 class="text-center">Orders</h5>
                            @if($orders->count() > 0)
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order No</th>
                                          <th>Customer Name</th>
                                          <th>Amount Paid</th>
                                          <th>Date(<i class="fas fa-clock-o"></i>)</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($orders as $order)
                                        <tr @isset($singleorder)
                                        @foreach ($order_items as $order_item)
                                        @if($singleorder->id === $order->id)
                                           class="bg-highlighted-col"
                                        @endif
                                        @endforeach
                                        @endisset
                                        >
                                            <td><a href="{{route('orders.list.single', $order->id)}}">{{$order->orderno}}</a></td>
                                            <td>{{$order->customername}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>{{ date('d/m/Y', strtotime($order->created_at)) }} at  {{ date('h:i', strtotime($order->created_at)) }} </td>
                                          </tr> 
                                        @endforeach
                                       
                                      </tbody>
                                     
                                </table>
                            </div>
                            {{$orders->links()}}
                            @else
                            <hr>
                            <p class="text-center">No appointments available at the moment.</p>
                            @endif
                        </div>
                    </div>

                    @endsection
                    @section('onpage-style')
                   <style>
                     .bg-columns{
                        background: #eee !important;
                     }
                     .borderline{
                        border: 1px solid #eee !important;
                     }
                     .table-bordered thead td, .table-bordered thead th {
                                     min-width: 150px !important;
                     } 
                     .bg-highlighted-col{
                      background: #eee!important;
                     }

                   </style>
                    @endsection