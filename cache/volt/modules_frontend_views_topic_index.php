<div class="col-md-12">
	<div class="row justify-content-end">
		<div class="col-md-3 text-right">
			<a href="<?= $this->url->get('topic/form') ?>" class="btn btn-info btn-sm">
				<i class="fa fa-plus-square"></i> Đăng ký đề tài nghiên cứu
			</a>
		</div>
		<div class="col-md-2 text-right">
			<a href="<?= $this->url->get('topic/export') ?>" class="btn btn-primary btn-sm">
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
			<?php $v151416084240554120031iterator = $topics->items; $v151416084240554120031incr = 0; $v151416084240554120031loop = new stdClass(); $v151416084240554120031loop->self = &$v151416084240554120031loop; $v151416084240554120031loop->length = count($v151416084240554120031iterator); $v151416084240554120031loop->index = 1; $v151416084240554120031loop->index0 = 1; $v151416084240554120031loop->revindex = $v151416084240554120031loop->length; $v151416084240554120031loop->revindex0 = $v151416084240554120031loop->length - 1; ?><?php foreach ($v151416084240554120031iterator as $index => $topic) { ?><?php $v151416084240554120031loop->first = ($v151416084240554120031incr == 0); $v151416084240554120031loop->index = $v151416084240554120031incr + 1; $v151416084240554120031loop->index0 = $v151416084240554120031incr; $v151416084240554120031loop->revindex = $v151416084240554120031loop->length - $v151416084240554120031incr; $v151416084240554120031loop->revindex0 = $v151416084240554120031loop->length - ($v151416084240554120031incr + 1); $v151416084240554120031loop->last = ($v151416084240554120031incr == ($v151416084240554120031loop->length - 1)); ?>
			<tr>
				<th scope="row"><?= $v151416084240554120031loop->index ?></th>
				<td><?= $topic->MoetFields->name ?></td>
				<td><?= $topic->MoetUnitsSpecialize->name ?></td>
				<td><?= $topic->name ?></td>
				<td><?= $topic->code ?></td>
				<td><?= $topic->MoetUnits->name ?></td>
				<?php
					$student_info = json_decode($topic->student_info);
				?>
				<td><?= $student_info->student ?></td>
				<td><?= $topic->instructor ?></td>
				<td><?= date('Y-m-d H:i:s', $topic->created_at) ?></td>
			</tr>
			<?php $v151416084240554120031incr++; } ?>
		</tbody>
	</table>

	<?php if ($topics->total_pages > 1) { ?>
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-end">
			<li class="page-item">
				<a class="page-link" href="<?= $this->url->get('topic') ?>?page=<?= $topics->before ?>">
					Trước
				</a>
			</li>
			<?php $v151416084240554120031iterator = $topics->page_ranger; $v151416084240554120031incr = 0; $v151416084240554120031loop = new stdClass(); $v151416084240554120031loop->self = &$v151416084240554120031loop; $v151416084240554120031loop->length = count($v151416084240554120031iterator); $v151416084240554120031loop->index = 1; $v151416084240554120031loop->index0 = 1; $v151416084240554120031loop->revindex = $v151416084240554120031loop->length; $v151416084240554120031loop->revindex0 = $v151416084240554120031loop->length - 1; ?><?php foreach ($v151416084240554120031iterator as $page_index => $page_num) { ?><?php $v151416084240554120031loop->first = ($v151416084240554120031incr == 0); $v151416084240554120031loop->index = $v151416084240554120031incr + 1; $v151416084240554120031loop->index0 = $v151416084240554120031incr; $v151416084240554120031loop->revindex = $v151416084240554120031loop->length - $v151416084240554120031incr; $v151416084240554120031loop->revindex0 = $v151416084240554120031loop->length - ($v151416084240554120031incr + 1); $v151416084240554120031loop->last = ($v151416084240554120031incr == ($v151416084240554120031loop->length - 1)); ?>
				<?php if ($page_num['next'] === false) { ?>
				<li class="page-item active">
					<a class="page-link">
				<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="<?= $this->url->get('topic') ?>?page=<?= $page_num['page'] ?>">
				<?php } ?>
						<?= $page_num['page'] ?>
					</a>
				</li>
			<?php $v151416084240554120031incr++; } ?>
			<li class="page-item">
				<a class="page-link" href="<?= $this->url->get('topic') ?>?page=<?= $topics->next ?>">
					Sau
				</a>
			</li>
		</ul>
	</nav>
	<?php } ?>
</div>