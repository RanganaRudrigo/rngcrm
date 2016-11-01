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
                        <h4 class="page-title">Technician</h4>
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
            <h4 class="header-title m-t-0 m-b-30">General Information</h4>
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                
                <fieldset class="form-group">
                 <div class="name-1">
                                <label for="exampleInputEmail1 ">Area Code</label>
                                    
                                    <select class="form-control" id="exampleSelect1">

                                        <option>CC</option>
                                        <option>CS</option>
                                        <option>CN</option>
                                        <option>OS</option>
                                        
                                    </select>
                                
                                </div>
                     <div class="name-2">
                       <label for="exampleInputEmail1">Tec Code</label>
                  <input type="text" class="form-control code-1" name="form[tec_code]" id="tec_code"  value="<?= $result->tec_code?>"
                   <?= form_error('form[tec_code]') ?> placeholder="Tec Code">
                     
                     </div>           
                                
                
                </fieldset>
                
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <div class="clear"></div> 
                  <select class="form-control name-1" name="form[title]"  id="title">                  
                                                        <option>Mr.</option>
                                                        <option>Miss.</option>
                                                        <option>Mrs.</option>
                                                        <option>Master.</option>
                                                        <option>Ms.</option>
                                                    </select>
                   
                   
                   
                  <input type="text" class="form-control name-2" name="form[contact_person]" id="contact_person"  value="<?= $result->contact_person ?>"
                   <?= form_error('form[contact_person]') ?> placeholder="Name">
                </fieldset>
                
                 <fieldset class="form-group">
             <!-- <label for="exampleInputEmail1">Area</label>
              <input type="text" class="form-control" name="form[area]" id="area" 
                                            value="<?/*= $result->area*/?>"
                                            <?/*= form_error('form[area]') */?>
                                                   placeholder="Area">-->
            </fieldset>
            
              </div>
            </div>
            </div>
            <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Contact Information</h4>
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
              <fieldset class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                                
                   <textarea class="form-control" id="exampleTextarea" rows="3" name="form[address]" id="address" value="<?= $result->address?>"
                   <?= form_error('form[address]') ?> placeholder="Address"></textarea>
                </fieldset>
                
                
                 <fieldset class="form-group">
              <label for="exampleInputEmail1">Telephone No</label>
              <input type="text" class="form-control" name="form[tel_no]" id="tel_no" 
                                            value="<?= $result->tel_no?>"
                                            <?= form_error('form[tel_no]') ?>
                                                   placeholder="Telephone No">
            </fieldset>
            
            
             <fieldset class="form-group">
              <label for="exampleInputEmail1">Mobile No</label>
              <input type="text" class="form-control" name="form[mob_no]" id="mob_no" 
                                            value="<?= $result->mob_no?>"
                                            <?= form_error('form[mob_no]') ?>
                                                   placeholder="Mobile No">
            </fieldset>
            
            
             <fieldset class="form-group">
              <label for="exampleInputEmail1">Fax No</label>
              <input type="text" class="form-control" name="form[fax_no]" id="fax_no" 
                                            value="<?= $result->fax_no?>"
                                            <?= form_error('form[fax_no]') ?>
                                                   placeholder="Fax No">
            </fieldset>
            
            <fieldset class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="form[email]" id="email" 
                                            value="<?= $result->email?>"
                                            <?= form_error('form[email]') ?>
                                                   placeholder="Email">
            </fieldset>
            
           
            </div>
            </div>
            </div>
            <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Personal Information</h4>
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
              
                
              
            
            
             <fieldset class="form-group">
              <label for="exampleInputEmail1"> Mobile No</label>
              <input type="text" class="form-control" name="form[personal_mob_no]" id="personal_mob_no" 
                                            value="<?= $result->personal_mob_no?>"
                                            <?= form_error('form[personal_mob_no]') ?>
                                                   placeholder=" Mobile No">
            </fieldset>
              
                 <fieldset class="form-group">
              <label for="exampleInputEmail1"> Telephone No</label>
              <input type="text" class="form-control" name="form[personal_tel_no]" id="personal_tel_no" 
                                            value="<?= $result->personal_tel_no?>"
                                            <?= form_error('form[personal_tel_no]') ?>
                                                   placeholder=" Telephone No">
            </fieldset>
            
                     
            <fieldset class="form-group">
              <label for="exampleInputEmail1"> Email</label>
              <input type="email" class="form-control" name="form[personal_email]" id="personal_email" 
                                            value="<?= $result->personal_email?>"
                                            <?= form_error('form[personal_email]') ?>
                                                   placeholder=" Email">
            </fieldset>
            
            <button type="submit" class="btn btn-primary">Add</button>
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
