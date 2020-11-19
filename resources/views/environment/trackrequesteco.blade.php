@extends('home')

@section('cont')
<kbd><a href="/generalenv" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<hr>



    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Eco System Type</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Status</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
        <td >{{$item->id}}</td>
      <td >{{$item->ecosystem_type}}</td>
      <td >{{$item->description}}</td>
      <td >{{$item->created_at}}</td>
      <td>{{$item->status}}</td>
        </tr>
        @endforeach
    
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection