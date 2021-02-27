@extends('home')

@section('cont')

<kbd><a href="{{ url()->previous() }}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Create Crime Type</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/crime-report/crimeTypeStore">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Crime Type</span>
                    </div>
                    <input type="text" class="form-control" name="crimetype" placeholder="Enter Crime Type">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div style="float:right;">
                
                    <button type="submit" name="status" value="1" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection