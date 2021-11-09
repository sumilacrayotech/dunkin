var base_url = $('#base_url').val();
function ajax_form_action(form_id, action, message_id, repage)
{
    $(document).ready(function (e)
    {
        $("#" + form_id).on('submit', (function (e)
        {
            e.preventDefault();
            $("#" + message_id).empty();
            $('#loader_add_emp').show();
            $.ajax
            ({
                url: base_url + action,
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    $('#loader_add_emp').hide();
                    if (data.trim() == 'r')
                    {
                        window.location = repage;
                    }
                    else
                    {
                        $("#" + message_id).html(data);
                    }
                }
            });
        }));
    });
}
function ajax_action(form_id, messge_id, loader_id, action_url, return_page)
{
    $(document).ready(function ()
    {
        var vali = $("#" + form_id).validate
        ({
            submitHandler: function (form)
            {
                $("#" + messge_id).empty();
                $('#' + loader_id).show();
                var form_input = '#' + form_id + ' input';
                var form_select = '#' + form_id + ' select';
                var form_textarea = '#' + form_id + ' textarea';
                $.ajax({
                    type: "POST",
                    url: action_url,
                    data: $(form_textarea + ',' + form_input + ',' + form_select).serialize(),//only input
                    success: function (response)
                    {
                        $('#' + loader_id).hide();
                        $("#" + messge_id).html();
                        var repage = return_page;
                        if (response.trim() == 'r')
                        {
                            window.location = repage;
                        }
                        else
                        {
                            $("#" + messge_id).html(response);
                        }
                    }
                });
            }
        });
    });
}
ajax_form_action('add_officeemployee', 'employee/add_ajax_staff', 'ajax_msg', '../employee/manage_staff')
ajax_form_action('edit_officeemployee', 'employee/edit_ajax_staff', 'edit_ajax_msg', '../manage_staff')
ajax_form_action('add_employee', 'employee/add_ajax_emp', 'ajax_msg', 'employee')
ajax_form_action('edit_employee', 'employee/edit_ajax_emp', 'edit_ajax_msg', 'employee')
ajax_action('update_hr_emp_date', 'message_div', 'loader_add_emp', '../hr/update_emp_data', '')
ajax_action('add_site', 'add_site_message', 'qLbar', '../marketing/add_site', '../marketing/manage_client_site')
ajax_action('update_site', 'update_site_message', 'qLbar', '../../update_site', '')
ajax_action('add_safety_requisition', 'message_div', 'loader_add_emp', '../marketing/insert_safety_requisition', '../marketing/safety_requisition');
ajax_action('edit_safety_requisition', 'message_div', 'loader_add_emp', '../marketing/update_safety_requisition', '../marketing/safety_requisition');
ajax_action('add_accounts_office_requisition', 'message_div', 'loader_add_emp', '../marketing/insert_office_requisition', '../marketing/office_requisition');
ajax_action('update_accounts_office_requisition', 'message_div', 'loader_add_emp', '../marketing/update_office_requisition', '../marketing/office_requisition');

ajax_action('add_site_calc','message_div', 'loader_add_emp','../marketing/insert_calc','../marketing/site_calc');
ajax_action('edit_site_calc','message_div', 'loader_add_emp','../marketing/update_site_calc','');
ajax_action('add_velosi', 'message_div', 'loader_add_emp', '../marketing/insert_velosi', '../marketing/velosi');
ajax_action('editvelosi', 'message_div', 'loader_add_emp', '../marketing/update_velosi', '../marketing/velosi');

ajax_action('active_site_month', 'message_div_search_site', 'loader_add_emp', '../marketing/get_active_month_site', '');

$(function() {
$( "#memp_id" ).autocomplete({
            source: base_url+'marketing/emp_autocomplete',
minLength: 1,
            select: function( event, ui ) {
event.preventDefault();
                    $('#memp_id').val(ui.item.label);
			this.value = ui.item.label;
			$('#empname').val(ui.item.value);
                    $('#trade').val(ui.item.trade);
            }
          });
          });
function remain_days()
{
var date=$("#expiry_date").val();

$.ajax({
type:"post",
data:'date='+date,
url:base_url+'marketing/remain_days',
success:function(data){

            $("#remian_days").val(data);
        }
    });
}

