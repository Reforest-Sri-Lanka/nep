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
      @switch($item->status)
                @case('0')
                <td>Inactive</td>
                @break;
                @case('1')
                <td>Active</td>
                @break;
                @endswitch
        </tr>
        @endforeach
    
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection