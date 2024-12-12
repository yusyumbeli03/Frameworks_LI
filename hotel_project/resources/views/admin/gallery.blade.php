<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <center>
                    <h1 style="font-size: 40px; font-weight: bold; ">Gallery</h1>

                    <div class="row">


                        @foreach($gallery as $gallery)
                            <div class="col-md-4">
                                <img src="/gallery/{{$gallery->image}}" style="height: 200px; width: 300px" alt="#">
                                <a href="{{url('gallery_delete', $gallery->id)}}" class="btn btn-danger" style="margin-top:10px; margin-bottom: 10px;">Delete Image</a>
                            </div>
                        @endforeach
                    </div>

                    <form action="{{url('upload_gallery')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:30px;">
                            <label style="color: grey; font-size: 25px; margin-right: 15px; font-weight: bold">Upload Image</label>
                            <input type="file" name="image" required>

                            <input class="btn btn-info" type="submit" value="Add Image">
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
</body>
</html>
