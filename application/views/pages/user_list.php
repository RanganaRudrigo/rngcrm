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
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Account Details</h4>
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                              <table class=" table table-striped " >
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> UserName </th>
                                        <th> User Type </th>
                                        <th> Last Login </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php foreach ($users as $k => $user): ?>
                                        <tr>
                                            <td> <?= $k+1 ?> </td>
                                            <td> <?= $user->name ?> </td>
                                            <td> <?= $user->type ? "Admin" :"Custom" ?> </td>
                                            <td> <?= $user->type  ?> </td>
                                            <td>
                                                <a href="<?= current_url()."/edit/$user->id" ?>" class="btn btn-warning fa fa-edit " > Edit </a>
                                                <a href="<?= current_url()."/delete/$user->id" ?>" class="btn btn-danger fa fa-times" > Delete </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
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
