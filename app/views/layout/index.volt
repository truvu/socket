<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{% block title %}{% endblock %}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/asset/css/index.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container"></div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="visible-md visible-lg col-md-2 col-lg-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Calendar</a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-9">
                    {% block content %}{% endblock %}
                </div>
            </div>
        </div>
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="/asset/js/index.js"></script>
    </body>
</html>