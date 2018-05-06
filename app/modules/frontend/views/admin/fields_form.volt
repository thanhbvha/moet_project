<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">SỬA LĨNH VỰC</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/fields') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-backward"></i> Quay lại
			</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	{% if isNewRecord is defined %}
	{{ form('admin/fieldsForm/create', 'method': 'post', 'class':'valid-form', 'novalidate':'') }}
	{% else %}
	{{ form('admin/fieldsForm/update', 'method': 'post', 'class':'valid-form', 'novalidate':'') }}
	{% endif %}
		<?=
			$this->tag->hiddenField([
				'id' => $this->security->getTokenKey(),
				'name' => $this->security->getTokenKey(),
				'value' => $this->security->getToken()]
			)
		?>
		{% if isNewRecord is not defined %}
		<?= $form->render('id') ?>
		{% endif %}
		<div class='row form-group'>
			<div class="col-md-2 offset-md-3"><label class="control-label">Mã:</label></div>
			<div class="col-md-4">
				<?= $form->render('code',['class'=>'form-control','maxlength'=>15,'required'=>true]) ?>
				<div class="invalid-feedback">Mã là bắt buộc</div>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2 offset-md-3"><label class="control-label">Tên lĩnh vực:</label></div>
			<div class="col-md-4">
				<?= $form->render('name',['class'=>'form-control', 'required'=>true]) ?>
				<div class="invalid-feedback">Tên lĩnh vực là bắt buộc</div>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2 offset-md-5">
				{% if isNewRecord is defined %}
				{{ submit_button('Create', 'class':'btn btn-primary') }}
				{% else %}
				{{ submit_button('Save', 'class':'btn btn-primary') }}
				{% endif %}
			</div>
		</div>
	{{ end_form() }}
</div>