$("#field-period").click(function ()
{
    var f_date = $('#field-vacation_start_date').val();
    var s_date = $('#field-return_date').val();
    $.ajax({
        type: "GET",
        url: base_url + 'employee/diff_date?f_date=' + f_date + '&s_date=' + s_date,
        success: function (response)
        {
            $("#field-period").val(response);
        }
    });
});
function get_emp_data(base_url)
{
    var url = base_url + 'hr/emp_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
function get_leave_data(base_url)
{
    var url = base_url + 'hr/leave_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
/*
 * Date   : 09/03/2016
 * Author : Ajith
 * Module : HR
 * Task   : Get Employee Details for Salary Increment
 * */
function get_sal_data(base_url)
{
    var url = base_url + 'hr/emp_sal_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
/*
 * Module : HR
 * Task   : Get Employee Details for Salary Increment
 * */
ajax_action('salaryIncrement', 'message_div', 'loader_add_emp', '../hr/salary_incr_data', '');
/**
 * Date   : 05/09/16
 * Module : HR
 * Author : Ajith
 * Task   : Get Employee Trade Details
 */
function get_trade_data(base_url)
{
    var url = base_url + 'hr/emp_trade_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
/*
 * Module : HR
 * Task   : Update Employee Trade Details
 * */
$(document).ready(function ()
{
    var vali = $("#update_trade_det").validate
    ({
        submitHandler: function (form)
        {
            //$("#"+messge_id).empty();
            //$('#'+loader_id).show();
            var form_input = '#update_trade_det input';
            var form_select = '#update_trade_det select';
            var form_textarea = '#update_trade_det textarea';
            $.ajax({
                type: "POST",
                url: '../hr/change_trade_data',
                data: $(form_select).serialize(),//only input
                success: function (response)
                {
                    $('#' + loader_id).hide();
                    $("#" + messge_id).html();
                    var repage = return_page;
                    if (response.trim() == 'r')
                    {
                        window.location = repage;
                    }
                    else
                    {
                        $("#" + messge_id).html(response);
                    }
                }
            });
        }
    });
});
function get_camp_data(base_url)
{
    var url = base_url + 'hr/emp_camp_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
ajax_action('update_trade_det', 'message_div', 'loader_add_emp', '../hr/emp_trade_data', '');
ajax_action('leave_data', 'leave_message', 'loader_add_emp', '../hr/insert_leave', '../hr/leaves');
ajax_action('update-camps', 'message_div', 'loader_add_emp', '../hr/update_camp', '../hr/leaves');
ajax_action('disciplinary-action', 'message_div', 'loader_add_emp', '../hr/discipline_insert', '../hr/discipline');
ajax_action('Back_From_Vacation', 'message_div', 'loader_add_emp', '../hr/insert_backfrom_vacation');
function get_disciplin_data(base_url)
{
    var url = base_url + 'hr/discipline_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
/*
 * Date : 08/08/16
 * Author : Ajith
 * Task : Medical Records Data
 * */
function get_med_data(base_url)
{
    var url = base_url + 'hr/emp_med_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
ajax_action('insert_medical_records', 'message_div', 'loader_add_emp', '../hr/employee_med_insert', '../hr/medical_record_list');
/*
 *Date : 11/09/16
 *Author : Ajith
 *Task : Add Absenter
 */
function get_absenter(base_url)
{
    var url = base_url + 'hr/emp_absent_data';
    var emp_name = $('#emp_name').val();
    if (emp_name == '')
    {
        alert('Please enter employee name');
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: 'code=' + emp_name,
            success: function (data)
            {
                $('#emp_data').html(data);
            }
        });
    }
}
ajax_action('add_absenters', 'message_div', 'loader_add_emp', '../hr/insert_absenter', '');
$(document).ready(function ()
{
    var vali = $("#absentSearch").validate
    ({
        submitHandler: function (form)
        {
            var form_id = 'absentSearch';
            var form_input = '#' + form_id + ' input';
            var form_select = '#' + form_id + ' select';
            $.ajax({
                type: "POST",
                url: base_url + 'hr/search_absent',
                data: $(form_input + ',' + form_select).serialize(),//only input
                success: function (response)
                {
                    if (response.trim() == 'r')
                    {
                        window.location = repage;
                    }
                    else
                    {
                        $('#Searchdata').html(response)
                    }
                }
            });
        }
    });
});
function SearchMustor()
{
    $.ajax({
        type: 'POST',
        url: base_url + 'hr/search_mustor',
        data: $('#MustorSearch').serialize(),
        success: function (data)
        {
            $('#Searchdata').html(data)
        }
    });
}
ajax_action('addhr_office_requisition', 'message_div', 'loader_add_emp', '../hr/insert_office_requisition', '../hr/office_requisition');
ajax_action('updatehr_office_requisition', 'message_div', 'loader_add_emp', '../hr/update_office_requisition', '../hr/office_requisition');
/*TRANSPORTATION MODULE*/
ajax_action('add_vehicle', 'message_div', 'loader_add_emp', '../transportation/add_vehicle_details', '../transportation/vehicle_details');
ajax_action('update_vehicle', 'message_div', 'loader_add_emp', '../transportation/update_vehicle_details', '../transportation/vehicle_details');
ajax_action('add_vehicle_allocation', 'message_div', 'loader_add_emp', '../transportation/insert_vehicle_allocation', '../transportation/vehicle_allocation');
ajax_action('update_vehicle_allocation', 'message_div', 'loader_add_emp', '../transportation/update_vehicle_allocation', '../transportation/vehicle_allocation');
ajax_action('add_vehicle_expense', 'message_div', 'loader_add_emp', '../transportation/insert_vehicle_expense', '../transportation/vehicle_expense');
ajax_action('edit_vehicle_expense', 'message_div', 'loader_add_emp', '../transportation/update_vehicle_expense', '');
ajax_action('add_traffic_fine', 'message_div', 'loader_add_emp', '../transportation/insert_traffic_fine', '../transportation/traffic_fine');
ajax_action('update_traffic_fine', 'message_div', 'loader_add_emp', '../transportation/update_traffic_fine', '');
ajax_action('add_accident_report', 'message_div', 'loader_add_emp', '../transportation/insert_accident_report', '../transportation/accident_report');
ajax_action('update_accident_report', 'message_div', 'loader_add_emp', '../transportation/update_accident_report', '');
ajax_action('add_time_schedule', 'message_div', 'loader_add_emp', '../transportation/insert_time_schedule', '../transportation/time_shedule');
ajax_action('update_time_schedule', 'message_div', 'loader_add_emp', '../transportation/update_time_schedule', '');
function Searchemp()
{
    var url = base_url + 'transportation/emp_data';
    var emp_name = $('#emp_name').val();
    var month=$('#month').val();
    var year=$('#year').val();
    var flag=0;
    if (emp_name == '')
    {
        flag++;
    }
    else if(month=='')
    {
       flag++; 
    }
    else if(year=='')
    {
       flag++; 
    }
    if(flag==0)
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#payrollSearch').serialize(),
            dataType : 'json',
            success: function (data)
            {
               
               if(data.status=='f')
               {
                   $('.modal-body').html(data.msg);
                    $('#myModal').modal('show');
               }
                    $('#Searchdata').html(data.tabs).slideDown();
                
                    
                
            }
        });
    }
}
    $(document).ready(function(){
            $('.total_hrs').keyup(function(){
                var total= $(this).val();
                var selector=$(this).next('.selecter').val();
                var normal=total-8;
                var ramadan_normal=total-6;
                if(total < 8)
                {
                    var hours= total;
                }
                else
                {
                    var hours=8;
                }
                if(normal < 0)
                {
                    normal=0;
                }
                if(selector==0)
                {
                    var $tr = $(this).closest('tr');
                    $tr.find('td:nth-child(4)').next().find('input').val(hours);
                    $tr.find('td:nth-child(5)').next().find('input').val(normal);
                    $tr.find('td:nth-child(6)').next().find('input').val(0);
                }
                else if(selector=='R')
                {
                    if(total < 6)
                    {
                        var tot= total;
                    }
                    else
                    {
                        var tot=6;
                    }
                    var $tr = $(this).closest('tr');
                    $tr.find('td:nth-child(4)').next().find('input').val(tot);
                    $tr.find('td:nth-child(5)').next().find('input').val(ramadan_normal);
                    $tr.find('td:nth-child(6)').next().find('input').val(0);
                }
                else
                {
                    var $tr = $(this).closest('tr');
                    $tr.find('td:nth-child(4)').next().find('input').val(0);
                    $tr.find('td:nth-child(5)').next().find('input').val(0);
                    $tr.find('td:nth-child(6)').next().find('input').val(total);
                }
            });
            $('.emp_status').change(function(){
               var status = $(this).val();
               var $tr = $(this).closest('tr');
               if(status=='absent')
               {
                    $tr.find('td:nth-child(3)').next().find('input').val(0);
                    $tr.find('td:nth-child(4)').next().find('input').val(0);
                    $tr.find('td:nth-child(5)').next().find('input').val(0);
                    $tr.find('td:nth-child(6)').next().find('input').val(0);
               }
               else if(status=='holiday')
               {
                    $tr.find('td:nth-child(3)').next().find('input').val('');
                    $tr.find('td:nth-child(4)').next().find('input').val('');
                    $tr.find('td:nth-child(5)').next().find('input').val('');
                    $tr.find('td:nth-child(6)').next().find('input').val('');
                    $tr.find('td:nth-child(3)').next().find('.selecter').val('F');
                    //$(this).next('.selecter').val('F');
               }
                else if(status=='ramadan')
               {
                    $tr.find('td:nth-child(3)').next().find('input').val('');
                    $tr.find('td:nth-child(4)').next().find('input').val('');
                    $tr.find('td:nth-child(5)').next().find('input').val('');
                    $tr.find('td:nth-child(6)').next().find('input').val('');
                    $tr.find('td:nth-child(3)').next().find('.selecter').val('R');
                    //$(this).next('.selecter').val('F');
               }
               else
               {
                    $tr.find('td:nth-child(3)').next().find('input').val('');
                    $tr.find('td:nth-child(4)').next().find('input').val('');
                    $tr.find('td:nth-child(5)').next().find('input').val('');
                    $tr.find('td:nth-child(6)').next().find('input').val('');
               }
            });
        });
        function processSalary()
        {
            $.ajax({
            type: 'POST',
            url: base_url+'transportation/save_payroll',
            data: $('#Payroll').serialize(),
            dataType : 'json',
            success: function (data)
            {
                $('#paryoll_data').val(data.payroll);
                $('#normal_hrs').val(data.normal_hours);
                $('#ot_hours').val(data.ot_hours);
                $('#hot_hours').val(data.hot_hours);
                $('#month_days').val(data.month_days);
                //var month_days=$('#month_days').val();
                $('#absent_days').val(data.absent);
                month_days=data.month_days;
                var basic_salary=$('#basic_salary').val();
                    basic_salary=basic_salary.replace(/\,/g,'');
                    basic_salary=parseInt(basic_salary,10);
                var norSalary=$('#normal_rate').val()*data.normal_hours;
                var ot_salary=$('#ot_rate').val()*data.ot_hours;
                var hot_salary=$('#hot_rate').val()*data.hot_hours;
                /*FIXED TO 2 DECIMEL PLACES*/
                norSalary=norSalary.toFixed(2);
                ot_salary=ot_salary.toFixed(2);
                hot_salary=hot_salary.toFixed(2);
                var working_days=month_days-data.absent;
                var absent_amount=(parseFloat(basic_salary)/parseFloat(month_days))*parseFloat(data.absent);
                absent_amount=absent_amount.toFixed(2);
                var month_salary=parseFloat(basic_salary)-parseFloat(absent_amount);
                month_salary=month_salary.toFixed(2);
                $('#working_days').val(working_days);
                $('#month_basic').val(basic_salary - absent_amount);
                //$('#normal_salary').val(norSalary);
               $('#absent_amount').val(absent_amount);
                $('#ot_salary').val(ot_salary);
                $('#hot_salary').val(hot_salary);
                var tot_sal = month_salary+ot_salary+hot_salary;
                //$('#total_salary').val(tot_sal);
                //$('#total_salary').val(month_salary);
                $('#tab-2').tab('show');
            }
        });
        }
        function calculate()
        {
            /*var basic_salary=$('#basic_salary').val();
            var ot_amount=$('#ot_salary').val();
            var hot_amount=$('#hot_salary').val();
            var pre_balance=$('#pre_balance').val();
            var special_allow=$('#special_allow').val();
            var site_allow=$('#site_allow').val();
            var absent_amount=$('#absent_amount').val();
            var air_allow=$('#air_allow').val();
            var fare_ref_amt=$('#fare_ref_amt').val();
            var sal_adv=$('#sal_adv').val();
            var act_gross_salary=parseFloat(basic_salary)+parseFloat(ot_amount)+parseFloat(hot_amount)+parseFloat(pre_balance)+parseFloat(special_allow)+parseFloat(site_allow);
            var gross_salary=parseFloat(act_gross_salary)-parseFloat(absent_amount);
            var total_salary=(gross_salary+air_allow+fare_ref_amt);
            var net_salary=total_salary-sal_adv;
            $('#gross_salary').val(gross_salary);
            $('#total_salary').val(total_salary);
            $('#net_salary').val(net_salary);*/
            var payroll={
                'basic_salary' : $('#basic_salary').val(),
                'ot_amount'    : $('#ot_salary').val(),
                'hot_amount'   : $('#hot_salary').val(),
                'pre_balance'  : $('#pre_balance').val(),
                'special_allow': $('#special_allow').val(),
                'site_allow'   : $('#site_allow').val(),
                'absent_amount': $('#absent_amount').val(),
                'air_allow'    : $('#air_allow').val(),
                'fare_ref_amt' : $('#fare_ref_amt').val(),
                'sal_adv'      : $('#sal_adv').val()
            }
            $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/payroll_calculate',
                data    : {'payroll' : payroll},
                dataType: 'json',
                success : function(data)
                {
                    $('#gross_salary').val(data.gross_salary);
                    $('#total_salary').val(data.total_salary);
                    $('#net_salary').val(data.net_salary);
                }
            });
        }
        $('#sal_adv').keyup(function(){
            var sal_adv=$(this).val();
            var total_salary=$('#total_salary').val();
            var net_salary=total_salary-sal_adv;
            $('#net_salary').val(net_salary);
        });
        function savePayroll()
        {
             $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/insert_payroll',
                data    : $('#driverPayroll').serialize(),
                success : function(data)
                {
                   if(data=='r')
                   {
                        window.location.href=base_url+'transportation/payroll';
                   }
                }
            });
        }
        function updatePayroll()
        {
            $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/update_payroll',
                data    : $('#updatedriverPayroll').serialize(),
                success : function(data)
                {
                   if(data=='r')
                   {
                        window.location.href=base_url+'transportation/payroll';
                   }
                }
            });
        }
        $(function() {
          $( "#emp_id" ).autocomplete({
            source: base_url+'transportation/emp_autocomplete',
            minLength: 1,
            select: function( event, ui ) {
                    event.preventDefault();
                    $('#emp_id').val(ui.item.label);
        			this.value = ui.item.label;
        			$('#emp_name').val(ui.item.value);
            }
          });
  });
  function chooseCamp(value)
  {
    if(value=='camp')
    {
        $('.camp_fields').show();
    }
    else
    {
        $('.camp_fields').hide();
    }
  }
  ajax_action('add_driver_docs', 'message_div', 'loader_add_emp', '../transportation/insert_driver_docs', '../transportation/driver_docs');
  ajax_action('update_driver_docs', 'message_div', 'loader_add_emp', '../transportation/update_driver_docs', '../transportation/driver_docs');
  function get_VehicleUser(value)
  {
            $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/get_vehicle_user',
                data    : 'vehicle='+value,
                success : function(data)
                {
                   $('#user').val(data);
                }
            });
  }
  function searchPayroll()
  {
    var url = base_url + 'transportation/payroll_data';
    var month=$('#month').val();
    var year=$('#year').val();
    var flag=0;
    if(month=='')
    {
       flag++; 
    }
    else if(year=='')
    {
       flag++; 
    }
    if(flag==0)
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#payrolldata').serialize(),
            dataType : 'json',
            success: function (data)
            {
                $('#payrollData').html(data.tabs).slideDown();
            }
        });
    }
  }
  function searchsalarysheet()
  {
    var url = base_url + 'transportation/salary_sheet';
    var month=$('#salmonth').val();
    var year=$('#salyear').val();
    var emp=$('#salemp').val();
    var flag=0;
    if(month=='')
    {
       flag++; 
    }
    else if(year=='')
    {
       flag++; 
    }
    if(flag==0)
    {
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#SearchSalarysheet').serialize(),
            //dataType : 'json',
            success: function (data)
            {
                //$('#Searchdata').html(data.tabs).slideDown();
                $('#Salary_tab').html(data);
            }
        });
    }
  }
  function GetSalarySheet(emp_id,month,year)
  {
     $.ajax({
            type: 'POST',
            url: base_url + 'transportation/salary_sheet',
            data: 'employee='+emp_id+'&salmonth='+month+'&salyear='+year,
            //dataType : 'json',
            success: function (data)
            {
                //$('#Searchdata').html(data.tabs).slideDown();
                $('#Salarysheet_tab').html(data);
            }
        });
  }
  function printdiv()
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        //var newstr = document.all.item(printpage).innerHTML;
        var newstr = document.getElementById('printdiv').innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
      function printalldiv()
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        //var newstr = document.all.item(printpage).innerHTML;
        //var newstr = document.getElementsByClassName('printdiv').innerHTML;
        var theOddOnes = document.getElementsByClassName("printdiv");
                for(var i=0; i<theOddOnes.length; i++)
                {
                    var newstr = theOddOnes[i].innerHTML;
                    var oldstr = document.body.innerHTML;
                    document.body.innerHTML = headstr+newstr+footstr;
                    window.print();
                    document.body.innerHTML = oldstr;
                }
        return false;
    }
    ajax_action('add_spare_parts', 'message_div', 'loader_add_emp', '../transportation/insert_spare_parts', '../transportation/spare_parts');
    ajax_action('update_spare_parts', 'message_div', 'loader_add_emp', '../transportation/update_spare_parts', '../transportation/spare_parts');
