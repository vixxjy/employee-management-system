<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Application Status Report</title>
</head>
<body>
    <p>
        Hello {{ ucfirst($applicant->name) }},
    </p>
    <p>
        Your leave application with ID #{{ $leaveApplication->leave_id }} has been processed and approved.
    </p>
</body>
</html>