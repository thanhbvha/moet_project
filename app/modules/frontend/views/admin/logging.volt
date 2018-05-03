<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">LOGGING</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý tài khoản
			</a>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/topic') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý đề tài
			</a>
		</div>
	</div>
</div>

<div class="col-md-12" id='data-table' style="margin-top: 15px;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">Message</th>
				<th scope="col">Người ghi</th>
				<th scope="col">Ngày ghi</th>
			</tr>
		</thead>
		<tbody>
			{% for index,log in logging %}
			<tr>
				<th scope="row">{{ loop.index }}</th>
				<td>{{ log.title }}</td>
				<td>{{ log.message }}</td>
				<td>{{ log.MoetUsers.email }}</td>
				<td>{{ date('Y-m-d H:i:s', log.created_at) }}</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
