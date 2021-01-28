<div class="col-xs-12 co-lg-12 col-md-12 col-sm-12" style="min-height:500px;">
	<form id="find_application_new" name="find_application_new" >
		<input type="hidden" name="mobile" id="mobile" />
		<input type="hidden" name="email" id="email" />
		<input type="hidden" name="aadhar_number" id="aadhar_number" />
	</form>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">S.No</th>
		  <th scope="col">Aplication Id</th>
		  <th scope="col">Applicant Name</th>
		  <th scope="col">Position </th>
		  <th scope="col">Date</th>
		  <th scope="col">Action</th>
		</tr>
	  </thead>
	  <tbody>
		<?php $i=1; foreach($rec as $recss): ?>
			<tr>
			  <th scope="row"><?php echo $i; ?></th>
			  <td><?php echo "AAVLR-".str_pad($recss->id, 5, '0', STR_PAD_LEFT); ?></td>
			  <td> <?php echo $recss->name; ?></td>
			  <td><?php echo get_post_detail($recss->post_id)->post_name; ?>
			  </td>
			  <td class="nowrap"><?php
				$date=date_create($recss->create_date);
				echo date_format($date,"d/m/Y"); ?></td>
			  <td class="nowrap"><a href="#0"  class="btn btn-success bt_find_application_new" data-id="<?php echo $recss->id; ?>" >View Application</a></td>
			</tr>
		<?php $i++; endforeach; ?>
	  </tbody>
	</table>
</div>