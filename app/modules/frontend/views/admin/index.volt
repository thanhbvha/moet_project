<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">THÔNG TIN TÀI KHOẢN</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/logging') }}" class="btn btn-outline-primary btn-sm">
				<i class="fa fa-history"></i> Logging
			</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class='row'>
		<div class="col-md-2">
			<label class="control-label font-weight-bold">Tên hiển thị:</label>
		</div>
		<div class="col-md-5">
			<label class="control-label">{{ user.fullname }}</label>
		</div>
	</div>
	<div class='row'>
		<div class="col-md-2">
			<label class="control-label font-weight-bold">Tên đăng nhập:</label>
		</div>
		<div class="col-md-5">
			<label class="control-label">{{ user.username }}</label>
		</div>
	</div>
	<div class='row'>
		<div class="col-md-2">
			<label class="control-label font-weight-bold">Hòm thư:</label>
		</div>
		<div class="col-md-5">
			<label class="control-label">{{ user.email }}</label>
		</div>
	</div>
	<div class='row'>
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
	<div class='row'>
		<div class="col-md-2">
			<label class="control-label font-weight-bold">Quyền:</label>
		</div>
		<div class="col-md-5">
			<label class="control-label">{{ user.MoetUsersRoles.name }}</label>
		</div>
	</div>
</div>

<div class="col-md-12" style="margin-top: 25px;">
	<hr>
	<div class="row justify-content-between" id="list-user">
		<div class="col-md-auto" style="margin-bottom: 5px;">
			<h5 style="font-size: 1.25rem;">Danh sách tài khoản</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/users/create') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-plus"></i> Thêm mới
			</a>
		</div>
	</div>
</div>

<div class="col-md-12" id='data-table' style="margin-top: 15px;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Email</th>
				<th scope="col">Tên hiển thị</th>
				<th scope="col">Tên đăng nhập</th>
				<th scope="col">Quyền</th>
				<th scope="col">Trạng thái</th>
				<th scope="col">Ngày tạo</th>
				<th scope="col">Hành động</th>
			</tr>
		</thead>
		<tbody>
			{% for index,users in allUsers %}
			<tr>
				<th scope="row">{{ loop.index }}</th>
				<td>{{ users.email }}</td>
				<td>{{ users.fullname }}</td>
				<td>{{ users.username }}</td>
				<td>{{ users.MoetUsersRoles.name }}</td>
				<td>
					{% if users.status == 1 %}
						<font color="blue">Active</font>
					{% else %}
						<font color="red">Inactive</font>
					{% endif %}
				</td>
				<td>{{ date('Y-m-d H:i:s', users.created_at) }}</td>
				<td>
					<a href="{{ url('admin/users/update') }}?id={{ users.id }}">
						<i class="fa fa-edit"></i> Sửa
					</a> | 
					<a href="#" data-href="{{ url('admin/users/delete') }}?id={{ users.id }}" data-toggle="modal" data-target="#delete-confirm" id="btn-delete">
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
