<?php $this->load->view('site/common/header');	?>
<?php

$user_data = $rec;
$get_post_detail = get_post_detail($user_data['post_id']);
$basic_details = (array) json_decode($user_data['basic_details']);
$language = (array) json_decode($user_data['language']);
$community_certificate = (array) json_decode($user_data['community_certificate']);
$community_certificate = (array) json_decode($user_data['community_certificate']);
$permanent_address = (array) json_decode($user_data['permanent_address']);
$communication_address = (array) json_decode($user_data['communication_address']);

?>
<section>

	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-base">

		<div class="container nopadd">
<button type="submit" class="themebtn" id="find_application_bt">Print</button>
</br>	
</br>	
</br>	
<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 membership-inner nopadd">
			

<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row" colspan="4">
                <h3>Personal details</h3>
            </th>
        </tr>
        <tr>
            <th scope="row">Payment Reference</th>
            <td>STSD1234545</td>
            <th scope="row">Applying for the post of*</th>
            <td><?php echo $get_post_detail->post_name; ?></td>
        </tr>

        <tr>
            <th scope="row">Full Name</th>
            <td><?php echo $user_data['name'] . " " . $basic_details['initial']; ?></td>
            <th scope="row">Gender</th>
            <td><?php echo $user_data['gender']; ?></td>

        </tr>

        <tr>
            <th scope="row">Date of Birth</th>
            <td><?php echo $user_data['dob']; ?></td>
            <th scope="row">Place of Birth</th>
            <td><?php echo $user_data['pob']; ?></td>

        </tr>
        <tr>
            <th scope="row">Age</th>
            <td><?php echo $user_data['age']; ?></td>
            <th scope="row">Marital Status</th>
            <td><?php echo $user_data['marital_status']; ?></td>
        </tr>
        <tr>
            <th scope="row">Father Name</th>
            <td><?php echo $basic_details['fname']; ?></td>
            <th scope="row">Mother Name</th>
            <td><?php echo $basic_details['mname']; ?></td>
        </tr>
        <tr>
            <th scope="row">Mobile Number</th>
            <td><?php echo $user_data['mobile']; ?></td>
            <th scope="row">Email</th>
            <td><?php echo $user_data['email']; ?></td>
        </tr>
        <tr>
            <th scope="row">Alternate Number</th>
            <td><?php echo $basic_details['alternative_number']; ?></td>
            <th scope="row">Language Known</th>
            <td><b><?php echo $language['tamil']->name . ": "; ?></b>
                <?php echo ($language['tamil']->read == "Yes") ? "Read, " : ""; ?>
                <?php echo ($language['tamil']->write == "Yes") ? "Write, " : ""; ?>
                <?php echo ($language['tamil']->speak == "Yes") ? "Speak " : ""; ?>
                </br>
                <b><?php echo $language['english']->name . ": "; ?></b>
                <?php echo ($language['english']->read == "Yes") ? "Read, " : ""; ?>
                <?php echo ($language['english']->write == "Yes") ? "Write, " : ""; ?>
                <?php echo ($language['english']->speak == "Yes") ? "Speak " : ""; ?>
            </td>
        </tr>
        <tr>
            <th scope="row">Other Language</th>
            <td><?php if ($language['other']->name != "") { ?>
                    <b><?php echo $language['other']->name . ": "; ?></b>
                    <?php echo ($language['other']->read == "Yes") ? "Read, " : ""; ?>
                    <?php echo ($language['other']->write == "Yes") ? "Write, " : ""; ?>
                    <?php echo ($language['other']->speak == "Yes") ? "Speak " : ""; ?>
                <?php  } ?></td>
            <th scope="row">Religion</th>
            <td><?php echo $user_data['religion']; ?></td>
        </tr>
        <tr>
            <th scope="row">Aadhar Number</th>
            <td><?php echo $user_data['aadhar_number']; ?></td>
            <th scope="row">Nationality</th>
            <td><?php echo $user_data['nationality']; ?></td>
        </tr>
        <tr>
            <th scope="row">Mother Tongue</th>
            <td><?php echo $user_data['mother_tongue']; ?></td>
            <th scope="row">Current District</th>
            <td><?php echo $user_data['district']; ?></td>
        </tr>
        <tr>
            <th scope="row">Native State</th>
            <td><?php echo $user_data['native_state']; ?></td>
            <th scope="row">Community</th>
            <td><?php echo $user_data['community']; ?></td>
        </tr>
        <tr>
            <th scope="row">Sub Caste</th>
            <td><?php echo $user_data['sub_caste']; ?></td>
            <th scope="row">Religion</th>
            <td><?php echo $user_data['religion']; ?></td>
        </tr>
        <tr>
            <th scope="row">Community Certificate Number</th>
            <td><?php echo $community_certificate['community_certificate_number']; ?></td>
            <th scope="row">Date Of Issue</th>
            <td><?php echo $community_certificate['date_of_issue']; ?></td>
        </tr>
        <tr>
            <th scope="row">Issuing Authority</th>
            <td><?php echo  $community_certificate['issuing_authority']; ?></td>
            <th scope="row">Are You Registered in employment office ?</th>
            <td><?php echo $user_data['employment_office_status']; ?></td>
        </tr>
        <?php if ($user_data['employment_office_status'] == "Yes") { ?>
            <tr>
                <th scope="row">Register Date</th>
                <td><?php echo  $community_certificate['date_of_issue']; ?></td>
                <th scope="row">Register Number</th>
                <td><?php echo $community_certificate['community_certificate_number']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th scope="row">Priority</th>
            <td><?php echo  $user_data['priorty_status']; ?></td>
            <th scope="row"></th>
            <td></td>
        </tr>
        <?php if ($user_data['priorty_status'] == "Yes") { ?>
            <tr>
                <th scope="row">Priority Category</th>
                <td><?php echo  $user_data['priority_category']; ?></td>
                <th scope="row">Certificate Number</th>
                <td><?php echo $user_data['cer_no']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th scope="row" colspan="4">
                <h3>Permanent Address</h3>
            </th>
        </tr>
        <tr>
            <th scope="row">Door number</th>
            <td><?php echo  $permanent_address['door_no']; ?></td>
            <th scope="row">Street</th>
            <td><?php echo $permanent_address['street']; ?></td>
        </tr>
        <tr>
            <th scope="row">State</th>
            <td><?php echo  $permanent_address['state']; ?></td>
            <th scope="row">District</th>
            <td><?php echo $permanent_address['district']; ?></td>
        </tr>
        <tr>
            <th scope="row">Taluk</th>
            <td colspan="3"><?php echo $permanent_address['taluk'][0]; ?></td>
        </tr>
        <tr>
            <th scope="row" colspan="4">
                <h3>Communication Details</h3>
            </th>
        </tr>
        <tr>
            <th scope="row">Door number</th>
            <td><?php echo  $communication_address['door_no']; ?></td>
            <th scope="row">Street</th>
            <td><?php echo $communication_address['street']; ?></td>
        </tr>
        <tr>
            <th scope="row">State</th>
            <td><?php echo  $communication_address['state']; ?></td>
            <th scope="row">District</th>
            <td><?php echo $communication_address['district']; ?></td>
        </tr>
        <tr>
            <th scope="row">Taluk</th>
            <td colspan="3"><?php echo $communication_address['taluk'][0]; ?></td>
        </tr>
        <?php
        $qualification_option = explode(",", $get_post_detail->qualification_option);
        $sslc_details = (array) json_decode($user_data['sslc_details']);
        $plustwo_details = (array) json_decode($user_data['plustwo_details']);
        $iti_details = (array) json_decode($user_data['iti_details']);
        $diploma_details = (array) json_decode($user_data['diploma_details']);
        $ug_details = (array) json_decode($user_data['ug_details']);
        $pg_details = (array) json_decode($user_data['pg_details']);
        $typewriting = (array) json_decode($user_data['typewriting']);
        $Shorthand = (array) json_decode($user_data['Shorthand']);
        $others_details = (array) json_decode($user_data['others_details']);
        $other1 = (array) json_decode($others_details['other1']);
        $other2 = (array) json_decode($others_details['other2']);
        $other3 = (array) json_decode($others_details['other3']);


        ?>
        <?php if (in_array("1", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>SSLC Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $sslc_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $sslc_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $sslc_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $sslc_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $sslc_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $sslc_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $sslc_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $sslc_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("2", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>+2 Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $plustwo_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $plustwo_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $plustwo_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $plustwo_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $plustwo_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $plustwo_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $plustwo_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $plustwo_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("3", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>ITI Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $iti_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $iti_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $iti_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $iti_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $iti_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $iti_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $iti_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $iti_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("4", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Diploma Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $diploma_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $diploma_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $diploma_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $diploma_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $diploma_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $diploma_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $diploma_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $diploma_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("5", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>UG Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $ug_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $ug_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $ug_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $ug_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $ug_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $ug_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $ug_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $ug_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("6", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>PG Degree Details</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $pg_details['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $pg_details['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $pg_details['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $pg_details['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $pg_details['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $pg_details['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $pg_details['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $pg_details['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("7", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Typewriting</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $typewriting['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $typewriting['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $typewriting['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $typewriting['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $typewriting['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $typewriting['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $typewriting['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $typewriting['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("8", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Shorthand</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $shorthand['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $shorthand['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $shorthand['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $shorthand['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $shorthand['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $shorthand['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $shorthand['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $shorthand['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("9", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Other1</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $other1['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $other1['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $other1['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $other1['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $other1['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $other1['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $other1['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $other1['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("10", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Other2</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $other2['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $other2['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $other2['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $other2['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $other2['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $other2['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $other2['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $other2['mark_secured']; ?></td>
            </tr>
        <?php } ?>
        <?php if (in_array("11", $qualification_option)) { ?>
            <tr>
                <th scope="row" colspan="4">
                    <h3>Other3</h3>
                </th>
            </tr>
            <tr>
                <th scope="row">Education Qualification</th>
                <td><?php echo  $other3['qualification']; ?></td>
                <th scope="row">Percentage</th>
                <td><?php echo  $other3['percentage']; ?></td>
            </tr>
            <tr>
                <th scope="row">Grade</th>
                <td><?php echo  $other3['grade']; ?></td>
                <th scope="row">Total Marks</th>
                <td><?php echo  $other3['total_marks']; ?></td>
            </tr>
            <tr>
                <th scope="row">Year of Passing</th>
                <td><?php echo  $other3['yop']; ?></td>
                <th scope="row">Medium of instruction</th>
                <td><?php echo  $other3['medium']; ?></td>
            </tr>
            <tr>
                <th scope="row">Name and Address of Institution</th>
                <td><?php echo  $other3['ins']; ?></td>
                <th scope="row">Mark Secured</th>
                <td><?php echo  $other3['mark_secured']; ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<table class="table table-striped">
    <tbody>

        </tr>
    </tbody>
</table>
<table class="table table-striped">
    <tbody>

        </tr>
    </tbody>
</table>
			</div>

		</div>

	</div>

</section>

<?php $this->load->view('site/common/footer'); ?>




