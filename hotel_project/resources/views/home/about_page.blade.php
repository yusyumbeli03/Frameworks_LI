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

<div class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="titlepage">
                    <h2>About Us</h2>
                    <p>Hotel Keto is a charming accommodation option known for its blend of comfort and convenience, catering to both leisure and business travelers. Located in a serene area yet close to the city’s main attractions, the hotel offers modern amenities, including well-furnished rooms, free Wi-Fi, and on-site dining options. Guests often praise the friendly staff, who ensure a warm and personalized experience throughout their stay. Its central location makes it an ideal base for exploring nearby landmarks, dining establishments, and cultural sites. Whether you're traveling for work or relaxation, Hotel Keto provides a welcoming retreat.</p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about_img">
                    <figure><img src="images/about.png" alt="#"/></figure>
                </div>
            </div>
        </div>
    </div>
</div>




<footer>
    @include('home.footer')
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>


</body>
</html>
