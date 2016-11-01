<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
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

            <div class="row">
                <div class="col-sm-12">
                    <?= form_open() ?>

                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Account Details</h4>
                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control"
                                           name="form[name]"
                                           id="username"
                                           value="<?= $result->name?>"
                                           placeholder="Username"
                                           data-parsley-length="[5,50]"
                                           required
                                    />
                                    <?= form_error('form[username]') ?>
                                </fieldset>

                            </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                                <?php if( !is_object($result) ): ?>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" class="form-control"
                                               name="form[password]"
                                               id="password"
                                               value="<?= $result->password?>"
                                               placeholder="Password"
                                               data-parsley-length="[6,25]"
                                               required
                                        />
                                        <?= form_error('form[password]') ?>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Re Type Password</label>
                                        <input type="password" class="form-control"
                                               placeholder="Re Type Password"
                                               data-parsley-equalto="#password"
                                               data-parsley-length="[6,25]"
                                               required
                                        />
                                        <?= form_error('form[re_type_password]') ?>
                                    </fieldset>
                                <?php endif; ?>
                                <?php if( is_object($result) ): ?>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" class="form-control"
                                               name="form[password]"
                                               id="password"
                                               value="<?= $result->password?>"
                                               placeholder="Password"
                                               data-parsley-length="[6,25]"
                                        />
                                        <?= form_error('form[password]') ?>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Re Type Password</label>
                                        <input type="password" class="form-control"
                                               placeholder="Re Type Password"
                                               data-parsley-equalto="#password"
                                               data-parsley-length="[6,25]"
                                        />
                                        <?= form_error('form[re_type_password]') ?>
                                    </fieldset>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Customize User Privileges</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" > 
                                                <div class="checkbox checkbox-inline checkbox-inverse">
                                                            <input type="hidden"    name="form[type]"  value="0" >
                                                            <input type="checkbox" <?= $result->type == 1 ? "checked":"" ?>  name="form[type]" id="type" value="1" >
                                                            <label for="all">  Administrative User </label>
                                                            <small class="text-muted"> admin user can do all
                                                    </small>

                                                    </div>
                                            </td>
                                        </tr>
                                        <?php $user_methods =  $result->type == 1 ? [] : json_decode($result->role,true); ?>
                                        <?php foreach ($controllers as $key => $controller) : ?>
                                            <tr>
                                                <td class="middle-align"><div class="form-group-1">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="<?= url_title($controller->name) ?>" type="checkbox" <?= isset($user_methods[$controller->name])  ?"checked":"" ?> >
                                                            <label for="<?= url_title($controller->name) ?>"> <?= $controller->name ?> </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-lg-12 col-sm-3 col-xs-12 col-md-12 col-xl-12">
                                                        <?php $methods =  json_decode($controller->methods,true); ?>
                                                        <?php foreach ($methods  as $key => $method) : ?>
                                                            <div class="checkbox checkbox-inline">
                                                                <input type="checkbox" <?= in_array( $method , $user_methods[$controller->name]) ?"checked":"" ?> name="methods[<?= $controller->name ?>][]" id="<?= url_title($controller->name."-".$method) ?>"  value="<?= $method ?>" >
                                                                <label for="<?= url_title($controller->name."-".$method) ?>"> <?= $method ?> </label>
                                                            </div>
                                                        <?php  endforeach; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" > Save </button>

                    <?= form_close() ?>
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
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>