ajax_action('add_hired_work', 'add_hired_work_message', 'qLbar', '../marketing/add_hired_workers', '../marketing/hired_workers')
ajax_action('update_hired_work', 'update_hired_work_message', 'qLbar', '../../update_hired_workers', '')
function get_VehicleCode(value)
{
    $.ajax({
            type: 'POST',
            url: base_url + 'transportation/get_vehicle_code',
            data: 'veh_no='+value,
            success: function (data)
            {
                $('#vehicle_code').val(data);
            }
        });
}
ajax_action('add_daily_fuel_consumption', 'add_hired_work_message', 'qLbar', '../transportation/insert_daily_fuel_consumption', '../transportation/daily_fuel_consumption')
ajax_action('update_daily_fuel_consumption', 'update_hired_work_message', 'qLbar', '../transportation/update_daily_fuel_consumption', '../transportation/daily_fuel_consumption')
function getVehicleAllocation(value)
{
    $.ajax({
            type: 'POST',
            url: base_url + 'transportation/get_vehicle_allocation',
            data: 'veh_id='+value,
            success: function (data)
            {
                $('#allocateInfo').html(data);
            }
        });
}
ajax_action('add_workshop_invoice', 'update_hired_work_message', '', '../transportation/insert_workshop_invoice', '../transportation/workshop_invoice')
//ajax_action('update_workshop_invoice', 'update_hired_work_message', '', '../transportation/update_workshop_invoice', '../transportation/workshop_invoice')
ajax_action('update_workshop_invoice', 'message_div', 'loader_add_emp', base_url+'transportation/update_workshop_invoice', '../transportation/workshop_invoice');
function print_invoice()
{
    $('#printWrap').print();
}
function fillHrs()
{
    var fill_hr=$('#Fillhrs').val();
    //$('.total_hrs').val(fill_hr);
      var normal=fill_hr-8;
       //alert(normal);
                if(fill_hr < 8)
                {
                    var hours= fill_hr;
                    var ot_hrs=0;
                }
                else
                {
                    var hours=8;
                    var ot_hrs=fill_hr-8;
                }
    $(".selecter").each(function() {
        
        if($(this).val()==0)
        {
            //alert(1);
            var $tr = $(this).closest('tr');
            $tr.find('td:nth-child(3)').next().find('.total_hrs').val(fill_hr);
            $tr.find('td:nth-child(4)').next().find('.normal_hrs').val(hours);
            $tr.find('td:nth-child(5)').next().find('.ot_hrs').val(ot_hrs);
            $tr.find('td:nth-child(6)').next().find('.hot_hrs').val(0);
        }
    });
}
ajax_action('add_tyre_requisition', 'update_hired_work_message', '', '../transportation/insert_tyre_requisition', '../transportation/tyre_requisition')
ajax_action('update_tyre_requisition', 'update_hired_work_message', '', '../transportation/update_tyre_requisition', '../transportation/tyre_requisition')
function get_vehicle_name(value)
{
     $.ajax({
            type: 'POST',
            url: base_url + 'transportation/get_vehicle_name',
            data: 'veh_no='+value,
            success: function (data)
            {
                $('#vehicle_name').val(data);
            }
        });
}
ajax_action('add_spare_requisition', 'message_div', 'loader_add_emp', '../transportation/insert_spare_requisition', '../transportation/spare_parts_requisition');
ajax_action('update_spare_requisition', 'message_div', 'loader_add_emp', '../transportation/update_spare_requisition', '../transportation/spare_parts_requisition');
ajax_action('add_office_requisition', 'message_div', 'loader_add_emp', '../transportation/insert_office_requisition', '../transportation/office_requisition');
ajax_action('update_office_requisition', 'message_div', 'loader_add_emp', '../transportation/update_office_requisition', '../transportation/office_requisition');
  /*PURCHASE DEPARTMENT*/
