@extends('home')

@section('cont')

<kbd><a href="/generalenv" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
<div class="jumbotron">
<h2> Requests from  users</h2>

@if(count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success') }} </p>

    </div>
    @endif
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Delete</th>
    


    </tr>
  </thead>
  <tbody>
  
        @foreach ($species  as $row)
        <tr>
      <td >{{$row->id}}</td>
      <td >{{$row->type}}</td>
      <td >{{$row->title}}</td>
      <td >{{$row->description}}</td>
      <td>{{$row->status_id}}</td>
   

      <td>
      <form action="{{url('delete-request/'.$row ->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('DELETE')}}
      <button type="submit" class="btn btn-outline-danger">Delete </button>
      

</form>

      </td>
      

      </tr>
    
      @endforeach 

    
    
  </tbody>
</table>








</div>






</div>

@endsection