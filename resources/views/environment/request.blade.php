@extends('home')

@section('cont')
<kbd><a href="/generalenv" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
    <div class='row justify-content-center'>
    </br>
 

    <h2>Add Your data </h2>
    </div>
    

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
  
    <hr>
     <div class='row justify-content-center'> 
     <form action="{{action('EnvController@store')}}" method="post">
      @csrf
   

      <h6> Eco System Type</h6>
        <div class="input-group mb-3">
      <select name="type" class="custom-select" required>
                <option selected>Select</option>
                <option >Land</option>
                <option >Marine</option>
                <option >Fresh Water</option>
                <option >Riverine</option>

            </select>
            
        
                            
                        </div>
                       </br>
                       <h6>Description</h6>
                       <div class="input-group mb-3">
                            </br>
                           <textarea  class="form-control" rows="5" name="description">
                           </textarea>
                          
                       </div>
                   
                      
                       </br>
                       <div class="form-check">
                           <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" name="confirm" ><strong>I confirm these information to be true</strong>
                              
                           </label>
                           </br>
                           <button type="submit" class="btn btn-success" >Submit</button>
                       </div>
                       <input type="hidden" class="form-control" name="createby" value="{{Auth::user()->id}}">
                       <input type="hidden" class="form-control" name="status" value="0">

                    </form>
     </div>
    </div>
</div>
</div>
@endsection