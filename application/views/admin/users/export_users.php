<?php 
$data = '';
$title = '<table>
	<tr>
    	<td colspan="2" align="right">Date :</td>
		<td colspan="2" align="left">'. date('Y-m-d'). '</td>
		<td colspan="3" align="right">Title :</td>
        <td colspan="3" align="left">'.$this->config->item('site_name').' Details</td>
        
	</tr>
	<tr>
    	<td colspan="11">&nbsp;</td>
	</tr>
	</table>';	

$header = $title.'<table border="1"><tr>';

$field_count = (array) $users_detail[0];
$field_count=count($field_count);
 foreach ($users_detail[0] as $table_field=>$field_value)
    {
 $field_count--;
  if($table_field=="id"){
	   $header .= '<th>Sno</th>';
  }else{
  $header .= '<th>'.ucfirst($table_field).'</th>';
  }
 if($field_count==0)
 {
 $header .= '</tr>';
 }
    } $i=1; 
 foreach ($users_detail as $field_name=>$field_values)
		{
		$data .= '<tr>';
		foreach ($field_values as $field=>$field_value)
		{ 
		  if($field=="id"){
			   $data .= '<td style="text-align:left">'.$i.'</td>';
		  }else{
		  $field_value=$field=="status"?($field_value=="1"?"Active":"InActive"):$field_value;
		  $data .= '<td style="text-align:left">'.$field_value.'</td>';
		  }
        }
		$data .='</tr>';
		$i++;
       } 
		$data =$header.$data;
		
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=users_list.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$data";
?>