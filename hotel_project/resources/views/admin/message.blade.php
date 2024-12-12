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
        tr{
            height:65px;
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
                        <th class="th_design">Name</th>
                        <th class="th_design">Email</th>
                        <th class="th_design">Phone</th>
                        <th class="th_design">Message</th>
                        <th class="th_design">Send Email</th>
                    </tr>
                    </tr>

                    @foreach($contact as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->message}}</td>
                            <td><a href="{{url('send_mail',$contact->id)}}" class="btn btn-success">Send Email</a></td>

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
