@extends('home')
@section('cont')
<kbd><a href="{{ url()->previous() }}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Edit {{$crime_type->type}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/crime-report/crimeTypeUpdate/{{$crime_type->id}}">
                @csrf
                @method('patch')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Type</span>
                    </div>
                    <input type="text" class="form-control" name="type" value="{{$crime_type->type}}">
                </div>
                @error('type')
                <div class="alert alert-danger">{{ $messagetypes }}</div>
                @enderror

                <div style="float:right;">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection