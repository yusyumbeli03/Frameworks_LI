<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .table_design
        {
            border: 2px solid white;
            margin: auto;
            width:100%;
            text-align: center;
            margin-top:40px;
        }
        .th_design
        {
            background-color: skyblue;
            padding: 15px;
        }

        tr,th
        {
            border: 3px solid white;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <table class="table_design">
                    <tr>
                        <th class="th_design">Room Id</th>
                        <th class="th_design">Customer Name</th>
                        <th class="th_design">Email</th>
                        <th class="th_design">Phone</th>
                        <th class="th_design">Arrival Date</th>
                        <th class="th_design">Leaving Date</th>
                        <th class="th_design">Status</th>
                        <th class="th_design">Room Title</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Delete</th>
                        <th class="th_design">Status Update</th>

                    </tr>
                    </tr>

                    @foreach($data as $data)
                        <tr>
                            <td>{{$data->room_id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->start_date}}</td>
                            <td>{{$data->end_date}}</td>
                            <td>
                                @if($data->status == 'Approved')
                                    <span style="color:green">Approved</span>
                                @endif
                                @if($data->status == 'Rejected')
                                    <span style="color:red">Rejected</span>
                                    @endif

                                    @if($data->status == 'waiting')
                                        <span style="color:yellow">Waiting</span>
                                    @endif
                            </td>
                            <td>{{$data->room->room_title}}</td>
                            <td>{{$data->room->price}}</td>
                            <td><img width="150" src="/room/{{$data->room->image}}" alt="#"></td>
                            <td><a onclick="return confirm('Are you sure to delete this ?')" href="{{url('booking_delete',$data->id)}}" class="btn btn-danger">Delete</a></td>
                            <td>
                                <span style="padding-bottom: 10px">
                                    <a href="{{url('approve_book',$data->id)}}" class="btn btn-success" >Approve</a>
                                </span>
                                <a href="{{url('rejected_book',$data->id)}}" class="btn btn-warning" >Rejected</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
@include('admin.footer')
</body>
</html>
