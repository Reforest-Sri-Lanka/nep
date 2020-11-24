@extends('home')

@section('cont')



<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Create Organization</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">

<!--Organizaion Details -->        
        <h6 style="text-align:left;" class="text-dark">Organization Details</h6>

        <hr>
            <form method="post" action="/organization/store">
         
                @csrf
                <!-- Title. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization Name</span>
                    </div>
                    <input type="text" class="form-control" name="title" placeholder="Enter name">
                </div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- City. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">City</span>
                    </div>
                    <input type="text" class="form-control" name="city" placeholder="Enter City">
                </div>
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Select Organization Type. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Type</span>
                    </diV>
                        <select name="org_type" class="custom-select">
                            <option selected>Select Organization Type</option>
                            <option value=1>Government</option>
                            <option value=2>NGO</option>
                            <option value=3>Semi Government</option>
                            <option value=4>Public</option>
                            <option value=5>Private</option>
                        </select>
                </div>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                 <!-- Description field. -->
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <br>
                <!--Contact Details. -->
                <h6 style="text-align:left;" class="text-dark">Contact Details</h6>
                    <hr>
                <!-- Select Contact Type. -->

               



                <p> Select Contact type </p>
                <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                    <select name="type[0]" class="custom-select">
                            <option selected>Mobile Number</option>
                            <option>Land Number</option>
                            <option>Email</option>
                            <option>Fax</option>
                            <option>Address</option>
                    </select>
                    @error('type')
                       <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-sm-6 pl-0 pr-0 ml-0 mr-0">
                    <input type='text' class="form-control" name='contact_signature[0]' id='contact_signature' placeholder="Type here"/> 
                    </div>
                    <div class="col-sm pl-4 pr-0 ml-0 mr-0 form-check">
                    <input class="form-check-input" type="checkbox" name='primary' id='1'  value=1 />&nbsp<label for='primary'>Primary</label>
                    </div>
                    
                </div>
                </div>
                    <br>


                    <div class="container">
                <div class="row">
                    <div class="col-sm-4" id="typeboxDiv">
                   
                    </div>
                    
                </div>
                </div>


                    
                    
                    <div class="col-sm-4 " id="typeboxDiv">
                    </div>



                    <br>
                        <input type="button" id="add" value="Add"> <input type="button" id="remove" value="Remove">
                    <br>


                 <!--pass in the user's organization id as well -->
                <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">

                <div style="float:right;">
                
                <button type="submit" name="status" value="1" class="btn btn-primary">Create</button>

                </div>
            </form>
     <script>  
     var contactInputCount=1;
        $(document).ready(function() 
		{  
            $("#add").on("click", function() 
			{  
                $("<br><select class='custom-select'>").attr("name", `type[${contactInputCount++}]`).appendTo("#typeboxDiv").append(
				$("<option>").val("mobile").text("Mobile Number"),
				$("</option><option>").val("land").text("Land Number"),
				$("</option><option>").val("email").text("Email"),
				$("</option><option>").val("fax").text("Fax"),
				$("</option><option>").val("address").text("Address"));
                $("#typeboxDiv").append(`</option></select></div><div class='col-sm-6 pl-0 pr-0 ml-0 mr-0'><input type='text'class='form-control' name='contact_signature[${contactInputCount++}]' id='value'/> </div> <div  class='col-sm pl-4 pr-0 ml-0 mr-0 form-check'> <input type='checkbox' class ='form-check-input' name='primary' id='primary'/><label for='primary'>Primary</label></div></div></div>`); 
                
            });
			
			$("#remove").on("click", function() 
			{  
				
                $("#typeboxDiv").children().last().remove();  
                $("#typeboxDiv").children().last().remove();  
                $("#typeboxDiv").children().last().remove(); 
                
              
                
			});  
        });  
    </script>  

        </div>
    </div>
</div>
@endsection