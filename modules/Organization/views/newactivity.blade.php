@extends('adminorg')

@section('admin')
<div class="container">
    <form action="\organization\activitycreate" method="post">
    @csrf
        <div class="container bg-white">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="form_type">Form type:</label>
                        <select name="form_type" class="custom-select" required>
                            <option value="0" selected>Select Form Type</option>
                            @foreach($Forms as $form)
                              @if (old('form_type') == $form->id)
  		                          <option value="{{ $form->id }}" selected>{{$form->type}}</option>
  	                          @else
                                <option value="{{$form->id}}">{{$form->type}}</option>
                              @endif
                            @endforeach
                        </select>
                        @error('form_type')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="organization">Organization in charge</label>
                            <input type="text" class="form-control typeahead3" placeholder="Search" name="organization" value="{{ old('organization') }}"/>
                            
                        @error('organization')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror    
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control typeahead2 @error('district') is-invalid @enderror" value="{{ old('district') }}" placeholder="Search" name="district" />
                        @error('district')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-check" style="float:right;">
                    <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">  
                        <label class="form-check-label">
                        <button type="submit" class="btn btn-primary" >Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

    //THIS USES THE AUTOMECOMPLETE FUNCTION IN TREE REMOVAL CONTROLLER
    var path3 = "{{route('organization')}}";
    $('input.typeahead3').typeahead({
        source: function(terms, process) {

            return $.get(path3, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.title)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });

    var path2 = "{{route('district')}}";
    $('input.typeahead2').typeahead({
        source: function(terms, process) {

        return $.get(path2, {
            terms: terms
        }, function(data) {
            console.log(data);
            objects = [];
            data.map(i => {
            objects.push(i.district)
            })
            console.log(objects);
            return process(objects);
        })
        },
    }); 
</script>
@endsection