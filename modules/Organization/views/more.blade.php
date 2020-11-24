@extends('home')

@section('cont')

<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of {{$organization->title}}</h2><hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-8">
            <form>
            <h6 style="text-align:left;" class="text-dark">Organization Details</h6>
           <hr>
           
            
            <div class="row">
                <div class="col">
                <strong>Organization Name :</strong>
                </div>
                <div class="col">
                {{ $organization->title }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                <strong>City :</strong>
                </div>
                <div class="col">
                {{ $organization->city }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                <strong>Organization Type :</strong>
                </div>
                <div class="col">
                {{ $organization->type}}
                </div> 
            </div>
            <br>
            <div class="row">
                <div class="col">
                <strong>Country :</strong>
                </div>
                <div class="col">
                {{ $organization->country}}
                </div> 
            </div>
            <br>
            <div class="row">
                <div class="col">
                <strong>Status :</strong>
                </div>
                <div class="col">
                    @switch($organization->status)
                    @case('0')
                    {{ $organization->status}}
                    @break;
                    @case('1')
                    {{ $organization->status}}
                    @break;
                    @endswitch
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                <strong>Descroption :</strong>
                </div>
                <div class="col">
                {{ $organization->description }}
                </div> 
            </div>
            <br>
            <br>
            <h6 style="text-align:left;" class="text-dark">Contact Details</h6>
       
            <hr>

            <div class="row">
                <div class="col">
                <strong>Contact Type</strong>
                </div>
                <div class="col">
                <strong>Value</strong>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col">
                <strong>Email</strong>
                </div>
                <div class="col">
                <span>reforest@gmail.com</span>
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col">
                <strong>Fax</strong>
                </div>
                <div class="col">
                <span>01123453456</span>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col">
                <strong>Address</strong>
                </div>
                <div class="col">
                <span>Colombo,Sri Lanka</span>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col">
                <strong>Mobile Number</strong>
                </div>
                <div class="col">
                <span>076456543(Primary)</span>
                </div>
            </div>
            <br>


            </form>



        </div>
    </div>
</div>

@endsection