<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Address</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">My Address</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <?php echo $sideBar ?>
                <div class="col-lg-9 col-md-8">
                    <div id="message"><?php echo $message_like ?></div>
                    <div class="tab-content dashboard_content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" mb-3 ">
                                    <div class="card-header padd_newadd">
                                        <h2 class="head_adminh2">Default Addresses</h2>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($defaultAddress as $addressDefault):?>
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                        <h3 style="color: #FFF"> Default <?php echo ucfirst($addressDefault->address_type) ?> Address </h3>
                                    </div>
                                    <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 200px;">
                                        <address>
                                            <?php echo ucfirst($addressDefault->first_name) ?> <?php echo ucfirst($addressDefault->last_name) ?><br/>
                                            <?php echo ucfirst($addressDefault->address) ?><br/>
                                            <?php echo ucfirst($addressDefault->state) ?><br/>
                                            <?php echo ucfirst($addressDefault->city) ?><br/>
                                            <?php echo ucfirst($addressDefault->zip_code) ?><br/>
                                            <?php echo ucfirst($main->getCountryNameByCode($addressDefault->country_code)) ?><br/>
                                            T: <?php echo ucfirst($addressDefault->phone_number) ?><br/>
                                        </address>
                                    </div>
                                    <div class="card-header" style="background-color: #f5f5f5; border-radius: unset;border: solid 1px #DDD;">
                                        <a style="color: #eb4494;" href="<?php echo base_url('customer/editAddress/'.$addressDefault->id) ?>">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" mb-3 ">
                                    <div class="card-header padd_newadd">
                                        <h2 class="head_adminh2">Additional Address Entries</h2>
                                    </div>
                                </div>
                                <?php if($additionalAddress){?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr style="font-size: 12px">
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>ZipCode</th>
                                                        <th>Phone</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($additionalAddress as $address):?>
                                                    <tr style="font-size: 12px">
                                                        <td><?php echo ucfirst($address->first_name) ?></td>
                                                        <td><?php echo ucfirst($address->last_name) ?></td>
                                                        <td>
                                                            <div style="word-wrap: break-word;">
                                                                <?php echo ucfirst($address->address) ?>
                                                            </div>
                                                        </td>
                                                        <td><?php echo ucfirst($address->city) ?></td>
                                                        <td><?php echo ucfirst($main->getCountryNameByCode($address->country_code)) ?></td>
                                                        <td><?php echo ucfirst($address->state) ?></td>
                                                        <td><?php echo ucfirst($address->zip_code) ?></td>
                                                        <td><?php echo ucfirst($address->phone_number) ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('customer/editAddress/'.$address->id) ?>" style="color: #eb4494;">Edit</a>
                                                            <span style="color: #9A9A9A;">&nbsp;|&nbsp;</span>
                                                            <a onclick="return confirm('Are you sure you want to delete this address?');" href="<?php echo base_url('customer/deleteAddress/'.$address->id) ?>" style="color: #d10029;">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{?>
                                    <div class="col-lg-6">
                                        <p>You have no other address entries in your address book.</p>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>