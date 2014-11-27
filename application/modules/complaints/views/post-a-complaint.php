<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CMS Complaints</title>
	<script type="text/javascript" src="../../assets/themes/site/js/libraries/jquery.1.10.2.min.js"></script>
	<script type="text/javascript" src="../../assets/themes/site/js/libraries/jquery.ui.1.10.4.min.js"></script>
	
</head>
<body>
<form id="complaints_form" name="complaints_form_name" action="" method="POST">
<div id="container">
	<h1>Complaint Form</h1>
	<div class="">
	<?php 
		$this->load->helper('form');
		echo form_label('Email','','');
		$data = array(
              'name'        => 'email',
              'id'          => 'e_mail',
              'maxlength'   => '50',
			  'placeholder' => 'Enter User Name',
              'size'        => '50',
              'style'       => 'width:50%',
            );

		echo form_input($data);
		?>
	</div>
	<div class="">
		<?php 
		echo form_label('Location','','');
		$data = array(
              'name'        => 'location',
              'id'          => 'location',
              'placeholder' => 'Enter location',
			  'maxlength'   => '50',
			  'style'       => 'width:50%',

            );
		echo form_input($data);
		?>
	</div>
	<div class="">
		<?php 
		echo form_label('catogiry','','');
		$data = array(
              'name'        => 'catagory',
              'id'          => 'category',
              'placeholder' => 'Enter catogiry',
             'maxlength'   => '50',
			 'style'       => 'width:50%',
            );
		echo form_input($data);
		?>
	</div>
	<div class="">
		<?php 
		echo form_label('complaint','','');
		$desc_attributes = array(
                                        'id' => 'complaint_description',
                                        'name' => 'complaint_description',
                                        'class' => 'normal validate',
                                        'placeholder' => 'Describe your complaint',
                                        'valid-name' => 'description',
                                        'maxlength' => 50000,
                                        'minlength' => 5,
                                        'rows' => 4,
                                        'style' => 'height: 105px;',
										'maxlength'   => '50'
                                        
                                    );
                                    echo form_textarea($desc_attributes);
		?>
	</div>
	<div class="">
		<?php 
		    echo form_hidden('userid','1');
		?>
	</div>
	
	<div class="">
		<?php 
	
		$data = array(
              'name'        => 'submit',
              'id'          => 'submit',
              'value'  		=> 'Post Complaint',
			  
            );
		echo form_submit($data);
		?>
	</div>
</div>
</form>			
</body>
<script>
$(document).ready(function(){
	$("#complaints_form").submit(function(e){
		e.preventDefault();
		var postdata = $( "#complaints_form" ).serialize();
		//alert(postdata);
		$.ajax({
		     type: "POST",
		     url:"complaint/post_complaint",
		     data: postdata,
		     success: function(msg){
		      			alert( "Data Saved: " + msg );
		        	},
		     error: function(jqXHR, textStatus, errorThrown){ 
		     			 alert(textStatus + " " + errorThrown);
		       		}
		});
	});
	
	$("#e_mail").autocomplete({
	    source: function(request, response) {
		    
	        $.ajax({
	            url: "complaint/getEmailsList",
	            data: {
	            	email: request.term
	            },
	            type: "POST",
	            dataType: "json",
	            success: function(data) {
		            if (data !== '') {
	                    //console.log(data);
	                    response($.map(data, function(item) {
	                        return {
	                            value: item.label,
	                            text: item.label,
								custVal: item.value
	                        };
	                    }));
	                }

	            },
	            error: function(XMLHttpRequest, textStatus, errorThrown) {
	                // alert('@T("Alert.Symbol.Msg")');
	            }
	        });
	    }
	    
	});
});

</script>
</html>