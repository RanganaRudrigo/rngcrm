<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<!-- extra css end -->
<?php $this->view('includes/header_end.php'); ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Supplier</h4>
                        <ol class="breadcrumb p-0">
                            <li><a href="<?= base_url() ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('supplier') ?>">Supplier</a></li>
                            <li class="active"> Supplier Registration</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <?php $this->view('includes/notification.php') ; ?>

            <div class="row">
                <div class="col-sm-12">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Personal Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Supplier Code</label>
                                    <input type="text" class="form-control code-1" name="form[sup_code]" id="sup_code"  value="<?= $result->sup_code?>"
                                        placeholder="Supplier Code" <?= $result->SupplierId ? "readonly":"" ?> >
                                    <?= form_error('form[sup_code]') ?>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Contact Person</label>
                                    <div class="clear"></div>
                                    <select class="form-control name-1" name="form[title]"  id="title">
                                        <option>Mr.</option>
                                        <option>Miss.</option>
                                        <option>Mrs.</option>
                                        <option>Master.</option>
                                        <option>Ms.</option>
                                    </select>



                                    <input type="text" class="form-control name-2" name="form[contact_person]" id="contact_person"  value="<?= $result->contact_person ?>"
                                        placeholder="Name"> <?= form_error('form[contact_person]') ?>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Company</label>
                                    <input type="text" class="form-control" name="form[company]" id="company"
                                           value="<?= $result->company?>" placeholder="Company">
                                        <?= form_error('form[company]') ?>

                                </fieldset>

                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Contact Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Address</label>

                   <textarea class="form-control" id="exampleTextarea" rows="3" name="form[address]" id="address"
                       placeholder="Address"><?= $result->address?></textarea> <?= form_error('form[address]') ?>
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Telephone No</label>
                                    <input type="text" class="form-control" name="form[tel_no]" id="tel_no"
                                           value="<?= $result->tel_no?>"
                                           placeholder="Telephone No">
                                        <?= form_error('form[tel_no]') ?>
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Mobile No</label>
                                    <input type="text" class="form-control" name="form[mob_no]" id="mob_no"
                                           value="<?= $result->mob_no?>"
                                           placeholder="Mobile No">
                                        <?= form_error('form[mob_no]') ?>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Fax No</label>
                                    <input type="text" class="form-control" name="form[fax_no]" id="fax_no"
                                           value="<?= $result->fax_no?>"
                                           placeholder="Fax No">
                                        <?= form_error('form[fax_no]') ?>
                                </fieldset>


                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="form[email]" id="email"
                                           value="<?= $result->email?>"
                                           placeholder="Email">
                                        <?= form_error('form[email]') ?>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Web Address</label>
                                    <input type="text" class="form-control" name="form[web_address]" id="web_address"
                                           value="<?= $result->web_address?>"
                                           placeholder="Web Address">
                                        <?= form_error('form[web_address]') ?>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">Add</button>

                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
<!-- container -->

</div>
<!-- content -->

</div>
<!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view('includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view('includes/footer_end.php') ?>
