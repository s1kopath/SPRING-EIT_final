@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ticket table</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ticket table</h4>
                  @if(session()->has('error'))
               <div class="alert alert-danger">
                   {{ session()->get('error') }}
               </div>
            @endif

                <div class="table-responsive pt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                 <th>
                                  Subject
                                </th>
                                 <th>
                                 Message
                                </th>
                                   <th>
                                 Download File
                                </th>
                                 <th>
                                 Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ticket as $data)
                            <tr>
                                <td>
                                    {{$data->id}}
                                </td>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->email}}
                                </td>

                                <td>
                                    {{$data->subject}}
                                </td>
                                 <td>
                                    {!! $data->message !!}
                                </td>

                                <td> <a class="btn btn-success" href="{{route('file.download',['id'=>$data->id])}}">
                                  Download File
                                </a>
                                </td>
                                <td>
                <a class="btn btn-danger" href="{{route('ticket.remove',['id'=>$data->id])}}">
                Delete
                </a>
                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
                <br>
                  <div class="d-flex justify-content-center">
    {!! $ticket->links() !!}
</div>
            </div>
        </div>
    </div>
</div>


@endsection
