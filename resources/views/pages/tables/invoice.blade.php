<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
<!-- plugin css -->
<link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" />
<link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
<!-- Data Table  -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<!-- end plugin css -->
<!-- jquery  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<!-- common css -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<div class="ml-5 mt-3 mb-3 mr-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                            <a href="#" class="noble-ui-logo d-block mt-3">SpringSoft<span>IT</span></a>
                            <p class="mt-1 mb-1"><b>SpringSoftIT</b></p>
                            <p>108,<br> uttara,<br>dhaka.</p>
                            <h5 class="mt-5 mb-2 text-muted">Invoice to : {{ $order_details->customer->f_name }} {{$order_details->customer->l_name}}</h5>
                            <p><br></p>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                            <h6 class="text-right mb-5 pb-4"># SSIT-{{ $order_details->id }}</h6>
                            <h4 class="font-weight-medium text-uppercase text-right mt-2 mb-2">Payment Status</h4>
                            {{-- <h5 class="text-right mb-5 pb-4">{{ $order_details->shipping->shipping_status }} </h5> --}}
                             <h5 class="text-right mb-5 pb-4">{{ $order_details->order_status }} </h5>
                            <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">Order Date : {{ $order_details->created_at }}</span> </h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quentity</th>
                                        <th scope="col">Amount</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $product)
                                    <tr>
                                        <th scope="row">{{ $product->product_name }}</th>

                                        <td>{{ $product->product_quentity }}</td>
                                        <td>{{ $product->product_price }}</td>
                                    </tr>

                                    @endforeach
                                     <tr>
                                        <th colspan=2 style="color:red;">Total</th>

                                        <td style="color:red;">{{ $qty }}</td>
                                       
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="container-fluid mt-1 w-100">
                        <a href="/tables/Admin/Customer-Order" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="send" class="mr-3 icon-md"></i>Back</a>
                        <a href="#" onclick="window.print();" class="btn btn-outline-primary float-right mt-4"><i data-feather="printer" class="mr-2 icon-md"></i>Print</a>
                    </div>
                </div>
                <p class="text-center font-weight-lighter font-italic mb-2">Thank you for shopping with us. Please come
                    again
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function auto_print() {
        window.print()

    }
    // setTimeout(auto_print, 1000);
    // if (window.history.replaceState) {
    //     //window.history.replaceState(null, null, '/delivery');
    // }

</script>
