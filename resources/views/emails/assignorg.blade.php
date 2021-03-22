<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div>
    <h4>Assign {{ $process_item->form_type->type }} No {{ $process_item->form_id }}</h4>
</div>
<hr>
<div>
    <h6>The Head of application processing</h6>
    <h6>{{ $process_item->other_removal_requestor_name }} ,</h6>
</div>
<div>
    <h6>The following {{ $process_item->form_type->type }} application made on the {{ date('d-m-Y',strtotime($process_item->created_at)) }} has been assigned to your organization. </h6>
    <h6>visit the following link <a>http://localhost:8000/general/general<a> <h6>
</div>
</body>
</html>