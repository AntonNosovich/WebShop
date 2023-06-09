@extends('layouts.layout')
@section ('content')
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>
            @foreach($item->product->tools as $tool)
            <a href="{{route('category',$tool->id)}}" style="color: black">
                    {{$tool->name}}
                </a>
            </h4>
            @endforeach
                    <div class="site-pagination">
				<a href="#">Home</a> /
				<a href="{{route('main')}}">Main</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{ url()->previous() }}"> &lt;&lt; Back </a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="{{asset('/storage/'.$item->product->images->first()->url)}}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							@foreach($item->product->images as $key=>$img)
                            <div @if($key==0) class ="pt active" @endif class="pt" data-imgbigurl="{{asset('/storage/'.$img->url)}}"><img src="{{asset('/storage/'.$img->url)}}" alt=""></div>
                            @endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{$item->product->name}}</h2>
					<h3 class="p-price">{{$item->sale_price}}$</h3>
					<h4 class="p-stock">Available: <span>@if ($item->quantity>0)In Stock @else None @endif</span></h4>
					<h5>Article: {{$item->article}}</h5>
                    <div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="fw-size-choose">
						<p>Size</p>
						@foreach($sizes as $size)
                        <div class="sc-item">
							<input type="radio" name="sc" id="m-size" @if ($item->size == $size) checked="" @endif>
							<label for="m-size">{{$size}}</label>
						</div>
                        @endforeach
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty" data-max="{{$item->quantity}}" ><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">SHOP NOW</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{$item->product->description}}</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>NEW PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($products as $product)
                <a href ="{{route('showProduct',$product->items->first()->id)}}">
                    <div class="product-item">
					<div class="pi-pic">
                        <img src="{{asset('/storage/'.$product->images->first()->url)}}" alt="">
						<div class="pi-links">
						</div>
					</div>
					<div class="pi-text">
						<h6>${{$product->price}}</h6>
						<p>{{$product->name}} </p>
					</div>
				</div>
                </a>
                @endforeach

			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
@endsection

