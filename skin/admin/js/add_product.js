$( document ).ready(function() 
{
    //$("#txtDefaultHtmlArea1").htmlarea();
});
$(function() {
    var scntDiv = $('#p_specs');
    var i = $('#p_specs span').size() + 1;

    $('#addSpecs').on('click', function() {
        $('<span id="specific_pro'+i+'"><input class="form-control" id="lable3" placeholder="Label" style="float: left; width: 347px;" name="speci[specification_name][]" type="text" /><input class="form-control" id="value3" placeholder="Value" style="float: left; position: relative; left: 9px; width: 352px;" name="speci[specification_value][]" type="text" /><button type="button" id="remScnt" onclick="removeInput('+i+')" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button><div style="clear: both; height: 11px;"></div></span>').appendTo(scntDiv);
        i++;
        return false;
    });
});

function removeInput(i) {
    var elementId = '#specific_pro'+i;
    $(elementId).remove();
}

$( "#url_key" ).keyup(function() {
    var str = $('#url_key').val();
    str = str.replace(/[^a-z0-9]+/ig,"-").toLowerCase();
    $('#url_key').val(str)
});

$( "#product_name" ).keyup(function() {
    var str = $('#product_name').val();
    str = str.replace(/[^a-z0-9]+/ig,"-").toLowerCase();
    $('#url_key').val(str)
});

$( "#product_name1" ).blur(function() {
    var str = $('#product_name1').val();
    str = str.replace(/[^a-z0-9]+/ig,"-").toLowerCase();
    $('#url_key1').val(str)
});

function randomString(length) {
    return Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, length))).toString(36).slice(1);
}
function gen_url(url_key)
{
    var rand_value = randomString(3);
    var ori_url = url_key+'-'+rand_value;
    
    var r = confirm('Would you like to get this auto generated Url Key('+ori_url+')?');
    if (r == true) 
    {
        $('#url_key').val(ori_url);
        $('.msg').html('<div style="color: green; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">Your product url is set as "'+ori_url+'".</div>');
    } 
    else 
    {
        $('.msg').html('<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">The "URL KEY" already Exists.Please Provide unique URL Key</div>');
    }
}

function get_attributes(id)
{
    $.ajax({
        type    : 'POST',
        url     : base_url+'products/get_attributes',
        data    : 'category_id='+id,
        success : function(data)
        {
            $('#cat-main-tab').show();
            if(data=='') {
                $('#attribute_tag').html('No attributes found for this set');
            } else {
                $('#attribute_tag').html(data);
            }

        }
    });
}

function get_ConfigAttributes(selectObj)
{
    var selectIndex=selectObj.selectedIndex;
    var selectValue=selectObj.options[selectIndex].value;
    window.location.replace(base_url+'products/add_product/'+selectValue+'/option/');
}

$( document ).ready(function() {
    $("#edit_product").validate({
        submitHandler: function(form)
        {
            for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();

            var formData = new FormData(form);

            $("#message").empty();
            $('#qLbar').show();
            $.ajax({
                type:"POST",
                url:base_url+'products/edit_product',
                data: formData,
                //data:$("#edit_product input,#edit_product select,#edit_product textarea").serialize(),
                cache: false,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    $('#qLbar').hide();
                    $("#message").html();
                    var repage = base_url+'products';
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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#main_config_preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#main_config").change(function() {
    readURL(this);
    $('#main_config_preview').show();
});


function readURLMain(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#main_preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#image").change(function() {
    readURLMain(this);
    $('#main_preview').show();
});
