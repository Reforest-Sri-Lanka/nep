@extends('home')

@section('cont')
<div class="container">
    <div class="container bg-white">
    <div class="row p-4 bg-white">
        @isset($process_item)
        <kbd><a href="/security/process-item/{{$process_item->id}}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
        @endisset
        @isset($user)
        <kbd><a href="/security/user/{{$user->id}}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
        @endisset
    </div>
    <div class="row p-4 bg-white">
        <h4>Details of Audit record {{$audit['event']}} on {{date('d-m-Y',strtotime($audit['created_at']))}}</h4>
    </div>
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                @if($data == null)
                <h6>No previous data</h6>
                @else
                    <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                        <thead>
                            <tr>
                                <th>Data Field</th>
                                <th>Previous value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)<tr>
                            <td> {{ $key }} </td>   
                            <td> {{ $value }} </td>
                            @endforeach</tr>         
                        </tbody>
                    </table>
                @endif     
            </div> 
            <div class="col border border-muted rounded-lg mr-2 p-4">
                @if($datanew == null)
                <h6>No previous data</h6>
                @else
                    <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                        <thead>
                            <tr>
                                <th>Data Field</th>
                                <th>New value value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datanew as $key => $value)<tr>
                            <td> {{ $key }} </td>   
                            <td> {{ $value }} </td>
                            @endforeach</tr>         
                        </tbody>
                    </table>     
                @endif
            </div>        
        </div>
    </div>
</div>
@endsection