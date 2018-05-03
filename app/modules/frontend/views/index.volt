<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Cổng thông tin điện thử bộ giáo dục và đào tạo</title>
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/awesome/css/font-awesome.min.css') }}
        {{ stylesheet_link('css/reset.css') }}
        {{ stylesheet_link('css/style.css') }}
        {{ stylesheet_link('css/dropmenu.css') }}
    </head>
    <body>
        <div class="head-banner">
            {{ partial("layouts/header") }}
        </div>
        <div class="menu-page">
            {{ partial("layouts/menu") }}
        </div>

        <div class="container">
            <div class="main">
                {{ content() }}
            </div>
        </div>
        
        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/custom.js') }}
        <script type="text/javascript">
            $('#openid-login').click(function(){
                var url = document.getElementById('google-login').getAttribute('action');
                window.location.href=url;
            });
            $('#delete-confirm').on('show.bs.modal', function(e) {
                var url = $(e.relatedTarget).data('href');
                $('#btn-ok').click(function(){
                    window.location.href=url;
                });
            });
        </script>
    </body>
</html>
