@extends('home')

@section('cont')

@if(Auth::user())
    <kbd><a href="/crime-report/viewcrime/{{$process_item->id}}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
@endif
<div class="container">
  <!-- FAQ button -->
  <div class="d-flex mb-2 justify-content">
  <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('warning')}}</h3>
    </span>
  </div>
  @include('faq')
  <form method="post" action="\crime-report\crimeupdate" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <div class="form-group">
                    <label for="crime_type">Crime type:</label>
                    <select name="crime_type" class="custom-select" required>
                        <option disabled selected value="">Select Crime Type</option>
                        @if($crime->crime_type_id != null)
                            <option selected value="{{$crime->crime_type_id}}">{{$crime->crime_type->type}}</option>
                        @endif
                        @foreach ($crime_types as $crime_type)
                            <option value="{{ $crime_type->id }}" {{ Request::old()?(Request::old('crime_type')==$crime_type->id?'selected="selected"':''):'' }}>{{ $crime_type->type }}</option>
                        @endforeach
                    </select>
                    @error('crime_type')
                        <div class="alert">                                   
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    @isset($Photos)
                        <div class="card-deck">
                            @foreach($Photos as $photo)
                            <div class="card" style="background-color:#99A3A4">
                                <img class="card-img-top" src="{{asset('/storage/'.$photo)}}" alt="photo">
                                <div class="card-body text-center">
                                <a class="nav-link text-dark font-italic p-2" href="/item-report/downloadimage/{{$photo}}">Download Image</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endisset
                    <label for="images">Photos:</label>
                    <input type="file" id="image" name="file[]" multiple>
                    @if ($errors->has('file.*'))
                        <div class="alert">
                            <strong>{{ $errors->first('file.*') }}</strong>
                        </div>
                    @endif   
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    @if($crime->description != null)
                        <textarea  class="form-control" rows="3" name="description" required>{{ $crime->description }}</textarea>
                    @else
                    <textarea  class="form-control" rows="3" name="description" required>{{{ old('description') }}}</textarea>
                    @endif
                    @error('description')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact">Contact of complainant: </label>
                    @if($process_item->requestor_email != null)
                        <input type="text" class="form-control" placeholder="Phone/Email" name="contact" value="{{ $process_item->requestor_email }}">
                    @else
                        <input type="text" class="form-control" placeholder="Phone/Email" name="contact" value="{{ old('contact') }}">
                    @endif
                    @error('contact')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="planNo">Area name:</label>
                    @if($crime->land_parcel_id != null)
                    <input type="text" class="form-control" placeholder="Enter Area name" id="planNo" name="planNo" value="{{ $crime->Land_parcel->title }}">
                    @else
                    <input type="text" class="form-control" placeholder="Enter Area name" id="planNo" name="planNo" value="{{ old('planNo') }}" required>
                    @endif
                    @error('planNo')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-check">
                    <input type="hidden" class="form-control" name="pid" value="{{ $process_item->id }}">  
                    <button type="submit" class="btn bd-navbar text-light" >Update</button>
                </div>
            </div>
        </div>
    </div>
  </form>
</div>
<script type="text/javascript">
  //THIS USES THE AUTOMECOMPLETE FUNCTION IN TREE REMOVAL CONTROLLER
  $(document).ready(function() {
    $('#image').change(function() {
      var fp = $("#image");
      var lg = fp[0].files.length; // get length
      var items = fp[0].files;
      var fileSize = 0;

      if (lg > 0) {
        for (var i = 0; i < lg; i++) {
          fileSize = fileSize + items[i].size; // get file size
        }
        if (fileSize > 5242880) {
          alert('You should not uplaod files exceeding 4 MB. Please compress files size and uplaod agian');
          $('#image').val('');
        }
      }
    });
  });

  

</script>
@endsection