@extends('layout.master')
@section('title')
    Essential-infotech- Add Facebook Pixel
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Pixel Informations</h4>
                </div>
                <div class="card-body">
                    @if(session('delete'))
                        <div class="alert alert-success">
                            {{session('delete')}}
                        </div>
                    @endif
                <!-- <h4>Category Table</h4> -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Facebook Account Name</th>
                                <th>Pixel Name</th>
                                <th>Pixel ID</th>
                                <th>Action</th>
                            </tr>
                            <tr id="pixel-info">
                                @if(!empty($pixel))
                                    <td id="td-account-name">{{$pixel->account_name}}</td>
                                    <td id="td-pixel-name">{{$pixel->pixel_name}}</td>
                                    <td id="td-pixel-id">{{$pixel->pixel_id}}</td>
                                    <td>
                                        <button data-id="{{$pixel->id}}" class="btn btn-sm btn-warning edit-btn">Edit</button>
                                        <button data-id="{{$pixel->id}}" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                    </td>
                                @else
                                    <td class="text-danger text-center" colspan="4">No Data Found</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                @if(session('category_success'))
                    <strong class="alert alert-success">{{session('category_success')}}</strong>
                @endif
                <div class="card-header">
                    <h4 class="card-title">Add Pixel Info</h4>
                </div>
                <div class="card-body">
                    <form method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Facebook Account Name</label>
                            <input type="text" name="account_name" class="form-control" id="account_name" value="{{old('category_name')}}" placeholder="Facebook Account Name">
                            <input type="text" name="id" value="{{isset($pixel->id) ? $pixel->id : ''}}" id="id" hidden>
                            <div class="">
                                <small style="color: red" id="account_name_error"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Pixel Name</label>
                            <input type="text" name="pixel_name" id="pixel_name" class="form-control" placeholder="Pixel Name">

                            <div class="">
                                <small style="color: red" id="pixel_name_error"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Pixel ID</label>
                            <input type="number" id="pixel_id" class="form-control" name="pixel_id" placeholder="Pixel ID">
                            <div class="">
                                <small style="color: red" id="pixel_id_error"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit-btn" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js_script')
    <script>
        $(document).ready(function () {
            $('#submit-form').on('submit',function (e) {
                e.preventDefault();

                let accountName = $('#account_name');
                let pixelName = $('#pixel_name');
                let pixelId = $('#pixel_id');
                let id = $('#id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/forms/pixel/add',
                    data: {
                        account_name: $(accountName).val(),
                        pixel_name: $(pixelName).val(),
                        pixel_id: $(pixelId).val(),
                        id: $(id).val()
                    },
                    success: function (data) {
                        $(accountName).val('');
                        $(pixelName).val('');
                        $(pixelId).val('');
                        $('#pixel_id_error').text('');
                        $('#pixel_name_error').text('');
                        $('#account_name_error').text();

                        $('#pixel-info').html('');
                        $('#pixel-info').append(`
                            <td id="td-account-name">${data.account_name}</td>
                            <td id="td-pixel-name">${data.pixel_name}</td>
                            <td id="td-pixel-id">${data.pixel_id}</td>
                            <td>
                                <button data-id="${data.id}" class="btn btn-sm btn-warning edit-btn">Edit</button>
                                <button data-id="${data.id}" class="btn btn-sm btn-danger delete-btn">Delete</button>
                            </td>
                        `);

                    },
                    error: function (error) {
                        if (error.responseJSON.errors.pixel_id != undefined){
                            $('#pixel_id_error').text(error.responseJSON.errors.pixel_id[0]);
                        }
                        if (error.responseJSON.errors.account_name != undefined){
                            $('#account_name_error').text(error.responseJSON.errors.account_name[0]);
                        }
                        if (error.responseJSON.errors.pixel_name != undefined){
                            $('#pixel_name_error').text(error.responseJSON.errors.pixel_name[0]);
                        }
                    }
                })
            })

        });

        $(document).ready(function () {
            $(document).on('click','.edit-btn',function () {
                $('#account_name').val($('#td-account-name').text());
                $('#pixel_name').val($('#td-pixel-name').text());
                $('#pixel_id').val($('#td-pixel-id').text());
                $('#id').val($(this).attr('data-id'));
            });
        });

        $(document).ready(function () {
            $(document).on('click','.delete-btn',function () {
                if (confirm('Are you sure want to delete this Item?')){
                    let id = $(this).attr('data-id');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'DELETE',
                        url: '/forms/pixel/'+id+'/delete',
                        success: function (data) {
                            $('#pixel-info').html('');
                            $('#pixel-info').append(`
                                <td class="text-danger text-center" colspan="4">No Data Found</td>
                            `);
                            alert(data);
                        }
                    })

                }
            });
        });
    </script>
@endsection
