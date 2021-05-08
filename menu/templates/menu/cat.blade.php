@extends('layouts.app')


@section('content')


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-lg-7">

                <a href="{{ url()->previous() }}"><button type="button" class="btn-close prod_close" aria-label="Close"></button></a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- List group-->

                <ul class="list-group">
                    <!-- list group item-->

                    @foreach ($products as $prod)
                    <span class="d-none id_prod">{{$prod->id}}</span>
                    <li class="list-group-item">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <img class="img_prod" src="{{asset("storage/{$prod->img}")}} " alt="{{ $prod->img }}" >
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold title-prod">{{ $prod->name }}</h5>
                                <p class="font-italic text-muted mb-0 small">{{ $prod->desk }}</p>
                                <h6 class="font-weight-bold price-prod">{{ $prod->price }} &#8376;</h6>


                                <button type="button" id="add_cart" onclick="addCart()" class="add_cart">Добавить</button>

                                <div class="  kolicestvo   mt-1">
                                    <div class="input-group inline-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input class="form-control quantity" min="0" name="quantity" value="1" type="number">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-plus" >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>


                                <button class="next" onclick="Next()">Продолжить</button>

                            </div>
                        </div> <!-- End -->
                    </li> <!-- End -->
                    @endforeach

                    <!-- list group item-->

                </ul> <!-- End -->
            </div>
        </div>
    </div>









@endsection
