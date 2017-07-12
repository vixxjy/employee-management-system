<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Application Information</title>
</head>
<body  style="background: black; color: white">
    <p>
        Good Day {{ ucfirst($user->name) }}, Your Leave Application is awaiting approval. You will be notified When your request is approved. Details of your Leave Application are shown below:
    </p>
      
    <p>Title: {{ $leaveApplication->title }}</p>
    <p>Time: {{ $leaveApplication->created_at->diffForHumans() }}</p>
    <p>Status: {{ $leaveApplication->status }}</p>

    <p>
        You can view your leave Application at any time at {{ route('leaveApplication.show',$leaveApplication->id) }}
    </p>

</body>
</html>