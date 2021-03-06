<div class="col-md-12">
    <div class="row justify-content-between">
        <div class="col-md-auto" style="margin-bottom: 25px;">
            <h5 style="font-size: 1.25rem;">ĐĂNG NHẬP</h5>
            <hr>
        </div>
    </div>
</div>

<div class="col-md-12">
    {{ form('login', 'method': 'post', 'class':'valid-form', 'novalidate':'') }}
        <?=
            $this->tag->hiddenField([
                'id' => $this->security->getTokenKey(),
                'name' => $this->security->getTokenKey(),
                'value' => $this->security->getToken()]
            )
        ?>
        <!--div class='row form-group'>
            <div class="col-md-2">
                <label class="control-label font-weight-bold">Tên đăng nhập:</label>
            </div>
            <div class="col-md-5">
                <?= $form->render('username',['class'=>'form-control','required'=>true]) ?>
                <div class="invalid-feedback">Tên đăng nhập là bắt buộc</div>
            </div>
        </div>
        <div class='row form-group'>
            <div class="col-md-2">
                <label class="control-label font-weight-bold">Mật khẩu:</label>
            </div>
            <div class="col-md-5">
                <?= $form->render('password',['class'=>'form-control','required'=>true]) ?>
                <div class="invalid-feedback">Mật khẩu là bắt buộc</div>
            </div>
        </div-->
        <div class='row form-group'>
            <div class="offset-md-2 col-md-5">
                <?php $this->flash->output() ?>
            </div>
        </div>
        <div class='row form-group'>
            <div class="col-md-5 offset-md-2">
                <div class="row justify-content-between">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-default" id='openid-login'>
                            {{ image('img/gmail-login.jpeg') }}
							<!--i class='fa fa-google'></i>oogle-->
                        </button>
                    </div>
                    <!--div class="col-md-auto">
                        {{ submit_button('Đăng nhập', 'class':'btn btn-primary') }}
                    </div-->
                </div>
            </div>
        </div>
    {{ end_form() }}
</div>

{{ form('login/google', 'method': 'post', 'id':'google-login') }}{{ end_form() }}