@extends('wellknown.layouts.index')

@section("content")

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}

	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}

	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}



	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}

}
</style>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
							 @foreach(Cart::content() as $item)
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="{{ asset('frontend/admin_product')}}/{{$item->model->image}}" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">{{$item->model->product_name}}</h4>

									</div>
								</div>
							</td>
							<td data-th="Price">$ <span class="product-price">{{ $item->price }}</span></td>
							<td data-th="Quantity" class="cart-section">

                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <div class="ml-auto mt-2">
    {{--                                        <a href="{{ route('reduce',['reduce_cart'=>$item->rowId]) }}"><i class="fas fa-minus"></i></a>--}}
                                            <a href="#" class="minus-btn" data-id="{{$item->rowId}}"><i class="fas fa-minus"></i></a>
                                        </div>
                                        <input style="width: 50%" type="text" data-id="{{$item->rowId}}" min="1" class="form-control text-center qty-input ml-auto" value="{{ $item->qty }}"><br>
                                        <div class="ml-auto mt-2">
    {{--                                        <a class="ml-auto" href="{{ route('increase-cart',['increase_cart'=>$item->rowId]) }}"><i class="fas fa-plus"></i></a>--}}
                                            <a class="plus-btn" data-id="{{$item->rowId}}" href="#"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
							</td>
							<td data-th="Subtotal" class="text-center subtotal">{{ $item->subtotal}}</td>

							<td class="actions" data-th="">
								<a href="{{ route('destroy',['delete'=> $item->rowId ]) }}" class="theme-btn btn-style-three"><span class="txt"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span></a>
								{{-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button> --}}
							</td>
						</tr>
						 @endforeach


					</tbody>
					<tfoot>
						<tr class="visible-xs">
						     @php
                                  Session::put('total',Cart::total());

                            @endphp
							{{-- <td colspan="10" class="text-center"><strong>Total {{ Cart::subtotal() }}</strong></td> --}}
						</tr>
						<tr>
							<td><a style="background-color: #2C724F" href="{{ route('product.display') }}" class="theme-btn btn-style-one"><span class="txt"> Continue Shopping</span></a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong></strong></td>
							<td><a style="background-color: #2C724F" href="{{route('product.shipping')}}" class="theme-btn btn-style-one"><span class="txt">Checkout</span></a></td>
						</tr>
						 {{-- <div class="update-clear">
                        <a class="btn btn-clear" href="{{ route('destroyAll') }}">Clear Shopping Cart</a>

                    </div> --}}
					</tfoot>
				</table>
</div>

<script>
    $(document).ready(function () {
        //Increasing the quantity
        $('.plus-btn').on('click',function(){
            let id = $(this).attr('data-id');
            let input = $(this).parent().parent().parent().find('input');
            let price = $(this).parent().parent().parent().parent().prev().find('.product-price').text();
            let subtotal1 = $(this).parent().parent().parent().parent().next();
            $.ajax({
                type: 'GET',
                url: '/increase/'+id,
                success: function (data) {
                    let qty = parseInt($(input).val()) + 1;
                    $(input).val(qty);
                    let subtotal = parseInt(price) * qty;
                    $(subtotal1).text(subtotal);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        //Changing quantity by changing the input field
        $('.qty-input').on('keyup',function () {
            let id = $(this).attr('data-id');
            let qty = $(this).val();
            let price = $(this).parent().parent().parent().prev().find('.product-price').text();
            let subtotal1 = $(this).parent().parent().parent().next();

            $.ajax({
                type: 'GET',
                url: '/change-qty',
                data: {
                    id: id,
                    qty: qty
                },
                success: function (data) {
                    let subtotal = parseInt(price) * parseInt(qty);
                    $(subtotal1).text(subtotal);
                },
                error: function (error) {
                    console.log(error);
                }
            })
        });

        //Decreasing the quantity
        $('.minus-btn').on('click',function(){
            let id = $(this).attr('data-id');
            let input = $(this).parent().parent().parent().find('input');
            let subtotal1 = $(this).parent().parent().parent().parent().next();
            let price = $(this).parent().parent().parent().parent().prev().find('.product-price').text();
            let qty = parseInt($(input).val()) - 1;
            if (qty === 0){
                qty = 1;
            }
            $(input).val(qty);
                $.ajax({
                    type: 'GET',
                    url: '/reduce/'+id,
                    success: function (data) {

                        let subtotal = parseInt(price) * qty;
                        $(subtotal1).text(subtotal);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

        });



    });
</script>


@endsection

