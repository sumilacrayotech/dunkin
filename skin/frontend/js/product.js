$( document ).ready(function() {
    $("#add_to_cart").validate({
        submitHandler: function(form) {
            $('#qty_loader').show();
            $('#add_cart_txt').text('Adding...');
            var formData = new FormData(form);
            $.ajax({
                type:"POST",
                url:base_url+'checkout/addToCart',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    $('#message').html(response.message);
                    $('#cart_count').html(response.cartItemCount);
                    $('#mini_cart_items').html(response.miniCart);
                    $('#qty_loader').hide();
                    $('#add_cart_txt').text('Added');
                    setTimeout(function(){ $('#add_cart_txt').text('Add to cart'); }, 3000);
                }
            });
        }
    });
});

$( document ).ready(function() {
    $("#save_shipping_address").validate({
        submitHandler: function(form) {
            var formData = new FormData(form);
            $.ajax({
                type:"POST",
                url:base_url+'checkout/saveShippingAddressSession',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "text",
                success: function(response) {
                    $('.adding-address-box').css('border',' 1px solid #f3f3f3');
                    $('.unSelect').hide();
                    $('#exampleModal').modal('toggle');
                    $("#add_address_shipping").html(response);

                    var selectAddressDiv = '0_select_address';
                    var selectAddressIcon = 'select_0';
                    $('#'+selectAddressDiv).css('border',' 2px solid #EB4494');
                    $('#'+selectAddressIcon).show();
                }
            });
        }
    });
});


$( document ).ready(function() {
    $("#save_billing_address").validate({
        submitHandler: function(form) {
            $('#save_billing_address_loader').show();
            var formData = new FormData(form);
            $.ajax({
                type:"POST",
                url:base_url+'checkout/saveBillingAddressSession',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    $('#save_billing_address_loader').hide();
                    if(response==1){
                        window.location.replace(base_url+'checkout/index/shippingMethods');
                    }else{
                        $('#save_billing_address_message').html(response);
                    }
                }
            });
        }
    });
});

function removeCartItem(rowId)
{
    var KeyValues = { rowId : rowId};
    $.ajax({
        type: 'POST',
        url: base_url+"checkout/removeItem",
        data: KeyValues,
        dataType: "text",
        success: function(response) {
            $('#cart_count').html(response.cartItemCount);
            $('#mini_cart_items').html(response.miniCart);
        }
    });
}


function AddressSameAs()
{
    if($('#flexCheckChecked').is(':checked')) {
        $.ajax({
            type: 'POST',
            url: base_url+"checkout/sameAsShippingAddress",
            dataType: "text",
            success: function(response) {
                $('#billing_address_data').hide();
            }
        });
    }else{
        $.ajax({
            type: 'POST',
            url: base_url+"checkout/defaultBillingAddress",
            dataType: "text",
            success: function(response) {
                $('#billing_address_data').show();
            }
        });
    }
}

function orderTotalFromShipping(shippingId)
{
    var myKeyVals = { shippingId : shippingId};
    $.ajax({
        type: 'POST',
        url: base_url+"checkout/saveShippingAmount",
        data: myKeyVals,
        dataType: "text",
        success: function(resultData) {
            $("#orderTotalAreaShow").load(location.href + " #orderTotalAreaLoad");
        }
    });
}

function orderTotalFromPayment(paymentId)
{
    var myKeyVals = { paymentId : paymentId};
    $.ajax({
        type: 'POST',
        url: base_url+"checkout/savePaymentAmount",
        data: myKeyVals,
        dataType: "text",
        success: function(resultData) {
            $("#orderTotalAreaShow").load(location.href + " #orderTotalAreaLoad");
        }
    });
}

function selectAddress(id)
{
    var myKeyVals = { addressId : id};
    $.ajax({
        type: 'POST',
        url: base_url+"checkout/selectAddress",
        data: myKeyVals,
        dataType: "text",
        success: function(resultData) {
            $('.adding-address-box').css('border',' 1px solid #f3f3f3');
            $('.unSelect').hide();
            var selectAddressDiv = id+'_select_address';
            var selectAddressIcon = 'select_'+id;
            $('#'+selectAddressDiv).css('border',' 2px solid #EB4494');
            $('#'+selectAddressIcon).show();
        }
    });
}