@extends('layout.master')
@section('content')


<div class="row">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
         @if(session()->has('message'))
               <div class="alert alert-success">
                   {{ session()->get('message') }}
               </div>
               
        @endif
        @if(count($errors)>0)

  <div class="alert alert-danger" >
   <ul>
       @foreach($errors->all() as $error)

      <li>{{$error}}</li>

      @endforeach
  </ul>
</div>

   
   @endif 



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Video Create
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
 <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Video</h6>
        <form class="forms-sample" method="post" action="{{ route('video.gallary.create') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Video Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="v_title" id="exampleInputUsername2" placeholder="Video Name">
            </div>
          </div>
           <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Video Link</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="v_link" id="exampleInputUsername2" placeholder="Video Link">
            </div>
          </div>
          
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>




      </div>
    </div>
  </div>
 
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
 


        <div class="container mt-5">

        <table class="table table-responsive">
            <thead>
                <tr>
                <th scope="col">Video No</th>
                <th scope="col">Video Title</th>
                <th scope="col">Video Liink</th>
                <th scope="col">Actin</th>
                </tr>
            </thead>
            <tbody>
            @foreach($video as $key=>$data)
                <tr>
                    <th scope="row">#{{ $key+1 }}</th>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->link }}</td>
                    <td>
                      <a  class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('video.gallary.delete', $data->id) }}">
                      Delete
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> -->
                      </a>
                    </td>
                </tr>
            @endforeach
                
            </tbody>
            </table>

            </div>


            </div>
            </div>
            </div>
            </div>
       
        
        
        

            
      
      
    






@endsection
