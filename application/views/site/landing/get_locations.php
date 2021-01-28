<?php
if($locations->num_rows()>0){ foreach($locations->result() as $iata){?>
<li>
<div class="custom_check not_applicaple_base">

	<label class="control control--checkbox">

		<input type="checkbox" name="locations[]" location_name="<?php echo $iata->short_code;?>" value="<?php echo $iata->id;?>" class="select_port">

		 <?php echo $iata->short_code;?> (<?php echo $iata->code;?>)		

		<div class="control__indicator"></div>

	</label>

</div>

</li>
<?php }} ?>