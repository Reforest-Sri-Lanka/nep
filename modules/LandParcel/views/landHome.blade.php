@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('land') }}" class="btn btn-info mr-4" role="button">Register Land</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All land parcels in the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($land_parcels as $land_parcel)<tr>
                    <td>{{date('d-m-Y',strtotime($land_parcel->created_at))}}</td>
                    <td>{{$land_parcel->status->type}}</td>
                    <td><a href="/land/show/{{$land_parcel->id}}" class="text-dark"  role="button">See full request</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$land_parcels->links();!!}
        </div>   
    </div>
</div>
@endsection