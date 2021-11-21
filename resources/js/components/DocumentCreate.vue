<template>

 <div class="container">
            <form action="" enctype="multipart/form-data" id="documentForm" method="post" autocomplete="off">
            
                <div class="row p-4 bg-white">
                    <div class="col-md-6 col-lg-4 col-xl border border-muted rounded-lg mr-2 p-4">
                        
                        <div class="form-group">
                            <label for="title">Title:<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Enter Title" id="document_title" name="title">
                           
                        </div>
                        
                        <div class="form-group">
                            <label for="tags">Tags:<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Separate tags using a ','" id="tags" name="tags">
                           
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
                <input type="hidden" name="file_path[]" id="file_path" />
                </form>

                <form action="{{ route('store-document') }}" enctype="multipart/form-data" id="documentForm2" method="post">
                 <div class="col-md-6 col-lg-4 col-xl border border-muted rounded-lg p-4">
                    <div class="form-group">
                    <label for="province">Files:<b>*</b></label>
                    <input type="file"  name="select_file" id="select_file" />
                    <input type="button" name="upload" id="upload" class="btn btn-primary" value="Upload">
                        <div class="alert mt-3" id="message" style="display: none"></div>
                    </div>
                    </div>
                    <div class="row">
                </div>

                </form>

    </div>

</template>

<script>
    export default {}
</script>