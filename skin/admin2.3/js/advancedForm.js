$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });
});

$(function() {
    var scntDiv = $('#p_specs');
    var i = $('#p_specs span').size() + 1;

    $('#addSpecs').on('click', function() {
        $('<span id="sku_pro'+i+'" class="input-group" style="width: 26%;margin-top: 10px;">' +
            '<input name="sku[product_id][]" type="text" class="form-control">' +
            '<span class="input-group-addon" style="padding: 2px;">' +
            '<button type="button" class="btn btn-info btn-danger" onclick="removeInput('+i+')" style="float: left; margin-left: 4px;padding: 3px;">Remove</button>' +
            '</span>' +
            '</span>').appendTo(scntDiv);
        i++;
        return false;
    });
});

function removeInput(i) {
    var elementId = '#sku_pro'+i;
    $(elementId).remove();
}

$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
            type: "POST",
            url: "readCountry.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
        });
    });
});

function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
}

$('.add').click(function () {
    if ($(this).prev().val() < 100) {
        $(this).prev().val(+$(this).prev().val() + 1);
    }
});
$('.sub').click(function () {
    if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    }
});

function combinationCheck(selectObj,parentId,attrCode)
{
    var selectIndex=selectObj.selectedIndex;
    var selectValue=selectObj.options[selectIndex].value;
    var myKeyVals = { optionId : selectValue, parentId : parentId};
    $.ajax({
        type: 'POST',
        url: base_url+"order/getCombination",
        data: myKeyVals,
        dataType: "text",
        success: function(resultData) {
            if(resultData) {
                $('#config_options').html(resultData);
                $('.display').css('display','none');
            }
        }
    });
}

function AddressSameAs()
{
    var shipping_customer_email = $('#shipping_customer_email').val();
    var shipping_customer_name = $('#shipping_customer_name').val();
    var shipping_phone_number = $('#shipping_phone_number').val();
    var shipping_address = $('#shipping_address').val();
    var shipping_city = $('#shipping_city').val();
    var shipping_state = $('#shipping_state').val();
    var shipping_zip_code = $('#shipping_zip_code').val();
    var shipping_country = $('#shipping_country').find(":selected").val();
    if($('#address_same_as').is(':checked')) {

        $('#billing_customer_email').val(shipping_customer_email);
        $('#billing_customer_name').val(shipping_customer_name);
        $('#billing_phone_number').val(shipping_phone_number);
        $('#billing_address').val(shipping_address);
        $('#billing_city').val(shipping_city);
        $('#billing_state').val(shipping_state);
        $('#billing_zip_code').val(shipping_zip_code);
        $('#billing_country').val(shipping_country)

    }else{

        $('#billing_customer_email').val('');
        $('#billing_customer_name').val('');
        $('#billing_phone_number').val('');
        $('#billing_address').val('');
        $('#billing_city').val('');
        $('#billing_state').val('');
        $('#billing_zip_code').val('');

        $('#billing_country').val('')
    }
}

function orderTotalFromShipping(shippingId)
{
    var myKeyVals = { shippingId : shippingId};
    $.ajax({
        type: 'POST',
        url: base_url+"order/orderTotalFromShippingAmount",
        data: myKeyVals,
        dataType: "text",
        success: function(resultData) {
            $('#totals').html(resultData)
        }
    });
}

$( document ).ready(function() {
    $("#admin_place_order").validate();
});
