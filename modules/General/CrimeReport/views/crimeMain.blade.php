@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('crime') }}" class="btn btn-info mr-4" role="button">Make new complaint</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All crime reports made through the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>More Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($view_crimes as $view_crime)<tr>
                    <td>{{date('d-m-Y',strtotime($view_crime->created_at))}}</td>
                    <td>{{$view_crime->status->type}}</td>
                    <td><a href="/crime-report/viewcrime/{{$view_crime->id}}" class="text-dark">See full request</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$view_crimes->links();!!}
        </div>   
    </div>
</div>
@endsection