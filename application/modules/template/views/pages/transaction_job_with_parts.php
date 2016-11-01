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
                        <h4 class="page-title">Transaction - Job with Parts</h4>
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
           
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                <h4 class="header-title m-t-0 m-b-30">Filter Option</h4> 
               
                
                <fieldset class="form-group">
              <label for="exampleInputEmail1">Search</label>
              <input type="text" class="form-control" name="form[search]" id="search" 
                                            value="<?= $result->search?>"
                                            <?= form_error('form[search]') ?>
                                                   placeholder="Search">
                <small class="text-muted">Job Order No. / Technician / Handover Date
                                                    </small>
            </fieldset>
                
                 <button type="submit" class="btn btn-primary">Reset</button> 
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                 <h4 class="header-title m-t-0 m-b-30">Select Job to Technician</h4>
                <fieldset class="form-group">
                <div class="select-item-box">
                  <table class="table">
                                                    <thead class="thead-default">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Job Order No</th>
                                                        <th>Technician</th>
                                                        <th>Handover Date & Time</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>OSO156</td>
                                                        <td>Seylan - Batticaloa</td>
                                                        <td>16-june -2016 : 1.00 pm</td>
                                                    </tr>
                                                     <tr>
                                                        <th scope="row">2</th>
                                                        <td>OSO156</td>
                                                        <td>Seylan - Batticaloa</td>
                                                        <td>16-june -2016 : 1.00 pm</td>
                                                    </tr>
                                                     <tr>
                                                        <th scope="row">3</th>
                                                        <td>OSO156</td>
                                                        <td>Seylan - Batticaloa</td>
                                                        <td>16-june -2016 : 1.00 pm</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                </div>
                 
                </fieldset>
              
              </div>
            </div>
            </div>
            
            <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">General Information</h4>
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                
              
                
                <fieldset class="form-group">
              <label for="exampleInputEmail1">Job Date</label>
              <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                                                    </div>
            </fieldset>
        
            
            <fieldset class="form-group job-order-1">
            
            
            
              <label for="exampleInputEmail1">Start Time</label>
             <div class="input-group clockpicker m-b-20">
													<input type="text" class="form-control" value="09:30">
													<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
												</div>
             
            </fieldset>
            
            <fieldset class="form-group job-order-2 ">
              <label for="exampleInputEmail1">End Time</label>
             <div class="input-group clockpicker m-b-20">
													<input type="text" class="form-control" value="09:30">
													<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
												</div>
            </fieldset>
            
                      
            <fieldset class="form-group">
                  <label for="exampleInputEmail1">Parts Used For</label>
                                    
                   <select class="form-control code-1"  name="form[parts_used_for]" id="parts_used_for" >
                                                        <option>--------Select---------</option>
                                                        <option>Parts Used For</option>
                                                        <option>Parts Used For</option>
                                                        <option>Parts Used For</option>
                                                        <option>Parts Used For</option>
                                                    </select>
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