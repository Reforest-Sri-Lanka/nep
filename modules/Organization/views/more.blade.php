@extends('home')

@section('cont')

<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of {{$organization->title}}</h2><hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form>
            <h6 style="text-align:left;" class="text-dark">Organization Details</h6>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $organization->title }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {{ $organization->city}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    {{ $organization->country}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    {{ $organization->type}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $organization->description}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    @switch($organization->status)
                    @case('0')
                    {{ $organization->status}}
                    @break;
                    @case('1')
                    {{ $organization->status}}
                    @break;
                    @endswitch
                </div>
                
            </div>
            <h6 style="text-align:left;" class="text-dark">Contact Details</h6>
            <br>
            




            </form>
        </div>
    </div>
</div>

@endsection