<?php $this->load->view('site/common/header');	?>
		<?php
        if($this->uri->segment(2)=="join"){
        $content='';
		
		$content=html_entity_decode($content1->row()->content);
		$content=str_replace('{$application_fee}',$application_fee,$content);
		$content=str_replace('{$branch}',$branch,$content);
		$content=str_replace('{$additional_person}',$additional_person,$content);
		
		echo $content;
		}
		else{
			echo html_entity_decode($content1->row()->content);
		}?>

		
	<script>
	$(document).ready(function(){
		var total_height=($(window).height());
	var tot=($('footer').height())+($('header').height());
	var main=total_height-tot; 
	$('.service_detail_inner').prop('style','min-height:'+main+'px !important');
	});

</script>
<?php $this->load->view('site/common/footer');?>