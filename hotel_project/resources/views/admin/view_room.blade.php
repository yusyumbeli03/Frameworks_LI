<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
       .table_design
       {
           border: 2px solid white;
           margin: auto;
           width:85%;
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

       input[type='search']
       {
           width: 350px;
           height:40px;
           margin-left: 50px;
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

            <form action="{{url('room_search')}}" method="get" >
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

                <table class="table_design">
                    <tr>
                        <th class="th_design">Room Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Wi-Fi</th>
                        <th class="th_design">Room Type</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Update</th>
                        <th class="th_design">Delete</th>
                    </tr>
                    </tr>

                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->description,150) !!}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->wifi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td><img  width="90" src="room/{{$data->image}}"></td>
                        <td><a href="{{url('room_update',$data->id)}}" class="btn btn-warning">Update</a></td>
                        <td><a onclick="return confirm('Are you sure to delete this ?')" href="{{url('room_delete',$data->id)}}" class="btn btn-danger">Delete</a></td>
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
