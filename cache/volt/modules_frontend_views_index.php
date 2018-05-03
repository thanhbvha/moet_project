<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Cổng thông tin điện thử bộ giáo dục và đào tạo</title>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/awesome/css/font-awesome.min.css') ?>
        <?= $this->tag->stylesheetLink('css/reset.css') ?>
        <?= $this->tag->stylesheetLink('css/style.css') ?>
        <?= $this->tag->stylesheetLink('css/dropmenu.css') ?>
    </head>
    <body>
        <div class="head-banner">
            <?= $this->partial('layouts/header') ?>
        </div>
        <div class="menu-page">
            <?= $this->partial('layouts/menu') ?>
        </div>

        <div class="container">
            <div class="main">
                <?= $this->getContent() ?>
            </div>
        </div>
        
        <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
        <?= $this->tag->javascriptInclude('js/custom.js') ?>
        <script type="text/javascript">
            $('#openid-login').click(function(){
                window.location.href='/login/google';
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
