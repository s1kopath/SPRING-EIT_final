@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12b grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive pt-3">
          <table class="table">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Email
                </th>

              </tr>
            </thead>
            <tbody>
              @foreach($subcribe as $data)
              <tr>
                <td>
                  {{$data->id}}
                </td>
                <td>
                  {{$data->email}}
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
          <br>
                  <div class="d-flex justify-content-center">
    {!! $subcribe->links() !!}
</div>
      </div>
    </div>
  </div>
</div>


@endsection