ajax_action('add_purchase_group', 'message_div', 'loader_add_emp', '../purchase/insert_purchase_group', '../purchase/purchase_group');
ajax_action('update_purchase_group', 'message_div', 'loader_add_emp', '../purchase/update_purchase_group', '../purchase/purchase_group');
function groupAbbreveation(value)
{
     $.ajax({
            type: 'POST',
            url: base_url + 'purchase/get_gp_abbrevation',
            data: 'gp_id='+value,
            success: function (data)
            {
                $('#ItemNumber').val(data);
            }
        });
}
ajax_action('add_purchase_items', 'message_div', 'loader_add_emp', '../purchase/insert_purchase_items', '../purchase/purchase_items');
ajax_action('update_purchase_items', 'message_div', 'loader_add_emp', '../purchase/update_purchase_items', '../purchase/purchase_items');
ajax_action('add_purchase_units', 'message_div', 'loader_add_emp', '../purchase/insert_purchase_units', '../purchase/purchase_units');
ajax_action('update_purchase_units', 'message_div', 'loader_add_emp', '../purchase/update_purchase_units', '../purchase/purchase_units');
ajax_action('add_brands', 'message_div', 'loader_add_emp', '../purchase/insert_brands', '../purchase/brands');
ajax_action('update_brands', 'message_div', 'loader_add_emp', '../purchase/update_brands', '../purchase/brands');
ajax_action('add_store_details', 'message_div', 'loader_add_emp', '../purchase/insert_store_details', '../purchase/store_details');
ajax_action('update_store_details', 'message_div', 'loader_add_emp', '../purchase/update_store_details', '../purchase/store_details');
ajax_action('add_stock_details', 'message_div', 'loader_add_emp', '../purchase/insert_stock_details', '../purchase/stock_details');
ajax_action('update_stock_details', 'message_div', 'loader_add_emp', '../purchase/update_stock_details', '../purchase/stock_details');
 function gotoPrint(table)
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        //var newstr = document.all.item(printpage).innerHTML;
        var newstr = document.getElementById(table).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
