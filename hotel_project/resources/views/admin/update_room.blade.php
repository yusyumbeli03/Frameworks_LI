<!DOCTYPE html>
<html>
<head>

    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label{
            display:inline-block;
            width:200px;
        }
        .div_design
        {
            padding-top: 30px;

        }
        .div_center
        {
            text-align: center;
            padding-top: 40px;
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
                <div class="div_center">
                    <h1 style="font-size: 30px; font-weight: bold">Update Room</h1>
                    <form action="{{url('edit_room',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Room Title</label>
                            <input type="text" name="title" value = "{{$data->room_title}}">
                        </div>

                        <div  class="div_design">
                            <label>Description</label>
                            <textarea  name="description" >{{$data->description}}</textarea>
                        </div>

                        <div  class="div_design">
                            <label>Price</label>
                            <input type="number" name="price" value = "{{$data->price}}">
                        </div>

                        <div  class="div_design">
                            <label>Room Type</label>
                            <select name="type" >
                                <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>

                        <div  class="div_design">
                            <label>Free Wi-Fi</label>
                            <select name="wifi" >
                                <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>


                        <div  class="div_design">
                            <label>Current Image</label>
                           <img style="margin:auto " width="90" src="/room/{{$data->image}}" alt="alt_text">
                        </div>

                        <div  class="div_design">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" class="btn btn-success" value="Update Room">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
</body>
</html>
