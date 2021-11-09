<script>
    $(function() {
        $("#skill_input").autocomplete({
            source: "<?php echo base_url('users/allStores') ?>",
            minLength: 3
        });
    });
</script>
<div class="content-wrapper" style="min-height: 525px;">
    <section class="content-header">
        <h1>
            View Questions
            <small class="small_css">Customer Survey Portal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Manage Questions</a></li>
            <li class="active">  View Questions</li>
        </ol>
    </section>
    <section class="content">
        <div class="box_new">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <h4><strong>Questions</strong></h4>
                    <br>
                </div>
                <div class="col-lg-12 col-xs-12">
                    <table id="example1" class="table table-bordered  text-left">

                        <tbody>
                        <?php
                        $j=1;
                        $pageid=$this->uri->segment(4);
                        foreach($questmain as $qm){?>
                        <tr style="background-color: #f9f9f9;">
                            <!--<td rowspan="13" style="width: 50px;text-align: center;">1</td>-->
                            <td style="width: 50px;text-align:center;color: #ff671f;font-weight: 700;"><?php echo $j;?></td>
                            <th style="background-color: #ff671f;color:#fff;    position: relative;">Question :<?php echo $qm->questiontitle;?> <a href="<?php echo base_url();?>questions/editquestions/<?php echo $qm->questionid;?>/<?php echo$pageid;?>" class="edit_question"> <i class="fa fa-edit"></i> Edit</a> </th>
                        </tr>
                            <?php
                        $options=array();
                            $answeropt=$qm->answeroptions;
                            $options = json_decode($answeropt, true);
//print_r($options);

                            ?>
                            <tr style="background-color: #f9f9f9;">
                                <td></td>
                                <th>Category</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $qm->category;?></td>
                            </tr>


                        <tr style="background-color: #f9f9f9;">
<td></td>
                            <th>Options</th>
                        </tr>
                            <?php for($i=0;$i<count($options);$i++){?>
                        <tr>
                            <td></td>
                            <td><?php echo $options[$i];?></td>
                        </tr>
                                <?php }?>
                        <!--<tr>

                            <td>Decaf Coffee</td>
                        </tr>
                        <tr>

                            <td>Dark Roast Coffee</td>
                        </tr>
                        <tr>

                            <td>Cappuccino</td>
                        </tr>
                        <tr>

                            <td>Latte</td>
                        </tr>
                        <tr>

                            <td>Mocha</td>
                        </tr>
                        <tr>

                            <td>Hot Chocolate</td>
                        </tr>
                        <tr>

                            <td>Espresso</td>
                        </tr>
                        <tr>

                            <td>Karak Chai</td>
                        </tr>-->
                        <tr style="background-color: #f9f9f9;">
<th>&nbsp;</th>
                            <th>Answer</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo $qm->answer;?></td>
                        </tr>
                        <?php $j++; }?>
                        <!--<tr style="background-color: #f9f9f9;">
                            <td rowspan="14" style="width: 50px;text-align: center;">2</td>
                            <th style="background-color: #ff671f;color:#fff;">Question : Which type of coffee do you prefer most? <a href="#" class="edit_question">Edit</a></th>
                        </tr>
                        <tr style="background-color: #f9f9f9;">

                            <th>Options</th>
                        </tr>
                        <tr>

                            <td>Instant</td>
                        </tr>
                        <tr>

                            <td>Freshly ground</td>
                        </tr>
                        <tr style="background-color: #f9f9f9;">

                            <th>Answer</th>
                        </tr>
                        <tr>

                            <td>Instant</td>
                        </tr>-->



                        </tbody>
                    </table>
                    <div class="pagination_div"><p><?php echo $links; ?></p></div>
                    <!--<div class="pagination_div">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-chevron-left css-1l7bpnt"></i> Previous</a>
                            </li>
                            <li>
                                <a href="#" class="active">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li>
                                <a href="#">6</a>
                            </li>
                            <li>
                                <a href="#">7</a>
                            </li>
                            <li>
                                <a href="#">Next <i class="fa fa-chevron-right css-1l7bpnt"></i></a>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>

    </section>
</div>

<style type="text/css">
a.edit_question {
    top: 4px;
    right: 10px;
    position: absolute;
    border-radius: 3px;
    font-size: 13px;
    font-weight: 500;
    float: right;
    color: #fff;
    background-color: #da1984;
    padding: 5px 13px;
}
a.edit_question:hover{
        background-color: #b91566;
    background: linear-gradient( 
35deg, rgb(185 0 102) 30%, rgba(218,24,132,1) 80%);
}
    .pagination_div {
        margin-top: 10px;
        text-align: right;
    }
    .pagination_div ul {
        padding-left: 0;
    }
    .pagination_div ul li {
        list-style: none;
        display: inline-block;
    }
    .pagination_div ul li a {
        display: inline-block;
        margin: 2px 0px;
        font-weight: 500;
        font-size: 12px;
        /* cursor: not-allowed; */
        text-decoration: none;
        padding: 6px 12px;
        line-height: 14px;
        border: 1px solid #dddddd;
        background-color: white;
        color: #687587;
    }
    .pagination_div ul li a.active {
        background-color: #ff671f;
        color: #fff;
    }
</style>

