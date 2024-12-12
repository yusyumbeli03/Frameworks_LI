<!DOCTYPE html>
<html>
<head>
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
                <h1 style="font-size: 30px; font-weight: bold">Add Rooms</h1>
                @if($errors)
                    @foreach($errors->all() as $errors)
                        <li style="color:red;">
                            {{$errors}}
                        </li>
                    @endforeach
                @endif
                <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label>Room Title</label>
                        <input type="text" name="title">
                    </div>

                    <div  class="div_design">
                        <label>Description</label>
                        <textarea  name="description"></textarea>
                    </div>

                    <div  class="div_design">
                        <label>Price</label>
                        <input type="number" name="price">
                    </div>

                    <div  class="div_design">
                        <label>Room Type</label>
                        <select name="type">
                            <option value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div  class="div_design">
                        <label>Free Wi-Fi</label>
                        <select name="wifi">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div  class="div_design">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_design">
                        <input type="submit" class="btn btn-success" value="Add Room">
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
