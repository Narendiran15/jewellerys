<?php $this->load->view('admin/common/header.php'); ?>
<?php $this->load->view('admin/common/sidebar.php'); ?>
<div class="content-wrapper">

  <!--breadcrumbs-->
  <section class="content-header">

    <h1><?php echo $heading; ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>admin/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active">Post</li>
      <li class="active"><?php echo $heading; ?></li>
    </ol>
  </section>
  <!--End-breadcrumbs-->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!--<div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading; ?></h3>
            </div>-->
          <form enctype="multipart/form-data" data-user-id="<?php if (!empty($service)) {
                                                              echo $service->id;
                                                            } ?>" id="city_register<?php if (!empty($service)) {
                                                                                      echo "_edit";
                                                                                    } ?>" class="" action="<?php echo base_url(); ?>admin/post/add_edit_post_insert/<?php if (!empty($service)) {
                                                                                                                                                                                                                          echo $service->id;
                                                                                                                                                                                                                        } ?>" method="post" novalidate="novalidate">
            <div class="box-body">
              <div class="form-group">
                <label for="">Vacency Post Name</label>
                <input type="text" value="<?php if (!empty($service)) {
                                            echo $service->post_name;
                                          } ?>" name="post_name" class="form-control required input_width" title="Please enter country name">
              </div>

            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="">Start Date</label>
                <input type="datetime-local" value="<?php if (!empty($service)) {
                                                      $start_date_date = $service->start_date; //sql timestamp
                                                      $start_date_date = strtotime($start_date_date);
                                                      echo  date('Y-m-d\TH:i', $start_date_date);
                                                    } ?>" name="start_date" class="form-control required input_width" title="Please enter country name">
              </div>

            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="">Last Date</label>
                <input type="datetime-local" value="<?php if (!empty($service)) {
                                                      $end_date_date = $service->end_date; //sql timestamp
                                                      $end_date_date = strtotime($end_date_date);
                                                      echo  date('Y-m-d\TH:i', $end_date_date);
                                                     } ?>" name="end_date" class="form-control required input_width" title="Please enter country name">
              </div>

            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="">Age Limit</label>
                <input type="text" value="<?php if (!empty($service)) {
                                            echo $service->age_limit;
                                          } ?>" name="age_limit" class="form-control required input_width" title="Please enter country name">
              </div>

            </div>
            <div class="box-body">
              <div class="form-group">
              <?php   
              $qualification_option_array = array();
              if (!empty($service)) {
                    $qualification_option_array = explode(",",$service->qualification_option) ;
                 } ?>
                <label for="">Qualification</label>
            
                <ul class="list-inline mt-3">
              <li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox">
												<input type="checkbox" name="qualification_option[]"  <?php echo (in_array("1", $qualification_option_array))?"checked":""; ?> value="1" class="">
												<span class="f-regular f-small f-black">SSLC</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox">
												<input type="checkbox" name="qualification_option[]"  <?php echo (in_array("2", $qualification_option_array))?"checked":""; ?> value="2" class="">
												<span class="f-regular f-small f-black">+2</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("3", $qualification_option_array))?"checked":""; ?> value="3" class="">
												<span class="f-regular f-small f-black">ITI</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("4", $qualification_option_array))?"checked":""; ?> value="4"  class="">
												<span class="f-regular f-small f-black">Diploma</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("5", $qualification_option_array))?"checked":""; ?> value="5"  class="">
												<span class="f-regular f-small f-black">UG Degree</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("6", $qualification_option_array))?"checked":""; ?> value="6"  class="">
												<span class="f-regular f-small f-black">PG Degree</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("7", $qualification_option_array))?"checked":""; ?> value="7"  class="">
												<span class="f-regular f-small f-black">Typewriting</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("8", $qualification_option_array))?"checked":""; ?> value="8"  class="">
												<span class="f-regular f-small f-black">Shorthand</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("9", $qualification_option_array))?"checked":""; ?> value="9"  class="">
												<span class="f-regular f-small f-black">Others 1</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("10", $qualification_option_array))?"checked":""; ?> value="10"  class="">
												<span class="f-regular f-small f-black">Others 2</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
									<li class="list-inline-item pr-2 mr-3">
										<div class=" custom_check mt-0">
											<label class="control control--checkbox ">
												<input type="checkbox" name="qualification_option[]" <?php echo (in_array("11", $qualification_option_array))?"checked":""; ?> value="11"  class="">
												<span class="f-regular f-small f-black">Others 3</span>
												<div class="control__indicator"></div>
											</label>
										</div>
									</li>
								</ul>
              </div>
              

            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="">Post Description if Any</label>
                <textarea name="post_description"  class="form-control required input_width" ><?php if (!empty($service)) {
                                            echo $service->post_description;
                                          } ?></textarea>
                
              </div>

            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="">Remarks if any</label>
                <textarea name="remarks"  class="form-control required input_width" ><?php if (!empty($service)) {
                                            echo $service->remarks;
                                          } ?></textarea>
              </div>

            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <div id="status"></div>
            </div>
            <div id="submitted"></div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('admin/common/footer.php'); ?>