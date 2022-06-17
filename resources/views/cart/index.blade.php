@extends('layouts.dashboard')
@section('content')
       <!-- Breadcrumb Start -->
       <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Cart</li>
            </ul>
            @if(session('removeditem'))
            <div class="alert alert-danger">
                <p>{{session('removeditem')}}</p>
            </div>
            @endif
            @if(session('addeditem'))
            <div class="alert alert-success">
                <p>{{session('addeditem')}}</p>
            </div>
            @endif
        </div>
    </div>
    <!-- Breadcrumb End -->
 
    <!-- Cart Start -->
   
    <div class="cart-page">
        <div class="container-fluid">
            @if(session('cart') > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tattoo-#Me Item</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach(session('cart') as $id => $cartitem)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <p>{{$cartitem['name']}}</p>
                                            </div>
                                        </td>
                                        <td>R {{$cartitem['price']}}</td>
                                        <td class="text-center">
                                            {{-- <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="{{$cartitem['quantity']}}">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div> --}}
                                            <form action="{{route('updatecart')}}" method="POST">
                                                @csrf
                                                <input type="submit" value="-" name="decreaseproductquantity">
                                                <input type="hidden" value="{{$cartitem['id']}}" name="id" >
                                                <input class="text-center" type="text" name="quantity" value="{{$cartitem['quantity']}}" readonly>
                                                <input type="submit" value="+" name="increaseproductquantity">
                                            </form>
                                        </td>
                                        <td>${{$cartitem['price'] * $cartitem['quantity']}}.00</td>
                                        <td class="text-center">
                                            <form action="{{route('removefromcart')}}" method="POST">
                                                <input type="hidden" value="{{$cartitem['id']}}" name="id" >
                                                @csrf
                                             {{-- <button type="submit" class="btn btn-sm btn-danger">Remove</button> --}}
                                                <button type="submit" class="text-danger" style="border: 0px;"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="coupon">
                                    <input type="text" placeholder="Coupon Code">
                                    <button>Apply Code</button>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        {{-- <p>Sub Total<span>$99</span></p> --}}
                                        {{-- <p>Shipping Cost<span>$1</span></p> --}}
                                        <hr>
                                        <p>Grand Total: <span>R {{Session::get('total')}}</span></p>
                                    </div>
                                    <div class="cart-btn">
                                        <form action="{{route('stripe-form')}}" method="GET">
                                            <button style="float: right;" class="btn btn-lg btn-danger" type="submit">Checkout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @else
            <div class="row m-5">
                <div class="col-md-12 bg-white p-5">
                 <h3 class="text-danger"><i>Cart is empty</i></h3>
                </div>
            </div>
            @endif
        </div>
    </div>



@endsection