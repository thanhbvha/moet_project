<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">NHẬP DỮ LIỆU MỚI</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('topic') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-backward"></i> Danh sách đề tài nghiên cứu dự thi
			</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	{{ form('topic/form', 'method': 'post', 'class':'valid-form', 'novalidate':'') }}
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
			<div class="col-md-2"><label class="control-label">Lĩnh vực:</label></div>
			<div class="col-md-3">
				<?= $form->render('fields_id',['class'=>'form-control', 'onchange'=>'get_specialize(this);', 'required'=>'']) ?>
			</div>
			<div class="col-md-2 offset-md-1">
				<label class="control-label">Chuyên ngành:</label>
			</div>
			<div class="col-md-3" id="specialize-filter">
				<?= $form->render('specialize_id',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Chuyên ngành là bắt buộc</div>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label" for="topicName">Tên đề tài:</label>
			</div>
			<div class="col-md-4">
				<?= $form->render('topicName',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Tên đề tài là bắt buộc</div>
			</div>
			<div class="col-md-2">
				<label class="control-label" for="topicCode">Mã đề tài:</label>
			</div>
			<div class="col-md-4">
				<?= $form->render('topicCode',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Mã đề tài là bắt buộc</div>
			</div>
		</div>

		<hr>

		<div class='row form-group'>
			<div class="col-md-2">
				<label class="control-label" for="student">Sinh viên thực hiện:</label>
			</div>
			<div class="col-md-4">
				<?= $form->render('student',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Tên sinh viên là bắt buộc</div>
			</div>
			<div class="col-md-1"><label class="control-label">Giới tính:</label></div>
			<div class="col-md-2">
				<?= $form->render('studentSex',['class'=>'form-control']) ?>
			</div>
			<div class="col-md-2">
				<?= $form->render('studentGenus',['class'=>'form-control', 'placeholder'=>'Dân tộc']) ?>
			</div>
		</div>

		<hr>

		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Năm học:</label></div>
			<div class="col-md-4">
				<?= $form->render('studentScholastic',['class'=>'form-control']) ?>
			</div>
			<div class="col-md-2"><label class="control-label">Chuyên ngành:</label></div>
			<div class="col-md-4">
				<?= $form->render('studentSpecialize',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Chuyên ngành là bắt buộc</div>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Liên hệ sinh viên:</label></div>
			<div class="col-md-4">
				<?= $form->render('studentContact',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Thông tin liên hệ là bắt buộc</div>
			</div>
			<div class="col-md-2"><label class="control-label">Người hướng dẫn:</label></div>
			<div class="col-md-4">
				<?= $form->render('instructor',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Người hướng dẫn là bắt buộc</div>
			</div>
		</div>
		
		<hr>

		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Công bố đề tài khoa học:</label></div>
			<div class="col-md-10">
				<?= $form->render('scienceTopic',['class'=>'form-control']) ?>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Cán bộ phụ trách hướng dẫn:</label></div>
			<div class="col-md-4">
				<?= $form->render('unitManager',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Cán bộ phụ trách là bắt buộc</div>
			</div>
			<div class="col-md-2"><label class="control-label">Hội đồng dự kiến:</label></div>
			<div class="col-md-4">
				<?= $form->render('expectedCouncil',['class'=>'form-control']) ?>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Điểm đánh giá:</label></div>
			<div class="col-md-4">
				<?= $form->render('councilPoint',['class'=>'form-control', 'required'=>'']) ?>
				<div class="invalid-feedback">Điểm đánh giá là bắt buộc</div>
			</div>
			<div class="col-md-2"><label class="control-label">Dự kiến xếp giải:</label></div>
			<div class="col-md-4">
				<?= $form->render('expectedAward',['class'=>'form-control']) ?>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2"><label class="control-label">Ghi chú:</label></div>
			<div class="col-md-10">
				<?= $form->render('noted',['class'=>'form-control']) ?>
			</div>
		</div>
		<div class='row form-group'>
			<div class="col-md-2 offset-md-2">
				{{ submit_button('Gửi dữ liệu', 'class':'btn btn-success') }}
			</div>
		</div>
	{{ end_form() }}
</div>
{{ form('topic/getSpecialize', 'method':'post', 'id':'get-specialize') }}
{{ end_form() }}
<script type="text/javascript">
	function get_specialize(_item){
		var fields_id = _item.value;
		var url = document.getElementById('get-specialize').getAttribute('action');
		$.post(url, {fields_id:fields_id},function(data){
			$('#specialize-filter').html(data);
        });
	}
</script>