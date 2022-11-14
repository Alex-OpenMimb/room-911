<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Access history</title>
</head>
<body>
    <div class="d-flexjustify-content-between">
        <h3>ACCESS HISTORY ROOM 911</h3>
        <span class="my-0">{{$date}}</span>
    </div>
    <h4>Access History</h4>
    <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead>
            <tr style="text-align: center;">
                <th>#</th>
                <th>EMPLOYEE</th>
                <th>DEPARTMENT</th>
                <th>DOCUMENT NUMBER</th>
                <th>ACCESS</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody id="table_personal">
            @php($j=1)
            @foreach ($access as $access )
                <tr style="text-align: center;">
                    <th>{{$j}}</th>
                    <th >
                        @if ($access->employee)
                            <span>{{$access->employee->full_name}}</span>
                        @else
                            <span>Is not employee</span>
                        @endif
                    </th>
                    <th >
                        @if ($access->employee)
                            <span>{{$access->employee->department->name}}</span>
                        @else
                            <span> Is not employee</span>
                        @endif
                    </th>
                    
                    <th>{{$access->employee_document ? $access->employee_document:$access->employee->employee_document}}</th>
                    <th>{{$access->access}}</th>
                    <th>{{$access->full_created_at}}</th>
                </tr>
                @php($j++)
            @endforeach
        </tbody>
    </table>
</body>
</html>
