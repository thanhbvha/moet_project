<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">QUẢN LÝ ĐỀ TÀI</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/units') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý đơn vị
			</a>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/fields') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý lĩnh vực
			</a>
		</div>
		<div class="col-md-auto text-right">
			<a href="{{ url('admin/specialize') }}" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý chuyên ngành
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
	      		<th scope="col">Hành động</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  		{% for index,topic in topics %}
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
	      		<td>
	      			<a href="{{ url('admin/topic/view') }}?id={{ topic.id }}">
						<i class="fa fa-eye"></i> Xem
					</a>
	      		</td>
	    	</tr>
	    	{% endfor %}
	    </tbody>
	</table>
</div>