ajax_action('add_payment_terms', 'message_div', 'loader_add_emp', '../purchase/insert_payment_terms', '../purchase/payment_terms');
ajax_action('update_payment_terms', 'message_div', 'loader_add_emp', '../purchase/update_payment_terms', '../purchase/payment_terms');
ajax_action('add_purchase_lpo', 'message_div', 'loader_add_emp', '../purchase/insert_add_purchase_lpo', '../purchase/generate_lpo');
ajax_action('update_purchase_lpo', 'message_div', 'loader_add_emp', '../purchase/update_purchase_lpo', '../purchase/generate_lpo');
ajax_action('add_supplier_details', 'message_div', 'loader_add_emp', '../purchase/insert_supplier_details', '../purchase/supplier_details');
ajax_action('update_supplier_details', 'message_div', 'loader_add_emp', '../purchase/update_supplier_details', '../purchase/supplier_details');
function ChangeUnit(value,id)
{
    //var unit=$(this).val();
     
    //var item=parentClass.find('select:nth-child(2)').val();
    var item =$('#item_'+id).val();
    if(item!='')
    {
       $.ajax({
            type: 'POST',
            url: base_url + 'purchase/checkitemunit',
            data: 'item='+item+'&unit='+value+'&id='+id,
            dataType : 'json',
            success: function (data)
            {
                if(data.check == 1)
                {
                    $('.modal-body').html(data.unitfields);
                    $('#myModal').modal('show');
                }
            }
        }); 
    }
   
}
function AssignUnit()
{
    var newQty=$('#newQty').val();
    var rowid=$('#rowid').val();
    $('#qtyKey'+rowid).val(newQty);
    $('#myModal').modal('hide');
}
function ChangeQty(value,id)
{
    
    var qtyKey=$('#qtyKey'+id).val();
    var qty=value * qtyKey
    $('#qty_'+id).val(qty);
}
function processtimesheet()
{
    $.ajax({
            type: 'POST',
            url: base_url+'transportation/save_timesheet',
            data: $('#timesheet').serialize(),
            dataType : 'json',
            success: function (data)
            {
                $('#paryoll_data').val(data.payroll);
                $('#normal_hrs').val(data.normal_hours);
                $('#ot_hours').val(data.ot_hours);
                $('#hot_hours').val(data.hot_hours);
                $('#total_hours').val(data.total_wrking_hrs);
                var month_days=$('#month_days').val();
                $('#absent_days').val(data.absent);
                var working_days=month_days-data.absent;
                $('#working_days').val(working_days);
                $('#tab-2').tab('show');
            }
        });
}
function saveTimesheet()
        {
             $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/insert_timesheet',
                data    : $('#drivertimesheet').serialize(),
                success : function(data)
                {
                   if(data=='r')
                   {
                        window.location.href=base_url+'transportation/time_sheet';
                   }
                }
            });
        }
