<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<!-- extra css end -->
<?php $this->view( 'includes/header_end.php'); ?>


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
                        <h4 class="page-title">User</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">
                                Customer Registration
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row">
                <div class="col-sm-12">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Account Details</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="form[name]" id="username"
                                           value="<?= $result->name?>"
                                        <?= form_error('form[name]') ?>
                                           placeholder="Username">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" class="form-control" name="form[password]" id="password"
                                           value="<?= $result->password?>"
                                        <?= form_error('form[password]') ?>
                                           placeholder="Password">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Re Type Password</label>
                                    <input type="text" class="form-control" name="form[re_type_password]" id="re_type_password"
                                           value="<?= $result->re_type_password?>"
                                        <?= form_error('form[re_type_password]') ?>
                                           placeholder="Re Type Password">
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Customize User Privilages</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td class="middle-align"><div class="form-group-1">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox21" type="checkbox">
                                                    <label for="checkbox21"> Customer </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group-1 row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="radio" id="radio1" value="option1" checked="">
                                                        <label for="radio1"> Add </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group-1 row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="radio" id="radio1" value="option1" checked="">
                                                        <label for="radio1"> Edit </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group-1 row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="radio" id="radio2" value="option2" checked="">
                                                        <label for="radio1"> Delete </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group-1 row">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="radio" id="radio2" value="option2" checked="">
                                                        <label for="radio1"> Report </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->





        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view( 'includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>
