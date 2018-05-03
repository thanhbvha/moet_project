<div class="col-md-12">
	<div class="row justify-content-end">
		<div class="col-md-3 text-right">
			<a href="{{ url('topic/form') }}" class="btn btn-info btn-sm">
				<i class="fa fa-plus-square"></i> Đăng ký đề tài nghiên cứu
			</a>
		</div>
		<div class="col-md-2 text-right">
			<a href="{{ url('topic/export') }}" class="btn btn-primary btn-sm">
				<i class="fa fa-download"></i> Export
			</a>
		</div>
	</div>
</div>

<div class="col-md-12" id='data-table' style="margin-top: 15px;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Lĩnh vực</th>
				<th scope="col">Chuyên ngành</th>
				<th scope="col">Mã đề tài</th>
				<th scope="col">Đề tài</th>
				<th scope="col">Đơn vị</th>
				<th scope="col">Sinh viên</th>
				<th scope="col">Người hướng dẫn</th>
				<th scope="col">Ngày tạo</th>
			</tr>
		</thead>
		<tbody>
			{% for index,topic in topics.items %}
			<tr>
				<th scope="row">{{ loop.index }}</th>
				<td>{{ topic.MoetFields.name }}</td>
				<td>{{ topic.MoetUnitsSpecialize.name }}</td>
				<td>{{ topic.name }}</td>
				<td>{{ topic.code }}</td>
				<td>{{ topic.MoetUnits.name }}</td>
				<?php
					$student_info = json_decode($topic->student_info);
				?>
				<td>{{ student_info.student }}</td>
				<td>{{ topic.instructor }}</td>
				<td>{{ date('Y-m-d H:i:s', topic.created_at) }}</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>

	{% if topics.total_pages > 1 %}
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-end">
			<li class="page-item">
				<a class="page-link" href="{{ url('topic') }}?page={{ topics.before }}">
					Trước
				</a>
			</li>
			{% for page_index,page_num in topics.page_ranger %}
				{% if page_num['next']===false %}
				<li class="page-item active">
					<a class="page-link">
				{% else %}
				<li class="page-item">
					<a class="page-link" href="{{ url('topic') }}?page={{ page_num['page'] }}">
				{% endif %}
						{{ page_num['page'] }}
					</a>
				</li>
			{% endfor %}
			<li class="page-item">
				<a class="page-link" href="{{ url('topic') }}?page={{ topics.next }}">
					Sau
				</a>
			</li>
		</ul>
	</nav>
	{% endif %}
</div>