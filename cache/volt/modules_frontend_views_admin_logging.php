<div class="col-md-12">
	<div class="row justify-content-between">
		<div class="col-md-auto" style="margin-bottom: 25px;">
			<h5 style="font-size: 1.25rem;">LOGGING</h5>
			<hr>
		</div>
		<div class="col-md-auto text-right">
			<a href="<?= $this->url->get('admin') ?>" class="btn btn-outline-secondary btn-sm">
				<i class="fa fa-list"></i> Quản lý tài khoản
			</a>
		</div>
		<div class="col-md-auto text-right">
			<a href="<?= $this->url->get('admin/topic') ?>" class="btn btn-outline-secondary btn-sm">
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
			<?php $v161760516035508273561iterator = $logging; $v161760516035508273561incr = 0; $v161760516035508273561loop = new stdClass(); $v161760516035508273561loop->self = &$v161760516035508273561loop; $v161760516035508273561loop->length = count($v161760516035508273561iterator); $v161760516035508273561loop->index = 1; $v161760516035508273561loop->index0 = 1; $v161760516035508273561loop->revindex = $v161760516035508273561loop->length; $v161760516035508273561loop->revindex0 = $v161760516035508273561loop->length - 1; ?><?php foreach ($v161760516035508273561iterator as $index => $log) { ?><?php $v161760516035508273561loop->first = ($v161760516035508273561incr == 0); $v161760516035508273561loop->index = $v161760516035508273561incr + 1; $v161760516035508273561loop->index0 = $v161760516035508273561incr; $v161760516035508273561loop->revindex = $v161760516035508273561loop->length - $v161760516035508273561incr; $v161760516035508273561loop->revindex0 = $v161760516035508273561loop->length - ($v161760516035508273561incr + 1); $v161760516035508273561loop->last = ($v161760516035508273561incr == ($v161760516035508273561loop->length - 1)); ?>
			<tr>
				<th scope="row"><?= $v161760516035508273561loop->index ?></th>
				<td><?= $log->title ?></td>
				<td><?= $log->message ?></td>
				<td><?= $log->MoetUsers->email ?></td>
				<td><?= date('Y-m-d H:i:s', $log->created_at) ?></td>
			</tr>
			<?php $v161760516035508273561incr++; } ?>
		</tbody>
	</table>
</div>
