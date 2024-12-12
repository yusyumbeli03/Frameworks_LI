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

<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                {{--                <div class="bg-light text-success p-3 mb-3 rounded">--}}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert" >X</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                {{--                </div>--}}
                <form action="{{url('contact')}}" method="post" id="request" class="main_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="text" name="name" required
                                   @if(Auth::id())
                                       value="{{Auth::user()->name}}"
                                @endif
                            >
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="email" name="email"
                                   @if(Auth::id())
                                       value="{{Auth::user()->email}}"
                                @endif
                            >
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="number" name="phone"
                                   @if(Auth::id())
                                       value="{{Auth::user()->phone}}"
                                @endif
                            >
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" type="type" name="message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
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
