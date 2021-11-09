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

    .label {
        margin-left: 10px;
        margin-bottom: 5px;
    }

    .tree, .tree ul {
        font: normal normal 14px/20px Helvetica, Arial, sans-serif;
        list-style-type: none;

        padding: 0;
        position: relative;
        overflow: hidden;
    }

    .tree li {
        margin: 0;
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

            <span class="icomoon-icon-plus-circle" style="cursor: pointer;"
                  onclick="sub_cat(<?php echo $parent->category_id; ?>,1)"></span>
            <input class="subcat_check nostyle" data-subcat="<?php echo $parent->category_id; ?>" type="checkbox"
                   id="check_<?php echo $parent->category_id; ?>" value="<?php echo $parent->category_id; ?>"
                   name="cate[]"/>
            <span class="label label-success"><?php echo $parent->category_name; ?></span>
            <div class="sub_category" id="<?php echo 'subcat_' . $parent->category_id; ?>">
            
            </div>
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
                url: '<?php echo base_url() . 'attribut/sub_cat/'.$this->uri->segment(3);?>',
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
    
</script>