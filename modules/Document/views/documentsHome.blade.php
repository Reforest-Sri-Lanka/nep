@extends('documents')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('create-document') }}" class="btn btn-info mr-4" role="button">New Document</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All documents submitted to the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)<tr>
                    <td>{{$document->title}}</td>
                    <td>{{date('d-m-Y',strtotime($document->created_at))}}</td>
                    <td>{{$document->status->type}}</td>
                    <td><a href="/Document/view_document_progress/{{$document->id}}" class="text-dark"  role="button">View Progress</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$documents->links();!!}
        </div>   
    </div>
</div>
@endsection