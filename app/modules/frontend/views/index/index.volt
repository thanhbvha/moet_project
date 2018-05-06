<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">THÔNG TIN TÀI KHOẢN</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('topic') }}" class="btn btn-outline-info btn-sm">
				<i class="fa fa-list"></i> Danh sách đề tài
			</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	{% if user.MoetUsersRoles.name === 'register'%}
		<div class="alert alert-warning">
			Tài khoản của bạn đang ở chế độ chờ. Đề nghị liên hệ với số điện thoại <b style="font-weight: bold;color: darkblue;">0904184886</b> để được duyệt.
		</div>
	{% elseif user.MoetUsersRoles.name !== 'admin' and user.is_update === "0" %}
		<div class="alert alert-info">
			<i class="fa fa-info-circle"></i> Hãy cập nhật thông tin trước khi đăng ký đề tài
		</div>
		<div class='row form-group'>
            <div class="offset-md-2 col-md-5">
                <?php $this->flash->output() ?>
            </div>
        </div>
		{{ form('/', 'method': 'post', 'class':'valid-form', 'novalidate':'') }}
	        <?=
	            $this->tag->hiddenField([
	                'id' => $this->security->getTokenKey(),
	                'name' => $this->security->getTokenKey(),
	                'value' => $this->security->getToken()]
	            )
	        ?>
	        <div class='row form-group'>
				<div class="col-md-2"><label class="control-label">Đơn vị:</label></div>
				<div class="col-md-3">
					<?= $form->render('units_id',['class'=>'form-control', 'required'=>'']) ?>
					<div class="invalid-feedback">Đơn vị là bắt buộc</div>
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-md-2"><label class="control-label">Địa chỉ:</label></div>
				<div class="col-md-5">
					<?= $form->render('address',['class'=>'form-control', 'required'=>'']) ?>
					<div class="invalid-feedback">Địa chỉ là bắt buộc</div>
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-md-2"><label class="control-label">Số điện thoại:</label></div>
				<div class="col-md-5">
					<?= $form->render('phone',['class'=>'form-control', 'required'=>'']) ?>
					<div class="invalid-feedback">Số điện thoại là bắt buộc</div>
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-md-2"><label class="control-label">Người phụ trách QLKH:</label></div>
				<div class="col-md-5">
					<?= $form->render('unit_manager',['class'=>'form-control', 'required'=>'']) ?>
					<div class="invalid-feedback">Người phụ trách là bắt buộc</div>
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-md-2"><label class="control-label">Ghi chú:</label></div>
				<div class="col-md-5">
					<?= $form->render('noted',['class'=>'form-control']) ?>
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-md-2 offset-md-2">
					{{ submit_button('Cập nhật thông tin', 'class':'btn btn-success') }}
				</div>
			</div>
	    {{ end_form() }}
	{% else %}
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Tên hiển thị:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">{{ user.fullname }}</label>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Hòm thư:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{{ user.email }} 
					{% if user.status ==='0' and user.MoetUsersRoles.name !== 'admin' %}
						<strong style="color:red;">( Chờ duyệt )</strong>
					{% endif %}
				</label>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Số điện thoại:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{% if user.MoetUsersInfo.phone is defined %}
						{{ user.MoetUsersInfo.phone }}
					{% endif %}
				</label>
			</div>
		</div>
		<hr>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Đơn vị:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{% if user.MoetUsersInfo.MoetUnits.name is defined %}
						{{ user.MoetUsersInfo.MoetUnits.name }}
					{% endif %}
				</label>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Địa chỉ:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{% if user.MoetUsersInfo.address is defined %}
						{{ user.MoetUsersInfo.address }}
					{% endif %}
				</label>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Người quản lý QLKH:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{% if user.MoetUsersInfo.unit_manager is defined %}
						{{ user.MoetUsersInfo.unit_manager }}
					{% endif %}
				</label>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label font-weight-bold">Ngày đăng ký:</label>
			</div>
			<div class="col-md-5">
				<label class="control-label">
					{{ date("Y-m-d H:i:s", user.created_at) }}
				</label>
			</div>
		</div>
	{% endif %}
</div>