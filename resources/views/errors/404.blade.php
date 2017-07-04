<!DOCTYPE html>
<html>
    <head>
        <title>404</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{asset('assets/css/font-awesome4_7.min.css')}}" rel="stylesheet" />
    
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Page not Found</div>
                <a href="{{url('about-us')}}" class="btn btn-lg btn-primary text-uppercase">meet the team</a>
            </div>
        </div>
    </body>
</html>
