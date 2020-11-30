@extends('home')

@section('cont')
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<span>
    <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
</span>
    <div class='row justify-content-center'>
    </br>
    @error('create_by')
        <div class="alert">                                   
            <strong>{{ "You need to be be logged in first" }}</strong>
        </div>
    @enderror

    <h2>Report a crime</h2>
    </br>
    </div>
    <hr>
     <div class='row justify-content-center'> 
     <form action="\crime-report\crimecreate" method="post">
      @csrf
                       <h6>Crime type</h6>
                       <div class="input-group mb-3">
                            <select name="crime_type" class="custom-select" required>
                                <option value="0" selected>Select</option>
                                <option value="1">Illegal tree cutting</option>
                                <option value="2">Illegal tree transportation</option>
                                <option value="3">Environment polution</option>
                            </select>
            
        
                            @error('crime_type')
                                <div class="alert">                                   
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            
                        </div>
                        </br>
                        <h6>Make complaint to</h6>
                        <div class="input-group mb-3">
                            <select name="organization" class="custom-select" required>
                                <option value="0" selected>Select Organization</option>
                            @foreach($Organizations as $organization)
                                
                                <option value="{{$organization->id}}">{{$organization->title}}</option>
                                @endforeach
                            </select>
            
        
                            @error('organization')
                                <div class="alert">                                   
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <h6>Photos</h6>
                            <input type="file" id="images" name="images[]">
                        </div>
                       </br>
                       <h6>Description</h6>
                       <div class="input-group mb-3">
                            </br>
                           <textarea  class="form-control" rows="5" name="description">
                           </textarea>
                           @error('description')
                                <div class="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                       </div>
                       </br>
                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Location</span>
                           </div>
                           <input type="text" class="form-control" name="location">
                           @error('location')
                                <div class="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                           <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">

                       </div>
                       </br>
                       <div class="form-check">
                           <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" name="confirm" ><strong>I confirm these information to be true</strong>
                               @error('confirm')
                                <div class="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                           </label>
                           </br>
                           <button type="submit" class="btn btn-primary" >Submit</button>
                       </div>
                    </form>
     </div>
    </div>
</div>
</div>
@endsection