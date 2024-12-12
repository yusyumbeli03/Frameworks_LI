<!DOCTYPE html>
<html lang="en">
<head>
    <base href="\public">
    @include('home.css')

    <style>
        label
        {
            display: inline-block;
            width:200px;
        }

        input
        {
            width:100%;
        }
    </style>
</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
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



                <div class="col-md-8">
                    <div id="serv_hover"  class="room">
                        <div style="padding: 20px" class="room_img">
                            <figure><img style="height: 300px; width:800px" src="/room/{{$room->image}}" alt="#"></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{$room->room_title}}</h3>
                            <p style="padding: 12px">{{$room->description}}</p>
                            <h4 style="padding: 12px"><b>Free Wi-Fi:</b> {{$room->wifi}}</h4>
                            <h4 style="padding: 12px"><b>Room Type:</b> {{$room->room_type}}</h4>
                            <h3 style="padding: 12px">Price: {{$room->price}}</h3>

                        </div>
                    </div>
                </div>

            <div class="col-md-4">

                <h1 style="font-size: 40px ! important ">Book Room</h1>

                <div class="bg-light text-success p-3 mb-3 rounded">
                    @if(session()->has('message'))

                        {{session()->get('message')}}
                    @endif
                </div>
                @if($errors)
                    @foreach($errors->all() as $errors)
                        <li style="color:red;">
                            {{$errors}}
                        </li>
                    @endforeach
                @endif

                <form action="{{url('book_room', $room->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Name</label>
                        <input type="text" name="name"
                               @if(Auth::id())
                               value="{{Auth::user()->name}}"
                            @endif
                        >
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email"
                               @if(Auth::id())
                                   value="{{Auth::user()->email}}"
                            @endif
                        >
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone"
                               @if(Auth::id())
                                   value="{{Auth::user()->phone}}"
                            @endif
                        >
                    </div>

                    <div>
                        <label>Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                    </div>

                    <div>
                        <label>End Date</label>
                        <input type="date" name="endDate" id="endDate">
                    </div>

                    <div style="padding-top: 20px">
                        <input type="submit" value="Book Room" class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<!--  footer -->
<footer>
    @include('home.footer')
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;

        var day = dtToday.getDate();

        var year = dtToday.getFullYear();

        if(month < 10)
            month = '0' + month.toString();

        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);

    });
</script>
</body>
</html>
