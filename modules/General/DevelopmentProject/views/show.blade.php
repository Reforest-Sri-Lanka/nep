@extends('home')

@section('cont')

<kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container border bg-light">
    <form>
        <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Title</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$dev->title}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Category</span>
            </div>
            <input type="text" class="form-control" placeholder="Development Project" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Gazette</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$dev->gazette->title}}" readonly>
        </div>


        <div class="form-check border-secondary rounded-lg mb-3" style="background-color:#ebeef0">
            <label class="mt-2"> Governing Organizations: </label>
            <hr>
            <ul class="list-unstyled">
                @foreach($dev->governing_organizations as $governing_organization)
                @switch($governing_organization)
                @case(1)
                <li class="ml-5">Reforest Sri Lanka</li>
                @break
                @case(2)
                <li class="ml-5">Ministry of Environment</li>
                @break
                @case(3)
                <li class="ml-5">Central Environmental Authority</li>
                @break
                @case(4)
                <li class="ml-5">Ministry of Wildlife</li>
                @break
                @case(5)
                <li class="ml-5">Road Development Authority</li>
                @break
                @endswitch
                @endforeach
            </ul>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Logs</span>
            </div>
            @if($dev->logs == 0)
            <input type="text" class="form-control" placeholder="No logs" readonly>
            @else
            <input type="text" class="form-control" placeholder="{{$dev->logs}}" readonly>
            @endif
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Land Parcel</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$dev->land_parcel->title}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Status</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$dev->status->type}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Created at</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$dev->created_at}}" readonly>
        </div>
    </form>

</div>
@endsection