function updateTimesheet()
        {
             $.ajax({
                type    : 'POST',
                url     : base_url+'transportation/update_timesheet',
                data    : $('#updatetimesheet').serialize(),
                success : function(data)
                {
                   if(data=='r')
                   {
                        window.location.href=base_url+'transportation/time_sheet';
                   }
                }
            });
        }
ajax_action('add_purchase_office_requisition', 'message_div', 'loader_add_emp', '../purchase/insert_office_requisition', '../purchase/office_requisition');
ajax_action('update_purchase_office_requisition', 'message_div', 'loader_add_emp', '../purchase/update_office_requisition', '../purchase/office_requisition');
$('#item-tab').on('change','.change_group', function () {

    var gp=$(this).val();
   var elem=$(this).next('select');
   $.ajax({
                type    : 'POST',
                url     : base_url+'purchase/group_items',
                data    : 'gp_id='+gp,
                success : function(data)
                {
                   elem.html(data);
                }
            });
});

ajax_action('add_new_issue', 'message_div', 'loader_add_emp', '../purchase/insert_new_issue', '../purchase/issue_new_emp');
ajax_action('update_new_issue', 'message_div', 'loader_add_emp', '../purchase/update_new_issue', '../purchase/issue_new_emp');
ajax_action('approve_tyre_requisition', 'message_div', 'loader_add_emp', '../purchase/approve_tyre_requisition', '../purchase/tyre_approve');
ajax_action('approve_office_requisition', 'message_div', 'loader_add_emp', '../purchase/approve_office_requisition', '../purchase/office_approve');
$(function() {
          $( "#gin" ).autocomplete({
            source: base_url+'purchase/gin_autocomplete',
            minLength: 1,
            select: function( event, ui ) {
                    event.preventDefault();
                    $('#gin').val(ui.item.label);
        			
            }
          });
          });
