function active_custom()
{
$('#ccode').show();
document.getElementById("how").readOnly = true;
$('#how').val(1);
}
function active_dynamic()
{
$('#howm').show();
$('#ccode').hide();
document.getElementById("how").readOnly = false;
}
function amount_active()
{
$('#percent').hide();
$('#amnt').show();
}
function pers_active()
{
$('#percent').show();
$('#amnt').hide();
}
$( document ).ready(function() {
    $('#datepairExample .time').timepicker({
    'showDuration': true,
    'timeFormat': 'g:ia'
    });
    $('#start_date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true
    });
    $('#end_date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true
    });
});
$( document ).ready(function() {
        var vali= $("#add_coupon").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'gift_management/make_gift_code',
                    data:$("#add_coupon input,#add_coupon select,#add_coupon textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../gift_management';
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
        var vali= $("#add_admin_review").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'reviews/addadminreview',
                    data:$("#add_admin_review input,#add_admin_review select,#add_admin_review textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../reviews';
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
        var vali= $("#edit_admin_review").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'reviews/edit_reviews',
                    data:$("#edit_admin_review input,#edit_admin_review select,#edit_admin_review textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../reviews';
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