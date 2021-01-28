<?php if($users_list->num_rows()>0){ foreach($users_list->result() as $user){?>
 <tr><td><?php echo $user->email; ?></td><td><a href="javascript:void(0);" class="btn btn-success editaccount_btn" data-id="<?php echo $user->id;?>"  data-email="<?php echo $user->email;?>">Edit</a><a href="javascript:void(0);" class="btn btn-danger deleteaccount_btn"  data-id="<?php echo $user->id;?>" data-email="<?php echo $user->email;?>">Delete</a> </td></tr>
<?php }} else{ ?>
 <tr><td colspan="2">No Users found...</td></tr>
 <?php } ?>