function Searchgin()
{
    var gin=$('#gin').val();
     $.ajax({
                type    : 'POST',
                url     : base_url+'purchase/issue_by_gin',
                data    : 'gin='+gin,
                success : function(data)
                {
                    $('#receipt_tab').show();
                   $('#receipt_tab').html(data);
                }
            });       
}
function searchginbyemployee()
{
    $.ajax({
                type    : 'POST',
                url     : base_url+'purchase/issue_gin_by_employee',
                data    : $('#ginSearchemployee').serialize(),
                success : function(data)
                {
                    $('#receipt_tab').show();
                   $('#receipt_tab').html(data);
                }
            });      
}
function ClubMultipleGin()
{
    var gin=$('#mutiple-gin').val();
    $.ajax({
                type    : 'POST',
                url     : base_url+'purchase/clubbing',
                data    : 'gin='+gin,
                success : function(data)
                {
                    $('#receipt_tab').show();
                   $('#receipt_tab').html(data);
                }
            });     
}
function searchstatements()
{
    $.ajax({
        type:'POST',
        url:base_url+'purchase/statement_search',
        data:$('#statementsearch').serialize(),
        success : function(data)
        {
          $('#receipt_tab').show();
                   $('#receipt_tab').html(data);  
        }
    });
}
ajax_action('add_grocery_lpo', 'message_div', 'loader_add_emp', '../purchase/insert_add_grocery_lpo', '../purchase/grocery_lpo');
ajax_action('update_grocery_lpo', 'message_div', 'loader_add_emp', '../purchase/update_grocery_lpo', '../purchase/grocery_lpo');
ajax_action('add_new_bfvissue', 'message_div', 'loader_add_emp', '../insert_bfv_issue','../purchase/bfv_issue');
/****ACCOUNTS DEPARTMENT******/

ajax_action('add_accounts_office_requisition', 'message_div', 'loader_add_emp', '../accounts/insert_office_requisition', '../accounts/office_requisition');
ajax_action('update_accounts_office_requisition', 'message_div', 'loader_add_emp', '../accounts/update_office_requisition', '../accounts/office_requisition');
function Searchemps()
{
   var url = base_url + 'accounts/emp_data';
   var emp_name = $('#emp_name').val();
   var month=$('#month').val();
   var year=$('#year').val();
   var flag=0;
   if (emp_name == '')
   {
       flag++;
   }
   else if(month=='')
   {
      flag++; 
   }
   else if(year=='')
   {
      flag++; 
   }
   if(flag==0)
   {
       $.ajax({
           type: 'POST',
           url: url,
           data: $('#emppayrollSearch').serialize(),
           dataType : 'json',
           success: function (data)
           {
              
              if(data.status=='f')
              {
                  $('.modal-body').html(data.msg);
                   $('#myModal').modal('show');
              }
                   $('#Searchdata').html(data.tabs).slideDown();
               
                   
               
           }
       });
   }
}
function saveempTimesheet()
       {
            $.ajax({
               type    : 'POST',
               url     : base_url+'accounts/insert_timesheet',
               data    : $('#employetimesheet').serialize(),
               success : function(data)
               {
                  if(data=='r')
                  {
                       window.location.href=base_url+'accounts/time_sheet';
                  }
               }
           });
       }

function processemptimesheet()
{
   $.ajax({
           type: 'POST',
           url: base_url+'accounts/save_emptimesheet',
           data: $('#emptimesheet').serialize(),
           dataType : 'json',
           success: function (data)
           {
               $('#paryoll_data').val(data.payroll);
               $('#normal_hrs').val(data.normal_hours);
               $('#ot_hours').val(data.ot_hours);
               $('#hot_hours').val(data.hot_hours);
               $('#total_hours').val(data.total_wrking_hrs);
               var month_days=$('#month_days').val();
               $('#absent_days').val(data.absent);
               var working_days=month_days-data.absent;
               $('#working_days').val(working_days);
               $('#tab-2').tab('show');
           }
       });
}
 $(document).ready(function(){
           $('.total_hrs').keyup(function(){
               var total= $(this).val();
               var selector=$(this).next('.selecter').val();
               var normal=total-8;
               var ramadan_normal=total-6;
               if(total < 8)
               {
                   var hours= total;
               }
               else
               {
                   var hours=8;
               }
               if(normal < 0)
               {
                   normal=0;
               }
               if(selector==0)
               {
                   var $tr = $(this).closest('tr');
                   $tr.find('td:nth-child(4)').next().find('input').val(hours);
                   $tr.find('td:nth-child(5)').next().find('input').val(normal);
                   $tr.find('td:nth-child(6)').next().find('input').val(0);
               }
               else if(selector=='R')
               {
                   if(total < 6)
                   {
                       var tot= total;
                       ramadan_normal=0;
                   }
                   else
                   {
                       var tot=6;
                   }
                   var $tr = $(this).closest('tr');
                   $tr.find('td:nth-child(4)').next().find('input').val(tot);
                   $tr.find('td:nth-child(5)').next().find('input').val(ramadan_normal);
                   $tr.find('td:nth-child(6)').next().find('input').val(0);
               }
               else
               {
                   var $tr = $(this).closest('tr');
                   $tr.find('td:nth-child(4)').next().find('input').val(0);
                   $tr.find('td:nth-child(5)').next().find('input').val(0);
                   $tr.find('td:nth-child(6)').next().find('input').val(total);
               }
           });
           $('.emp_status').change(function(){
              var status = $(this).val();
              var $tr = $(this).closest('tr');
              if(status=='absent')
              {
               $tr.find('td:nth-child(3)').next().find('input').removeAttr('readonly','');
                   $tr.find('td:nth-child(3)').next().find('input').val(0);
                   $tr.find('td:nth-child(4)').next().find('input').val(0);
                   $tr.find('td:nth-child(5)').next().find('input').val(0);
                   $tr.find('td:nth-child(6)').next().find('input').val(0);
              }
              else if(status=='holiday')
              {
               $tr.find('td:nth-child(3)').next().find('input').removeAttr('readonly','');
                   $tr.find('td:nth-child(3)').next().find('input').val('');
                   $tr.find('td:nth-child(4)').next().find('input').val('');
                   $tr.find('td:nth-child(5)').next().find('input').val('');
                   $tr.find('td:nth-child(6)').next().find('input').val('');
                   $tr.find('td:nth-child(3)').next().find('.selecter').val('F');
                   //$(this).next('.selecter').val('F');
              }
               else if(status=='ramadan')
              {
               $tr.find('td:nth-child(3)').next().find('input').removeAttr('readonly','');
                   $tr.find('td:nth-child(3)').next().find('input').val('');
                   }
                   });
                   });
