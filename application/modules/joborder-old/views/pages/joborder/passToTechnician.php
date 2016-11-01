<?php $this->view('includes/header_start.php'); ?>
<!-- extra css start -->
<link href="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/buttons.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/plugins/datatables/responsive.bootstrap4.min.css") ?>" rel="stylesheet" type="text/css" />
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
                        <h4 class="page-title">Transaction - Job Order to Technician</h4>
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


            
                 
        <?= form_open() ?>
<div class="row">
          <div class="col-lg-12">
            <div class="card-box">
                 <h4 class="header-title m-t-0 m-b-30">Select Job Order Number</h4>
                <div class="select-item-box">
                  <table class="table" id='datatable'>
                    <thead class="thead-default">
                    <tr>
                        <th>#</th>
                        <th>Job Order No</th>
                        <th>Customer</th>
                        <th>Complan Date</th>
                    </tr>
                    </thead> 
                    <tbody>
                      <?php foreach ($records as $k => $row): ?>
                          <tr>
                              <td> <?= $k+1 ?>  </td>  
                              <td> <?= $row->jobOrderNo ?> </td> 
                              <td> <?= $row->company ?> </td>
                              <td> <?= $row->ComplainDate ?> </td> 
                          </tr>
                      <?php endforeach; ?>
                      </tbody> 
                  </table>
                </div>              
             </div>             
          </div>
 
              <div class="col-lg-6">
            
            <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">General Information</h4>
            
                
              
                
                <fieldset class="form-group">
              <label for="exampleInputEmail1">Technician Name</label>
              <input type="text" class="form-control" id="technician-search" 
                                            value="<?= $result->technician_name?>" 
                                                   placeholder="Technician Name">
              <input type="hidden"  name="form[TechnicianId]" id="TechnicianId" >
             <?= form_error('form[technician_name]') ?>                                      
            </fieldset>
        
            
            <fieldset class="form-group job-order-1">
            
            
            
              <label for="exampleInputEmail1">Handover Date</label>
              <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                                                    </div>
             
            </fieldset>
            
            <fieldset class="form-group job-order-2 ">
              <label for="exampleInputEmail1">Handover  Time</label>
             <div class="input-group clockpicker m-b-20">
													<input type="text" class="form-control" value="09:30">
													<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
												</div>
            </fieldset>
            
                      
             
                
               <fieldset class="form-group">
                  <label for="exampleInputEmail1">Note of Any</label>
                                
                   <textarea class="form-control"  rows="3" name="form[note_of_any]" id="note_of_any" value="<?= $result->note_of_any?>"
                   <?= form_error('form[note_of_any]') ?> placeholder="Note of Any"></textarea>
                </fieldset>
             <button type="submit" class="btn btn-primary">Add</button> 
              </div>
            </div>
            </div>
            </div>
         <?= form_close() ?>
        
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
<script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/plugins/datatables/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("js/autocomplete.min.js") ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable(); 
         $('#technician-search').autocomplete({
                'source': function(request, response) {
                    if(request.length){
                        $.ajax({
                            url: Api+"technician/autocomplete",
                            data:{str: request},
                            dataType: 'json',
                            success: function(json) {
                                response($.map(json, function(item) {
                                    return {
                                        label:   item['technicianName']  ,
                                        value: item
                                    }
                                }));
                            }
                        });
                    }
                },
                'select': function(json) { 
                     $('#technician-search').val(json['value']['technicianName']);
                     $('#TechnicianId').val(json['value']['TechnicianId']);
                     

                }
            });
    });
</script>
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>
