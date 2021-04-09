<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div>
    <h4>Assign {{$form_type['type']}} No {{$form_id}}</h4>
</div>
<hr>
<div>
    <h6>The Head of application processing</h6>
    <h6>{{$other_removal_requestor_name}} ,</h6>
</div>
<div>
    <h6>The {{$form_type['type']}} application made on the {{ date('d-m-Y',strtotime($created_at)) }} has been assigned to your organization. </h6>
    <h6>A pdf of the application and other supporting documents has been attached to this email</h6>
</div>
</body>
</html>