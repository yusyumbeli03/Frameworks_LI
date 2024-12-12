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
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <center>
                    <h1>Mail send to {{$data->name}}</h1>

                    <form action="{{url('mail',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Greeting</label>
                            <input type="text" name="greeting">
                        </div>

                        <div  class="div_design">
                            <label>Mail Body</label>
                            <textarea  name="body"></textarea>
                        </div>

                        <div  class="div_design">
                            <label>Action Text</label>
                            <input type="text" name="action_text">
                        </div>

                        <div  class="div_design">
                            <label>Action URL</label>
                            <input type="text" name="action_url">
                        </div>

                        <div  class="div_design">
                            <label>End Line</label>
                            <input type="text" name="end_line ">
                        </div>



            <div class="div_design">
                            <input type="submit" class="btn btn-success" value="Sent Mail">
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
