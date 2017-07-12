<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Application Report</title>
</head>
<body>
    <p>
        {{ $comment->comment }}
    </p>

    ---
    <p>Replied by: {{  ucfirst($user->name) }}</p>

    <p>Title: {{ $leaveApplication->title }}</p>
    <p>Application ID: {{ $leaveApplication->leave_id }}</p>
    <p>Status: {{ $leaveApplication->status }}</p>

    <p>
        You can view your leave Application at any time at {{ route('leaveApplication.show',$leaveApplication->id) }}
    </p>

</body>
</html>