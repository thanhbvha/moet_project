<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">QUẢN LÝ CHUYÊN NGÀNH</h5>
			<hr>
		</div>
	</div>
</div>

<div class="col-md-12" id='data-table' style="margin-top: 15px;">
	<div class="row justify-content-end" style="margin-bottom: 5px;">
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/specializeForm/create') }}" class="btn btn-info btn-sm">
				<i class="fa fa-plus"></i> Thêm mới
			</a>
		</div>
	</div>

	<table class="table table-hover">
	  	<thead>
	    	<tr>
	      		<th scope="col">#</th>
	      		<th scope="col">Mã</th>
	      		<th scope="col">Lĩnh vực</th>
	      		<th scope="col">Chuyên ngành</th>
	      		<th scope="col">Người tạo</th>
	      		<th scope="col">Ngày tạo</th>
	      		<th scope="col">Hành động</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  		{% for index,specialize in unitSpecialize %}
	    	<tr>
	      		<th scope="row">{{ loop.index }}</th>
	      		<td>{{ specialize.code }}</td>
	      		<td>{{ specialize.MoetFields.name }}</td>
	      		<td>{{ specialize.name }}</td>
	      		<td>{{ specialize.MoetUsers.email }}</td>
	      		<td>{{ date("Y-m-d H:i:s", specialize.created_at) }}</td>
	      		<td>
	      			<a href="{{ url('admin/specializeForm/update') }}?id={{ specialize.id }}">
						<i class="fa fa-edit"></i> Sửa
					</a> | 
					<a href="#" data-href="{{ url('admin/specializeForm/delete') }}?id={{ specialize.id }}" data-toggle="modal" data-target="#delete-confirm" id="btn-delete">
						<i class="fa fa-remove"></i> Xóa
					</a>
	      		</td>
	    	</tr>
	    	{% endfor %}
	    </tbody>
	</table>
</div>

<div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				Bạn có chắc là muốn xóa mục này không?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id='btn-ok'>Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>