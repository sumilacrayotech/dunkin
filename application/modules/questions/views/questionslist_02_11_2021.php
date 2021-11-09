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
                        foreach($questmain as $qm){
                            $qmid=$qm->questionnaireid;

                            ?>
                        <tr style="background-color: #f9f9f9;">
                            <!--<td rowspan="13" style="width: 50px;text-align: center;">1</td>-->
                            <td style="text-align: center;width: 50px;font-weight: 600;color: #da1984;"><?php echo $j;?></td>
                            <th style="background-color: #ff671f;color:#fff;padding: 5px 10px;line-height: 1.6;">Question :<?php echo $qm->questiontitle;?><a href="<?php echo base_url();?>questions/delquestions/<?php echo $qm->questionid;?>/<?php echo$pageid;?>/<?php echo$qmid;?>" class="delete_question"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> &nbsp; <a href="<?php echo base_url();?>questions/editquestions/<?php echo $qm->questionid;?>/<?php echo$pageid;?>" class="edit_question"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></th>
                        </tr>

                            <tr style="background-color: #f9f9f9;">
                                <!--<td rowspan="13" style="width: 50px;text-align: center;">1</td>-->
                                <td><?php //echo $j;?></td>
                                <th style="background-color: #fc6028;color:#fff;">Question Arabic:<?php echo $qm->questiontitlearabic;?> </th>
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

<?php if ($qm->category!='textbox'){?>
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


                            <tr style="background-color: #f9f9f9;">
                                <td></td>
                                <th>Options Arabic</th>
                            </tr>
                            <?php
                            $optionsarabic=array();
                            $answeropt=$qm->answeroptionsarabic;
                            $options = json_decode($answeropt, true);
//print_r($options);

                            ?>
                            <?php for($i=0;$i<count($options);$i++){?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $options[$i];?></td>
                                </tr>
                            <?php }?>



                        <tr style="background-color: #f9f9f9;">
<th>&nbsp;</th>
                            <th>Answer</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo $qm->answer;?></td>
                        </tr>

                            <tr style="background-color: #f9f9f9;">
                                <th>&nbsp;</th>
                                <th>Answer Arabic</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $qm->answerarabic;?></td>
                            </tr>
    <?php }?>
                            <tr style="background-color: #f9f9f9;">
                                <th>&nbsp;</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $qm->status;?></td>
                            </tr>
                            <tr style="background-color: #f9f9f9;">
                                <th>&nbsp;</th>
                                <th>Question Type</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $qm->questiontype;?></td>
                            </tr>




                        <?php $j++; }?>
                       

                        </tbody>
                    </table>
                    <div class="pagination_div"><p><?php echo $links; ?></p></div>
                   
                </div>
            </div>
        </div>

    </section>
</div>

<style type="text/css">
    a.edit_question {
         font-weight: 600;
    font-size: 13px;
    margin-right: 8px;
    border-radius: 3px;
    float: right;
    color: #fff;
    background-color: #da1984;
    background: linear-gradient( 
35deg, rgb(218 25 132) 30%, rgb(233 56 90) 80%);
    padding: 4px 13px;
        line-height: 1.4;
    }
       a.edit_question:hover{
            background: linear-gradient( 
35deg, rgb(233 56 90) 30%, rgb(218 25 132) 80%);
       }
      a.delete_question {
            font-weight: 600;
        border-radius: 3px;
         font-size: 13px;
        float: right;
        color: #fff;
        background-color: #da1984;
/*            background: linear-gradient(
35deg, rgb(240 70 74) 30%, rgba(218,24,132,1) 80%);*/
      padding: 4px 13px;
          line-height: 1.4;
    }
       a.delete_question:hover{
            background-color: #c31173;
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

