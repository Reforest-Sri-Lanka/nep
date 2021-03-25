@extends('home')

@section('cont')
<kbd><a href="/environment/updatedata" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
   <h2 style="text-align:center;" class="text-dark">Application Form </h2>
   <hr>
   <div class="row justify-content-md-center border p-4 bg-white">
      <div class="col-6 ml-3">
         <!--Organizaion Details -->        
         <h6 style="text-align:left;" class="text-dark">Eco-Systems Details</h6>
         <hr>
         <form action="/environment/newrequest" method="post">
      @csrf
    

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
    

  

     <div class="input-group mb-3">
   
  
        <div class="input-group mb-3">
      <select name="type" class="custom-select" required>
                <option disabled selected>Eco-system type</option>
                <option >Land</option>
                <option >Marine</option>
                <option >Fresh Water</option>
                <option >Riverine</option>
                <option >Grassland</option>
                <option >Forest</option>

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
                      

                       <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                        <label class="custom-control-label" for="customCheck"><strong>I confirmed these information to be true</strong></label>

                        </br>
                        <button type="submit" class="tn btn-outline-secondary btn" >Cancel</button>
                        <button type="submit" class="btn bd-navbar text-light" >Submit</button>
                        
                    </div>
                       <input type="hidden" class="form-control" name="createby" value="{{Auth::user()->id}}">
                       <input type="hidden" class="form-control" name="status" value="0">

                    </form>
     </div>
    </div>
</div>
</div>
@endsection