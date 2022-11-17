<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" />

    <title>Access history</title>
    <style>
        .cell-border{
            border: 1 solid black;
        }
        .d-block{
            display:block;
        }
        .font-1{
            font-size: .8rem;
        }
        .bkg-blue{
            background-color:  rgb(207, 215, 251); 
        }
        .text-center{
            text-align: center
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h3>ACCESS HISTORY ROOM 911</h3>
        <span class="d-block">{{$date}}</span>
    </div>
 
    <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead>
            <tr style="text-align: center;">
                <th class="cell-border bkg-blue" >ITEM</th>
                <th class="cell-border bkg-blue">EMPLOYEE</th>
                <th class="cell-border bkg-blue">DEPARTMENT</th>
                <th class="cell-border bkg-blue">DOCUMENT NUMBER</th>
                <th class="cell-border bkg-blue">ACCESS</th>
                <th class="cell-border bkg-blue">DATE</th>
            </tr>
        </thead>
        <tbody id="table_personal">
            @if ($access)

            @php($j=1)

            @foreach ($access as $access )
                <tr style="text-align: center;">
                    <td  style="border: 1px solid">{{$j}}</td>
                    <td  style="border: 1px solid">
                        @if ($access->employee)
                            <span>{{$access->employee->full_name}}</span>
                        @else
                            <span>Is not employee</span>
                        @endif
                    </td>
                    <td style="border: 1px solid" >
                        @if ($access->employee)
                            <span>{{$access->employee->department->name}}</span>
                        @else
                            <span> Is not employee</span>
                        @endif
                    </td>
                    
                    <td class="cell-border">{{$access->employee_document ? $access->employee_document:$access->employee->employee_document}}</td>
                    <td class="cell-border">{{$access->access}}</td>
                    <td class="cell-border font-1">{{$access->full_created_at}}</td>
                </tr>
                @php($j++)
            @endforeach
                
            @else
         
            @endif

          
        </tbody>
    </table>
</body>
</html>
