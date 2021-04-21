@extends('Envmain')

@section('env')


<div class="container">


    <div>

      <a href="/environment/requestspecies" class="btn bd-navbar text-light" role="button">New Species</a>
    </div>



    <nav class="navbar navbar-expand-sm navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link h4" href="">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h4" href="">Quick Links</a>
        </li>
      </ul>
    </nav>

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

    <table class="table table-striped table-white">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Type</th>
          <th scope="col">Title</th>
          <th scope="col">Scientific Name</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col">Approve</th>
          <th scope="col">Delete</th>
          <th scope="col">More</th>



        </tr>
      </thead>
      <tbody>

        @foreach ($species as $row)
        <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->type}}</td>
          <td>{{$row->title}}</td>
          <td>{{$row->scientefic_name}}</td>
          <td>{{$row->description}}</td>
            


          @switch($row->status_id)
          @case('0')
          <td>Inactive</td>
          @break;
          @case('1')
          <td>Active</td>
          @break;
          @endswitch


          <td>

            <form action="/environment/environmentspe/updatestatus/{{$row->id}}" method="POST">
              {{csrf_field()}}
              {{method_field('PUT')}}

              <button type="submit" name="status" value="1" class="btn btn-outline-warning">Approve</button>


            </form>

          </td>

          <td>
            <form action="{{url('/environment/delete-requestspecies/'.$row ->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <button type="submit" class="btn btn-outline-danger">Delete </button>


            </form>

          </td>
          <!-- opens the more view -->
          <td class="text-center"><a href="/environment/morespecies/{{$row->id}}" class="btn btn-outline-info mr-4" role="button">...</a>


          </td>

        </tr>

        @endforeach



      </tbody>
    </table>




</div>

@endsection