
<div class="stycky">
            <ul class="categor" id="lightSlider">

                    @foreach($categories as $cat)
			
                    <div class="cat_link">
                        <li class="cat_items"  data-link="{{$cat->id}}" id="cat_{{$cat->id}}">
                            <p>{{$cat->name}}</p>
                        </li>
                    </div>
                    @endforeach
            </ul>

</div>


            <ul class="list-groupp ">
                <!-- list group item-->

                  {{-- Categories --}}
                @foreach($categories as $cat )
						<div class="pric" id="cc_{{$cat->id}}">
                        <h3 class="title">{{$cat->name}}</h3>


                           {{-- Products --}}
                           @foreach($cat->products as $product)


                        
                                <div class="main-link" id="pro" data-page="/ajax/cat/{{$product->id}}"> 
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <li class="list-group-item">
                                        <!-- Custom content-->
                                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">

                                            <div class="media-body order-2 order-lg-1 ">
                                                <h5 class="mt-0 font-weight-bold mb-2">{{$product->name}}</h5>

                                                <h6 class="font-weight-bold my-2 price">{{$product->price}} &#8376;</h6>

                                            </div>
                                        </div> <!-- End -->
                                    </li> <!-- End -->
                                </div>
                         
                           @endforeach
                   </div>
                @endforeach

            </ul> <!-- End -->
	 
            <div >

                <div >
                    <div >
                        <h1 id="title"></h1>
                        <p id="description"></p>

                        <div ></div>
                    </div>
                </div>


        </div>    