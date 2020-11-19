@extends('home')

@section('cont')
<kbd><a href="/generalenv" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class='row justify-content-center'>
    </br>
    @error('create_by')
    <div class="alert">
        <strong>{{ "You need to be be logged in first" }}</strong>
    </div>
    @enderror

    <h2>Fill your Data Here </h2>


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
    </br>
</div>
<hr>
<!-- @foreach($org as $org)
<ul>
    <li>{{$org->title}}</li>
</ul>
@endforeach -->
<div class='row justify-content-center'>
    <form action={{action('SpeciesController@store')}} method="post">
        @csrf

        <h6>Species Type</h6>
        <div class="form-group">

            <input type="text" name="type" class="form-control">



        </div>
        </br>
        <h6>Title</h6>
        <div class="form-group">

            <input type="text" name="title" class="form-control">



        </div>




        </br>
        <h6>Scientific Name</h6>
        <div class="form-group">

            <input type="text" name="scientific_name" class="form-control" placeholder="Enter name">


        </div>

        </br>
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                    <a class="card-link text-dark" data-toggle="collapse" href="#collapseOne">
                        Select Taxanomy
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <div class="form-check">
                            <fieldset>
                                <input type="checkbox" name="taxanomy[]" value="taxanomy1"><label class="ml-2">taxanomy 1</label> <br>
                                <input type="checkbox" name="taxanomy[]" value="taxanomy2"><label class="ml-2">taxanomy 2</label> <br>
                                <input type="checkbox" name="taxanomy[]" value="taxanomy3"><label class="ml-2">taxanomy 3</label> <br> </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseTwo">
                        Select Habitat
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <strong>Select Multiple</strong>
                        <fieldset>
                            <input type="checkbox" name="habitat[]" value="habitat1"><label class="ml-2">Habitat 1</label> <br>
                            <input type="checkbox" name="habitat[]" value="habitat2"><label class="ml-2">Habitat 2</label> <br>
                            <input type="checkbox" name="habitat[]" value="habitat3"><label class="ml-2">Habitat 3</label> <br>
                        </fieldset>
                    </div>
                </div>
            </div>
            <br>

        </div>
        <h6>Project Description</h6>
        <div class="input-group mb-3">
            </br>
            <textarea class="form-control" rows="5" name="description">
                           </textarea>

        </div>
        </br>
        </br>

        </br>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="confirm"><strong>I confirm these information to be true</strong>
                @error('confirm')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </label>
            </br>
            <input type="hidden" class="form-control" name="createby" value="{{Auth::user()->id}}">

            <button type="submit" name="status" value="1" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
@endsection