<style>
    .main_categrory {
        list-style-type: none;
    }

    .sub_category {
        display: none;
        list-style-type: none;
        margin: 10px 0px 0px 20px;
        clear: both;
    }

    .subcat_check {
        margin: 0px !important;
    }

    .label{

        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        font-weight:bold;
        color: #333;
        font-size: 14px;
        padding-top: 0px;
        padding-left: 5px;
    }

    .tree, .tree ul {
        font: normal normal 14px/20px Helvetica, Arial, sans-serif;
        list-style-type: none;
        transition: background-color .15s,box-shadow .15s;
        padding: 0;
        position: relative;
        overflow: hidden;
    }

    .tree li {
        margin: 5px;
        padding: 0 12px;
        position: relative;
    }

    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        left: 0;
    }

    .tree li::before {
        border-top: 1px dotted #999;
        top: 10px;
        width: 10px;
        height: 0;
    }

    .tree li:after {
        border-left: 1px dotted #999;
        height: 100%;
        width: 0px;
        top: -10px;
    }

    .tree > li::after {
        top: 10px;
    }
    .subcat_check.nostyle {
        width: auto !important;
    }
    .subcat_check {
        width: auto !important;
    }
</style>
<ul class="main_categrory tree" style="float: right; margin: 0px; width: 100% ! important;">
    <input type="hidden" name="cate[parent_category]" id="category_id"/>
    <?php
    $i = 0;

    foreach ($parent_category as $parent) {
        ?>
        <li class="main_cat">
            <span class="fa fa-fw fa-plus-square-o" style="cursor: pointer;" onclick="sub_cat(<?php echo $parent->category_id; ?>,1)"></span>
            <input onclick="get_attributes(this.value)" class="subcat_check nostyle" data-subcat="<?php echo $parent->category_id; ?>" type="checkbox" id="check_<?php echo $parent->category_id; ?>" value="<?php echo $parent->category_id; ?>" name="genaral[category]"/>
            <span class="label"><?php echo $parent->category_name; ?></span>
            <div class="sub_category" id="<?php echo 'subcat_' . $parent->category_id; ?>"></div>
        </li>
        <?php
        $i++;
    }
    ?>
</ul>
<script type="text/javascript">
    function sub_cat(id, level) {
        if ($('#subcat_' + id).css('display') == 'none') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'products/sub_category/'.$this->uri->segment(3);?>',
                data: 'category_id=' + id + '&level=' + level,
                cache:false,
                success: function (data) {
                    if (data != '') {

                        $('#subcat_' + id).html(data);
                        $('#subcat_' + id).show();
                    }
                }
            });
        }
        else {
            $('#subcat_' + id).hide();
        }
    }
    function get_brands(id)
    {
        $.ajax({
            type    : 'POST',
            url     : '<?php echo base_url().'products/category_brands';?>',
            data    : 'category_id='+id,
            success : function(data)
            {
                var selected_value='<option value="" selected>---Please Select Brand----</option>';
                $("#brandbox").empty().append(selected_value);
                $("#brandbox").append(data);
            }
        });
    }
</script>
<?php
if($category !=0)
{
    $parent_category_ids=$this->app->category_id_hierarchy($category);
    for($i=0; $i < count($parent_category_ids); $i++)
    {
        $level=$i+1;
        echo '<script>sub_cat('.$parent_category_ids[$i].','.$level.');</script>';
    }
}
?>

