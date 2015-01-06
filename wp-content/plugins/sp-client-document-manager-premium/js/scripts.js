// JavaScript Document

function sp_cdm_publish_doc(id){
	var data = {
			'action': 'sp_cdm_publish_draft',
			'fid': id,
		};

	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post(cdm_scripts.ajax_url, data, function(response) {
		alert(response);
		cdmCloseModal('file');
		sp_cdm_load_project(0);
	});
}
function cdm_print_div(div,name){

jQuery(div).printElement({pageTitle: name});	
	
}


function sp_cu_dialog_premium_thanks(){
	
	jQuery('#sp_cu_thankyou' ).dialog();	
	
}
function sp_cu_dialog_premium(){
	
	var selected_val = jQuery('#cdm_current_folder').val();
	jQuery('.pid_select option[value="'+selected_val+'"]').attr("selected", "selected");
	jQuery('.uploadifive-button-go').html('<a href="javascript:cdmPremiumValidate();">'+ cdm_scripts.upload_button+ '</a>');
	jQuery('#cdm_upload_premium_form')[0].reset();
//jQuery("#cdm_uploader_premium").uploadify("destroy");
			
			//jQuery('[data-remodal-id=cdm_uploader_premium_document_upload]').remodal();
		
		var inst = jQuery.remodal.lookup[jQuery('[data-remodal-id=premium-upload]').data('remodal')];
		inst.open();
			
}




function cdm_ajax_load_clients(div){
	
	jQuery.ajax({					
				type: "POST",
				url: ajaxurl,
				data: {'action': 'cdm_ajax_load_clients'},		
				success: function (msg) { 
					
					jQuery(div).html(msg);
				}
		
			});	
	
}


jQuery( document ).ready(function($) {
	
	
	

	
	
	
	
	// User: Filter Group
		$( document ).on( "click", ".sp-cdm-load-your-files", function() {
					$.removeCookie('pid'); // => true
					$.removeCookie('cdm_group_id'); // => true
					$.removeCookie('cdm_client_id'); // => true
					$('.sp-cdm-load-client-group-files').removeClass('selected_group');
					$('.sp-cdm-load-client-files').removeClass('selected_group');
					
					cdm_ajax_search();
		
		return false;
		});
	
		// User: Filter Group
		$( document ).on( "click", ".sp-cdm-load-client-files", function() {
					$.removeCookie('pid'); // => true
					$.removeCookie('cdm_group_id'); // => true
					$.cookie('cdm_client_id', $(this).attr('data-id'), { expires: 7, path: '/' });
					$('.sp-cdm-load-client-files').removeClass('selected_group');
					$('.sp-cdm-load-client-group-files').removeClass('selected_group');
					$(this).addClass('selected_group');
				
					cdm_ajax_search();
		
		return false;
		});
	
	
	
		// add client	
		$( document ).on( "submit", ".sp_cu_client_form", function() {
	
			$.ajax({					
				type: "POST",
				url: ajaxurl,
				data: $('.sp_cu_client_form').serialize(),		
				success: function (msg) { 
					var obj = $.parseJSON(msg);
					if(obj.error != ''){
					alert(obj.error);
					}else{
					window.location = 'admin.php?page=sp-client-document-manager-clients&function=edit&id=' + obj.id;
					}
				}
		
			});		
		
		return false;
		});
	
	// add client User	
		$( document ).on( "submit", ".cdm_ajax_add_client_user", function() {
	
			$.ajax({					
				type: "POST",
				url: ajaxurl,
				data: $('.cdm_ajax_add_client_user').serialize(),		
				success: function (msg) { 
					var obj = $.parseJSON(msg);
				if(obj.error != ''){
					alert(obj.error);
					}else{
				window.location = 'admin.php?page=sp-client-document-manager-clients&function=edit&id=' + obj.gid;
					}
				}
		
			});		
		
		return false;
		});
		// delete client user
		$( document ).on( "click", ".cdm_ajax_delete_client_user", function() {
				
			$.ajax({					
				type: "POST",
				url: ajaxurl,
				data: {'action' : 'cdm_ajax_delete_client_user','id' : jQuery(this).attr('data-id')},		
				success: function (msg) { 
					var obj = $.parseJSON(msg);
					if(obj.error != ''){
					alert(obj.error);
					}else{
					window.location = 'admin.php?page=sp-client-document-manager-clients&function=edit&id=' + obj.id;
					}
				}
		
			});		
		
		return false;
		});
		
	
		
		
		//Remove Group
		$( document ).on( "click", ".cdm_ajax_delete_client", function() {		
			
			var r = confirm("Are you sure you want to delete this Client? This will also remove all groups and remove connections with users.");
			if (r == true) {			
			
			$.ajax({					
				type: "POST",
				url: ajaxurl,
				data: {'action': 'cdm_ajax_delete_client','id': $(this).attr('data-id')},		
				success: function (msg) { 
					var obj = $.parseJSON(msg);
					if(obj.error != ''){
					alert(obj.error);
					}else{
					
					cdm_ajax_load_clients("#sp_cdm_clients_list");
					
					
					}
				}
		
			});	
			}
		
		return false;
		});
		
		
		
		
	
	
});