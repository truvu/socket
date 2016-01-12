<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{% block title %}{% endblock %}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/asset/css/account.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container"></div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" style="float:none;margin-left: auto; margin-right: auto;">
                    {% block form %} {% endblock %}
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/asset/js/account.js"></script>
    </body>
</html>