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
                                <a href="<?= base_url('technician') ?>">Technician</a>
                            </li>
                            <li class="active">
                                Manage
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row" >
                        <div class="col-lg-12" >
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Technician Details</h4>
                                <h5> <?= $technician->title.$technician->technicianName ?> - <?= $technician->tec_code ?> </h5>
                                <p>ADDRESS: <?= $technician->address ?> </p>
                                <p>EMAIL: <?= $technician->email ?> </p>
                                <p>TEL NO: <?= $technician->tel_no ?> </p>
                                <p>MOB NO: <?= $technician->mob_no ?> </p>
                                <p>PERSONAL EMAIL: <?= $technician->personal_email ?> </p>
                                <p>PERSONAL MOB NO: <?= $technician->personal_mob_no ?> </p>
                                <p>PERSONAL TEL NO: <?= $technician->personal_tel_no ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Item Details</h4>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <table  class=" table table-striped " >
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Item Code </th>
                                        <th> Item Name </th>
                                        <th> Qty </th>
                                        <th> Serial No  </th>
                                        <th> Damage Qty  </th>
                                        <th> Damage Item Serial No  </th>
                                        <th> Action  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $k => $row): ?>
                                        <tr>
                                            <td> <?= $k+1 ?>  </td>
                                            <td> <?= $row->ITEM->ItemCode ?> </td>
                                            <td><?= $row->ITEM->ItemName  ?> </td>
                                            <td> <?= $row->Qty ?> </td>
                                            <td> <?php
                                                $s= [];
                                                if(empty($row->SerialList))
                                                    echo "-";
                                                else
                                                    foreach ($row->SerialList as $k => $serial ){
                                                        $s[] = $serial->SerialNo;
                                                        echo ($k == 0 ?"":"&nbsp;,").$serial->SerialNo;
                                                    }
                                                ?>
                                            </td>
                                            <td> <?= count($row->DamageItems) ?> </td>
                                            <td> <?php
                                                $d = [];
                                                if(empty($row->DamageItems))
                                                    echo "-";
                                                else
                                                    foreach ($row->DamageItems as $k => $serial ){
                                                        $d[] = $serial->OldSerial;
                                                        echo ($k == 0 ?"":"&nbsp;,").$serial->OldSerial;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning remove_item " data-item-id="<?= $row->ITEM->ItemId ?>" data-item-has-serial-no="<?= $row->ITEM->has_serial ?>" data-qty="<?= $row->Qty ?>" data-serial="<?= htmlentities(json_encode($s)) ?>" data-damage-serial="<?= htmlentities(json_encode($d)) ?>"      > Return </a>
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
</div><!-- End content-page -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php $this->view( 'includes/footer_start.php') ?>
<!-- extra js start -->
<!-- extra js end -->
<?php $this->view( 'includes/footer_end.php') ?>
<div id="serial_list" class="hidden">
    <form method="post" >
        <?= form_hidden("TechnicianId",$technician->TechnicianId) ?>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th> Serial No </th>
        </tr>
        </thead>
        <tbody> </tbody>
    </table>
    <button class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button type="button" class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    </form>
    <div class="clearfix"></div>
</div>
<div id="item_qty" class="hidden">
    <form method="post" >
        <?= form_hidden("TechnicianId",$technician->TechnicianId) ?>
    <table class="table table-bordered">
        <tbody><tr>
            <th> Qty </th>
            <td> <input type="number" value="" name="qty" class="number-only form-control">  </td>
        </tr>
        </tbody></table>
    <button class="btn btn-primary pull-right m_b_10 "> OK </button>
    <button type="reset" class="btn btn-danger pull-right m_b_10 m_r_10 close_model"> Cancel </button>
    </form>
    <div class="clearfix"></div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
       $(".remove_item").click(function (e) {
           e.preventDefault();
           var $this = $(this);

           var hasSerialNo = $this.data('itemHasSerialNo');
           if(hasSerialNo){
               var serialNo = $this.data('serial') ;
               var damageSerial = $this.data('damageSerial') ;
               var serial_template = $("#serial_list").clone() ,table = serial_template.find('table');
               serial_template.find("form").append($("<input>").attr({
                   type :"hidden",
                   name : "ItemId",
                   value : $this.data("itemId")
               }));
               serial_template.find("form").append($("<input>").attr({
                   type :"hidden",
                   name : "qty",
                   value : $this.data("qty")
               }));
               serial_template.find("form").append($("<input>").attr({
                   type :"hidden",
                   name : "damageQty",
                   value : damageSerial.length
               }));
               for(var i in serialNo ){
                   $("<tr>").append(
                       "<td> <label> " +
                       serialNo[i]  +
                       "  <input type='checkbox'   name='serial_list[]' value='"+serialNo[i]+"' >  "+
                       "</label>" +
                       " </td>"
                   ).appendTo(table.find('tbody'));
               }
               for(var i in damageSerial ){
                   $("<tr>").append(
                       "<td> <label> " +
                       damageSerial[i]  +
                       "  <input type='checkbox'   name='damageSerial[]' value='"+damageSerial[i]+"' >  "+
                       "</label>" +
                       " </td>"
                   ).appendTo(table.find('tbody'));
               }
               ajaxModel.show( 'Serial No(s)', serial_template.html() , {dialogSize: 'sm' });
           }else{
               var qty_template = $("#item_qty").clone();
               qty_template.find("form").append($("<input>").attr({
                   type :"hidden",
                   name : "ItemId",
                   value : $this.data("itemId")
               }));
               qty_template.find('input[type=number]').attr('max',$this.data('qty') );
               ajaxModel.show( 'Quantity', qty_template.html() , {dialogSize: 'sm' });
           }
       });
    });
</script>