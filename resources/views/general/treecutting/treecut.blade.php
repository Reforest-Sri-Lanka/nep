@extends('home')

@section('cont')
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
     <form action="\treecutcreate" method="post">
      @csrf
                       <h6>district</h6>
                       <div class="input-group mb-3">
                            <select name="district" class="custom-select" required>
                                <option value="0" selected>Select</option>
                                <option value="1">Colombo</option>
                                <option value="2">Gampaha</option>
                                <option value="1">Kaluthara</option>
                            </select>
            
        
                            @error('district')
                                <div class="alert">                                   
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
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
                               <span class="input-group-text">GS Division</span>
                           </div>
                           <input type="text" class="form-control" name="gs_division">
                           @error('gs_division')
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