@extends('home')

@section('cont')

<kbd><a href="{{ url()->previous() }}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of {{$restoration->title}}</h2><hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$restoration->title}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Restoration Type</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$restoration->environment_restoration_activities->title}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Eco-System</span>
                    </div>
                        <input type="text" class="form-control" placeholder="{{$restoration->eco_systems->title}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                    </div>
                    @if($user->organization == NULL)
                        <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                        <input type="text" class="form-control" placeholder="{{$user->organization->title}}" readonly>
                    @endif
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Status</span>
                    </div>
                    @switch($user->status)
                    @case('1')
                    <input type="text" class="form-control" placeholder="Pending" readonly>
                    @break;
                    @case('3')
                    <input type="text" class="form-control" placeholder="Completed" readonly>
                    @break;
                    @endswitch
                </div>
                <div class="form-check border-secondary rounded-lg" style="background-color:#ebeef0">
                    <label class="mt-2"> Plant Species Grown </label>
                    <hr>
                    <fieldset disabled>
                        <input type="checkbox" name="species[]" value="AHeterophyllus" checked><label class="ml-2" checked />	Artocarpus heterophyllus</label> <br>
                        <input type="checkbox" name="species[]" value="AChampden" checked><label class="ml-2" checked />	Artocarpus champeden</label> <br>
                        <input type="checkbox" name="species[]" value="Mfragrans"><label class="ml-2">Myristica fragrans</label> <br>
                        <input type="checkbox" name="species[]" value="CIndica"><label class="ml-2">	Clausena indica</label> <br>
                        <input type="checkbox" name="species[]" value="Ccommune"><label class="ml-2">Canarium commune</label> <br>
                    </fieldset>
                </div>
                

               
            </form>
        </div>
    </div>
</div>

@endsection