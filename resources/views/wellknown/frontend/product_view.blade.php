@extends('wellknown.layouts.index')

@section("content")

<style>

/********************* Shopping Demo-4 **********************/
.product-grid4,.product-grid4 .product-image4{position: relative;}
.product-grid4{font-family:Poppins,sans-serif;text-align:center;border-radius:5px;overflow:hidden;z-index:1;transition:all .3s ease 0s}
.product-grid4:hover{box-shadow:0 0 10px rgba(0,0,0,.2)}
.product-grid4 .product-image4 a{display:block}
.product-grid4 .product-image4 img{width:100%;height:auto}
.product-grid4 .pic-1{opacity:1;transition:all .5s ease-out 0s}
.product-grid4:hover .pic-1{opacity:0}
.product-grid4 .pic-2{position:absolute;top:0;left:0;opacity:0;transition:all .5s ease-out 0s}
.product-grid4:hover .pic-2{opacity:1}
.product-grid4 .social{width:180px;padding:0;margin:0 auto;list-style:none;position:absolute;right:0;left:0;top:50%;transform:translateY(-50%);transition:all .3s ease 0s}
.product-grid4 .social li{display:inline-block;opacity:0;transition:all .7s}
.product-grid4 .social li:nth-child(1){transition-delay:.15s}
.product-grid4 .social li:nth-child(2){transition-delay:.3s}
.product-grid4 .social li:nth-child(3){transition-delay:.45s}
.product-grid4:hover .social li{opacity:1}
.product-grid4 .social li a{color:#222;background:#fff;font-size:17px;line-height:36px;width:40px;height:36px;border-radius:2px;margin:0 5px;display:block;transition:all .3s ease 0s}
.product-grid4 .social li a:hover{color:#fff;background:#16a085}
.product-grid4 .social li a:after,.product-grid4 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:20px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
.product-grid4 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
.product-grid4 .social li a:hover:after,.product-grid4 .social li a:hover:before{opacity:1}
.product-grid4 .product-discount-label,.product-grid4 .product-new-label{color:#fff;background-color:#16a085;font-size:13px;font-weight:800;text-transform:uppercase;line-height:45px;height:45px;width:45px;border-radius:50%;position:absolute;left:10px;top:15px;transition:all .3s}
.product-grid4 .product-discount-label{left:auto;right:10px;background-color:#d7292a}
.product-grid4:hover .product-new-label{opacity:0}
.product-grid4 .product-content{padding:25px}
.product-grid4 .title{font-size:15px;font-weight:400;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
.product-grid4 .title a{color:#222}
.product-grid4 .title a:hover{color:#2C724F}
.product-grid4 .price{color:#2C724F;font-size:17px;font-weight:700;margin:0 2px 15px 0;display:block}
.product-grid4 .price span{color:#909090;font-size:13px;font-weight:400;letter-spacing:0;text-decoration:line-through;text-align:left;vertical-align:middle;display:inline-block}
.product-grid4 .add-to-cart{border:1px solid #e5e5e5;display:inline-block;padding:10px 20px;color:#888;font-weight:600;font-size:14px;border-radius:4px;transition:all .3s}
.product-grid4:hover .add-to-cart{border:1px solid transparent;background:#16a085;color:#fff}
.product-grid4 .add-to-cart:hover{background-color:#2C724F;box-shadow:0 0 10px rgba(0,0,0,.5)}
@media only screen and (max-width:990px){.product-grid4{margin-bottom:30px}
}



</style>

<br><br><br><br><br><br><br><br>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />



<div class="container">
@if(session()->has('message'))
             <script type="text/javascript">
              swal("Good job!", "{!! session()->get('message') !!}", "success");
             </script>
            @endif
    <h3>OUR PRODUCTS</h3>
    <div class="row mt-5">

     @foreach($p_all as $p_all)
     <div class="col-md-4 col-sm-6 ">
         <div class="product-grid4 border rounded shadow mr-2 mb-5">
             <div class="product-image4">
                 <a href="{{$p_all->preview_link}}">
                     <img style="height:300px" class="pic-1"  src="{{ asset('frontend') }}/admin_product/{{$p_all->image }}" alt="{{$p_all->product_name  }}" >
                     <img style="height:300px" class="pic-2"  src="{{ asset('frontend') }}/admin_product/{{$p_all->image }}" alt="{{$p_all->product_name  }}">
                 </a>


             </div>
             <div class="product-content ">
                 <h3 class="title"><a  href="{{route('product.details',['id'=>$p_all->id ])}}">{{$p_all->product_name  }}</a></h3>
                 <div class="price">
                      {{ $p_all->sale_price }}
                     <span>{{ $p_all->regular_price}}</span>
                 </div>
                <div class="row d-flex justify-content-around">
                    <a class="add-to-cart " href="{{route('product.details',['id'=>$p_all->id ])}}" >DETAILS</a>
                    <a class="add-to-cart"href="{{route('get.product-details',['id'=>$p_all->id,'name'=>$p_all->product_name,'price'=> $p_all->sale_price ])}}" >ADD TO CART</a>
                     {{-- <a class="add-to-cart"  href="{{route('get.product-details',['id'=>$p_all->id,'name'=>$p_all->product_name,'price'=> $p_all->sale_price ])}}">BUY NOW</a> --}}
                </div>
             </div>
         </div>
     </div>
     @endforeach


        {{-- <div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                        <img class="pic-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-discount-label">-12%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Web Service</a></h3>
                    <div class="price">
                        $17.60
                        <span>$20.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                        <img class="pic-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Black Top</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                        <img class="pic-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTUOhZmgzFDJwpXtYvaQh6ytH4cm9TRzlVOw&usqp=CAU">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Black Top</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<hr>









@endsection
