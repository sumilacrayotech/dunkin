<div class="row">
    <div class="col-12">
        <div class="tab-style3">
            <ul class="nav nav-tabs" role="tablist">
                <?php
                if(!empty($product->description)){
                    $descriptionActive = 'active';
                    $descriptionTrue = 'aria-selected="true"';
                }elseif(!empty($specification) and empty($product->description)){
                    $specificationActive = 'active';
                    $specificationTrue = 'aria-selected="true"';
                }elseif(empty($specification) and empty($product->description)){
                    $reviewActive = 'active';
                    $reviewTrue = 'aria-selected="true"';;
                }
                ?>
                <?php if(!empty($product->description)): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $descriptionActive ?>" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" <?php if($descriptionTrue){echo $descriptionTrue;}else{echo 'aria-selected="false"';}?>>Description</a>
                </li>
                <?php endif; ?>
                <?php if(!empty($specification)): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $specificationActive ?>" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" <?php if($specificationTrue){echo $specificationTrue;}else{echo 'aria-selected="false"';}?>>Additional info</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $reviewActive ?>" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" <?php if($reviewTrue){echo $reviewTrue;}else{echo 'aria-selected="false"';}?>">Reviews (2)</a>
                </li>
            </ul>
            <div class="tab-content shop_info_tab">
                <?php if(!empty($product->description)): ?>
                <div class="tab-pane fade show <?php echo $descriptionActive ?>" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                </div>
                <?php endif; ?>
                <?php if(!empty($specification)): ?>
                <div class="tab-pane fade show <?php echo $specificationActive ?>" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                    <table class="table table-bordered">
                        <?php foreach($specification as $specific):?>
                        <tr>
                            <td><?php echo $specific->specification_name ?></td>
                            <td><?php echo $specific->specification_value ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
                <div class="tab-pane fade show <?php echo $reviewActive ?>" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                    <div class="comments">
                        <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                        <ul class="list_none comment_list mt-4">
                            <li>
                                <div class="comment_block" style="padding-left: 0;">
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                    </div>
                                    <p class="customer_meta">
                                        <span class="review_author">Alea Brooks</span>
                                        <span class="comment-date">March 5, 2018</span>
                                    </p>
                                    <div class="description">
                                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comment_block" style="padding-left: 0;">
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:60%"></div>
                                        </div>
                                    </div>
                                    <p class="customer_meta">
                                        <span class="review_author">Grace Wong</span>
                                        <span class="comment-date">June 17, 2018</span>
                                    </p>
                                    <div class="description">
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="review_form field_form">
                        <h5>Add a review</h5>
                        <form class="row mt-3">
                            <div class="form-group col-12">
                                <div class="star_rating">
                                    <span data-value="1"><i class="far fa-star"></i></span>
                                    <span data-value="2"><i class="far fa-star"></i></span>
                                    <span data-value="3"><i class="far fa-star"></i></span>
                                    <span data-value="4"><i class="far fa-star"></i></span>
                                    <span data-value="5"><i class="far fa-star"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>