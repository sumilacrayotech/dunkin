var base_url=$('#base_url').val();
$( document ).ready(function()
{
    ///$("#txtDefaultHtmlArea").htmlarea();
});
$(function() {
    var scntDiv = $('#p_specs_tag');
    var i = $('#p_specs_tag span').size() + 1;

    $('#addTag').live('click', function() {
        //$('<p><input class="form-control" id="lable3" placeholder="Label" style="float: left; width: 347px;" name="speci[specification_name][]" type="text" /><input class="form-control" id="value3" placeholder="Value" style="float: left; position: relative; left: 9px; width: 352px;" name="speci[specification_value][]" type="text" /><button type="button" id="remScnt" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button><div style="clear: both; height: 11px;"></div></p>').appendTo(scntDiv);
        $('<span><div class="form-group"><div class="col-sm-10"><div class="input-group input-group-sm" style="width: 450px;"><div class="custom-in-wrap" ><input  class="form-control" type="text" name="speci[tag_name][]" style="float: left; position: relative;left: 0px;width: 352px "><button type="button" class="btn btn-info btn-danger"  style="float: left; margin-left: 19px;" id="remScntTag">Remove</button></div></span></div></div></div></span>').appendTo(scntDiv);
        i++;
        return false;
    });

    $('#remScntTag').live('click', function() {
        if( i > 1 ) {
            $(this).parents('span').remove();
            i--;
        }
        return false;
    });
});
$( document ).ready(function() {
        var vali= $("#add_category").validate
        ({
            submitHandler: function(form) 
            {
                var formData = new FormData(form);
                for ( instance in CKEDITOR.instances )
                    CKEDITOR.instances[instance].updateElement();

                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:base_url+'catalog/add_categories',
                    //data:$("#add_category input,#add_category select,#add_category textarea").serialize(),//only input
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = base_url+'catalog/category';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }      
                });
            }
        });
});

$( document ).ready(function() {
        var vali= $("#edit_category").validate
        ({
            submitHandler: function(form) 
            {
                var formData = new FormData(form);
                for ( instance in CKEDITOR.instances )
                    CKEDITOR.instances[instance].updateElement();

                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:base_url+'catalog/editcategory',
                    //data:$("#edit_category input,#edit_category select,#edit_category textarea").serialize(),//only input
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = base_url+'catalog/category';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }      
                });
            }
        });
});

$( "#url" ).keyup(function() {
 var str = $('#url').val();
 str = str.replace(/[^a-z0-9]+/ig,"-").toLowerCase();
 $('#url').val(str)
});

 $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><input class="span9" id="lable3" style="float: left; width: 539px;" name="service[services][]" type="text" /><button type="button" id="remScnt" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 1 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
    });
$( "#url_key1" ).keyup(function() {
    var str = $('#url_key1').val();
    str = str.replace(/[^a-z0-9]+/ig,"-").toLowerCase();
    $('#url_key1').val(str)
});

 var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
function ajax_form_action(form_id,action,message_id,repage)
{
    $(document).ready(function (e) 
    {
   	    $("#"+form_id).on('submit',(function(e) 
           {
         		e.preventDefault();                                                         
                   $("#"+message_id).empty(); 
                   $('#qLbar').show(); 
          		   $.ajax
                    ({
                         url:action,  	
    			         type: 'POST',      				
     		       	     data:  new FormData(this), 		
    			         contentType: false,       		
                         cache: false,					
    			         processData:false,  			
    			         success: function(data) 
                         {
        			        $('#qLbar').hide();
                            if(data.trim()=='r')
                            {
                                window.location=repage;
                            }
                            else
                            {
                                $("#"+message_id).html(data);
                            }			
     		             }	        
                    });                                                
      	    }));
    });
}
ajax_form_action('add_services','cms/add_services','message','../cms/service');
ajax_form_action('edit_ceiling','cms/edit_ceiling','edit_ceiling_message','../cms/service');