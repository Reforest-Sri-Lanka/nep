@extends('home')

@section('cont')
<kbd><a href="/environment/updatedataspecies" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
   <h2 style="text-align:center;" class="text-dark">Application Form </h2>
   <hr>
   <div class="row justify-content-md-center border p-5 bg-white">
      <div class="col-10 ml-2">
         <!--Organizaion Details -->        
         <h6 style="text-align:left;" class="text-dark">Species Details</h6>
         <hr>
      


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


    <form action='/environment/newspecies' method="post">
        @csrf
    
        <div class="row border rounded-lg p-8 bg-white">
        <div class="row p-2 mt-2">
              <div class="col">
                <div class="form-group">
                  <label for="number_of_tree_species">Species Type</label>
                  <input type="text" class="form-control"  name="type">
                
      
         
       
           <label for="number_of_tree_species">Species Title</label>
           <input type="text" class="form-control"  name="title">
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

@endsection