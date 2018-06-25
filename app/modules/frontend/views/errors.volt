<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Bộ Giáo dục và Đào tạo - Giải thưởng sinh viên nghiên cứu khoa học</title>
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/awesome/css/font-awesome.min.css') }}
        {{ stylesheet_link('css/reset.css') }}
        {{ stylesheet_link('css/style.css') }}
    </head>
    <body>

        <div class="container">
            <div class="main">
                {{ content() }}
            </div>
        </div>
        
        {{ javascript_include('js/jquery.min.js') }}
        
    </body>
</html>
