var base_url=$('#base_url').val();
$( document ).ready(function() {
        var vali= $("#add_attribute").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'attribut/add_attribut',
                    data:$("#add_attribute input,#add_attribute select,#add_attribute textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../attribut';
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
function valide_code()
{
    var str = $('#attribute_code').val();
    strori = str.replace(/\s+/g, '_').toLowerCase();
    $('#attribute_code').val(strori);
}
function unique_code(code)
{
    var url=base_url+'attribut/check_code'
    $.ajax({
        type    : 'POST',
        url     : url,
        data    : 'code='+code,
        success : function(data)
                {
                    if(data!=0)
                    {
                        $('#code_error').html('The Attribute Code Already Exists');
                    }
                    else
                    {
                        $('#code_error').html('');
                    }
                }
    });
}
 $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents div').size() + 1;
        
        $('#addOpt').live('click', function() {
                $('<div id="rem"><input class="form-control" id="lable3" placeholder="Value" style="float: left; width: 32%;" name="option[option_value][]" type="text" /><input class="form-control" id="value3" placeholder="Position" style="float: left; position: relative; left: 9px; width: 32%;" name="option[option_position][]" type="text" /><button type="button" id="remScnt" class="btn btn-danger" style="float: left; margin-left: 19px;">Remove</button><div style="clear: both; height: 11px;"></div></div>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 1 ) {
                        $(this).parents('#rem').remove();
                        i--;
                }
                return false;
        });
    });
 function options_li()
 {
   var option_val= $( "#option_val" ).val();
   if(option_val=='dropdown' || option_val=='mutipleselect')
   {
     $('#opt').show();
   }
   else
   {
     /*$('#opt').hide();
     $('#p_scents div').remove(); */
   }
 }
$( document ).ready(function() {
    var option_val= $( "#option_val" ).val();
   if(option_val=='5' || option_val=='6')
   {
     $('#opt').show();
   }
   else
   {
    // $('#opt').hide();
     //$('#p_scents div').remove();
   }
});
$( document ).ready(function() {
        var vali= $("#edit_attribute").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'attribut/edit_attribute',
                    data:$("#edit_attribute input,#edit_attribute select,#edit_attribute textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../list_attribute';
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
window.onload=function(){
$(document).ready(function () {
	$('.container .draggable-list').sortable({
	connectWith: '.container .draggable-list'
	});
});
}//]]> 
function save_attributeset()
{
        var attribute_name=$('#attr_name').val();
        var attributes=[];
        i = 0;
        $('#assigned_attributes').find('input:hidden')
            .each(function() {
                attributes[i++]=$(this).val();
            });
        if(attributes.length!=0) {
            $.ajax({
                type: 'POST',
                url: 'attribut/add_attribut_set',
                data: {'attributes': attributes,'attribute_name':attribute_name},
                success: function (data) {

                }
            });
        }
}
    
$( document ).ready(function() {
        var vali= $("#add_attribute_set").validate
        ({
            submitHandler: function(form) 
            {
                $("#message").empty();
                $('#qLbar').show();

                $.ajax({
                    type: "POST",
                    url: base_url+ 'attribut/add_attribut_set',
                    data: $("#add_attribute_set").serialize(),
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = base_url+ 'attribut/attribut_set';

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
    var vali= $("#edit_attribute_set").validate
    ({
        submitHandler: function(form)
        {
            $("#message").empty();
            $('#qLbar').show();
            $.ajax({
                type: "POST",
                url: base_url+ 'attribut/edit_attribute_set',
                data: $("#edit_attribute_set").serialize(),
                success: function(response)
                {
                    $('#qLbar').hide();
                    $("#message").html();
                    var repage = base_url+ 'attribut/attribut_set';

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
function specific_categories()
{
    var search_categories = $('#search_categories').val();
    if(search_categories=='specific')
    {
        $('#categories').show('slow');
    }
    else
    {
        $('#categories').hide('slow');
    }
}