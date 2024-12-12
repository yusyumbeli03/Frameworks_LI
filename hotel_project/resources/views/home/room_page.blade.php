<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="main-layout">

<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#"/></div>
</div>

<header>
    @include('home.header')
</header>

<div  class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($room as $rooms)
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover"  class="room">
                        <div class="room_img">
                            <figure><img style="height: 220px; width:360px" src="room/{{$rooms->image}}" alt="#"></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{$rooms->room_title}}</h3>
                            <p style="padding:10px">{!!Str::limit($rooms->description,100)!!}</p>

                            <a href="{{url('room_details',$rooms->id)}}" class="btn btn-primary">Room Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<footer>
    @include('home.footer')
</footer>
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
