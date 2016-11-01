<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') ?>" rel="stylesheet" />

<!-- extra css end -->
<?php $this->view( 'includes/header_end.php'); ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">
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
                                <a href="<?= base_url('user') ?>">User</a>
                            </li>
                            <li class="active">
                                <?= is_object($result) ? "Edit" : "Create"  ?>
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <?php $this->view('includes/notification.php') ; ?>

            <div class="row" >
                <div class="col-lg-12" >
                    <a class="btn btn-info m_b_10 pull-right fa fa-plus " href="<?= base_url('system_controllers') ?>"  > Create New </a>
                </div>
            </div>

            <div class="row  ">
                <div class="col-sm-6">
                    <?= form_open() ?>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> <?= is_object($result) ?"Edit" :"Create" ?> Controller </h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Controller Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="<?= $result->name?>"
                                           required
                                           placeholder="Controller Name">
                                    <?= form_error('form[name]') ?>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Methods</label>
                                    <input type="text" class="form-control" name="methods" id="methods" data-role="tagsinput"
                                           value="<?= $result->methods?>"
                                           required
                                           placeholder="Methods">
                                    <small class="text-muted">Method Name separated by comma ( , )
                                    </small>
                                    <?= form_error('form[methods]') ?>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" > Save </button>
                    <?= form_close() ?>
                </div>
                <div class="col-sm-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> Controllers </h4>
                        <table class="table table-bordered" >
                            <?php foreach ($controllers as $controller): ?>
                                <tr>
                                    <td width="70%" ><?= $controller->name ?></td>
                                    <td>
                                        <a class="fa fa-edit btn btn-warning " href="<?= base_url("system_controllers/edit/$controller->controller_id") ?>" > </a>
                                        <a class="fa fa-times btn btn-danger " href="<?= base_url("system_controllers/delete/$controller->controller_id") ?>"  > </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- content -->
</div><!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view( 'includes/footer_start.php') ?>
<!-- extra js start -->
<script type="text/javascript" src="<?= base_url('assets/plugins/parsleyjs/parsley.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') ?>"></script>

<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>