$('#client-tab').on('change','.change_client', function () {

   var gp=$(this).val();
  
  $.ajax({
               type    : 'POST',
               url     : base_url+'accounts/clients_sites',
               data    : 'gp_id='+gp,
               success : function(data)
               {
                 $('#client_sites').html(data);
               }
           });
}); 
function changesiteTrade(value)
{
  
  $.ajax({
               type    : 'POST',
               url     : base_url+'accounts/change_trade',
               data    : 'site='+value,
               dataType: 'json',
               success : function(data)
               {
                 $('#trade_select').html(data.trade);
                 var montharray={January:"Jan", February:"Feb", March:"Mar",April:"Apr",May:"May",June:"Jun",July: "Jul",August:"Aug",September:"Sep",October:"Oct",November:"Nov",December:"Dec"};
                    var month=$('#monthbx').val();
                    var yearVal=$('#year').val();
                    var monthAbv=(montharray[month]);
                    var lastid=$('#last_id').val();
                    var invoice_no=lastid+'/'+data.company+'/'+monthAbv+' '+yearVal;
                    $('#invoiceNum').val(invoice_no);
                 
               }
           });
}
$('#allTrades').click(function(){
    $('#trade_select option').prop('selected',true);
});
//ajax_action('Invoice_report', 'timesheet', 'loader_add_emp', '../accounts/generate_Invoice_report', '');
ajax_action('approve_office_requisition', 'message_div', 'loader_add_emp', '../accounts/approve_office_requisition', '../purchase/office_approve');
 function generateInvoiceReport()
{
  
  $.ajax({
               type    : 'POST',
               url     : base_url+'accounts/generate_Invoice_report',
               data    : $('#Invoice_report').serialize(),
               success : function(data)
               {
                    $('#invoiceTab').slideUp();
                  $('#timesheet').html(data);
                
                 
               }
           });
}
$(function() {
    $(".emp_data").autocomplete({
        source: base_url+'employee/emp_data'
    });
});
//hir_emp_data
$(function() {
    $(".hir_emp_data").autocomplete({
        source: base_url+'employee/hir_emp_data'
    });
});
function SearchIdle()
{
    $.ajax({
        type: 'POST',
        url: base_url + 'marketing/search_idle',
        data: $('#idleSearch').serialize(),
        success: function (data)
        {
            $('#Searchdata').html(data);
        }
    });
}
ajax_action('add_site_employees', 'add_site_employees_message', 'qLbar', '../marketing/add_site_employees', '../marketing/joinletter')
function SearchMustor()
{
$.ajax({
        type: 'POST',
        url: base_url + 'accounts/search_mustor',
        data: $('#MustorSearch').serialize(),
        success: function (data)
        {
            $('#Searchdata').html(data)
        }
    });
} 
$(function() {
$( "#accemp_id" ).autocomplete({
            source: base_url+'accounts/autocomplete',
minLength: 1,
            select: function( event, ui ) {
event.preventDefault();
                    $('#accemp_id').val(ui.item.label);
			this.value = ui.item.label;
			$('#emp_name').val(ui.item.value);
            }
          });
  });
ajax_action('add_salary_advance','add_sal_adv_message','qLbar','accounts/insert_advance','../accounts/salary_adv');  
       
function addPayroll()
        {
var id=$('#payroll_id').val();
            if(id=='')
            {

            }
            else
            {
$.ajax({
                type    : 'POST',
url  : base_url+'transportation/add_payroll',
                data    : $('#updatedriverPayroll').serialize(),
success : function(data)
                {
                   if(data=='r')
                   {
window.location.href=base_url+'transportation/payroll';
                   }
                }
            });
            }

        }
        function searchsite()
{
$.ajax({
        type: "post",
data:$('#rentedtimesheet').serialize(),
        url: base_url + 'accounts/get_hire_timesheet',
        success: function (data)
        {
            $('#Searchdata').html(data);
        }
    });
}

$(document).ready(function() {
    //$("#message_div_search_site" ).load( "../marketing/get_active_month_site"); //load initial records

    //executes code below when user click on pagination links
    $("#message_div_search_site").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $("#loading-div").show(); //show loading element
        var page = $(this).attr("data-page"); //get page number from link
        var month = $('#month_ser').val();
        $("#message_div_search_site").load("../marketing/get_active_month_site",{"page":page,"month":month}, function(){ //get content from PHP page
            $("#loading-div").hide(); //once done, hide loading element
        });

    });
});