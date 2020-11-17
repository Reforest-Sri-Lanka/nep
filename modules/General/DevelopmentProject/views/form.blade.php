@extends('home')

@section('cont')

<kbd><a href="/general" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container border bg-light">
    <form action="/dev-project/saveForm" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
        </div>
        <hr>
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                    <a class="card-link text-dark" data-toggle="collapse" href="#collapseOne">
                        Select Relavant Gazette
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <strong>Select One</strong>
                        @foreach($gazettes as $gazette)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gazette" value="{{$gazette->id}}">{{$gazette->title}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseTwo">
                        Select Relavant Organizations
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <strong>Select Multiple</strong>
                        <fieldset>
                            @foreach($organizations as $organization)
                            <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}"><label class="ml-2">{{$organization->title}}</label> <br>
                            @endforeach
                        </fieldset>
                    </div>
                </div>
            </div>
            <hr>


            <!-- ////////MAP GOES HERE -->

            <br>
            <div id="accordion2">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link text-dark" data-toggle="collapse" href="#collapseThree">
                            Select Relavant Land Parcel
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion2">
                        <div class="card-body bg-secondary text-light">
                            <strong>Select One</strong>
                            @foreach($lands as $land)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="landParcel" value="{{$land->id}}">{{$land->title}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                    <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
                </div>
            </div>
            <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
            <hr>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
@endsection