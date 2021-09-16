@extends('general')

@section('general')

<div class="container">
    <div class="d-flex mb-2 justify-content-start">
        <h1>Add new document</h1>
    </div>

    <!-- FAQ button -->
    <div class="d-flex mb-2 justify-content-end">
        <span><a title="FAQ" style="font-size:24px;cursor:pointer;" data-toggle="modal" data-target="#restorationHelp"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
    </div>
    @include('faq')
    <form action="/env-restoration/store" id="envForm" method="post" autocomplete="off">
        @csrf
        <!-- One "tab" for each step in the form: -->
        
            <div class="container">
                <div class="row p-4 bg-white">
                    <div class="col-md-6 col-lg-4 col-xl border border-muted rounded-lg mr-2 p-4">
                        
                        <div class="form-group">
                            <label for="title">Title:<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Enter Title" id="document_title" name="title">
                            @error('document_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="planNo">Tags:<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Separate tags using a ','" name="planNo">
                            @error('tags')
                            <div class="alert alert-danger">{{ $tags }}</div>
                            @enderror
                        </div>


                      
                        <div class="form-group">
                            <label for="activity_org">Tasks:</label>
                            <input type="text" class="form-control typeahead1" placeholder="Enter Organization" id="activity_org" name="activity_org" />
                            @error('activity_org')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> </div>

                <div class="row p-4 bg-white">
                        <div class="col-md-6 col-lg-6 col-xl border border-muted rounded-lg p-4">
                            
                            <div class="form-group">       
                            <label for="province">Province:<b>*</b></label>
                            <select class="custom-select @error('province') is-invalid @enderror" name="data_province">
                                <option disabled selected value="">Select</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ Request::old()?(Request::old('province')==$province->id?'selected="selected"':''):'' }}>{{ $province->province }}</option>
                                @endforeach
                            </select>
                            @error('province')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="province">District:<b>*</b></label>
                                <select class="custom-select @error('district') is-invalid @enderror" name="data_district">
                                    <option disabled selected value="">Select</option>
                                    @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ Request::old()?(Request::old('district')==$district->id?'selected="selected"':''):'' }}>{{ $district->district }}</option>
                                    @endforeach
                                </select>
                                @error('district')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                <div class="row p-4 bg-white">
                 <div class="col-md-6 col-lg-4 col-xl border border-muted rounded-lg p-4">
                    <div class="form-group">
                    <label for="province">Files:<b>*</b></label>
                        <input type="file" id="fileUpload" name="fileUpload" accept=".xks,.xlsx" />
                        <a type="button" name="uploadExcel" id="uploadExcel" class="btn btn-info">Import as Excel</a>
                        <a type="button" name="clear" id="clear" class="btn btn-danger">Clear All</a>
                        <p id="error" class="text-danger"></p>
                    </div>
                    </div>
                </div>
            
            </div>
                           
                        </form>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.3/xlsx.full.min.js"></script>
<script type="text/javascript">
    //Species Excel Sheet Import
    $(document).ready(function() {


    });
</script>

@endsection