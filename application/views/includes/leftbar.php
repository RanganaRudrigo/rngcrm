<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="<?= base_url('') ?>" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                        <span> Master </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Customer </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('customer/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('customer') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Technician </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('technician/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('technician') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Courier </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('courier/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('courier') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Supplier </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('supplier/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('supplier') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Repair Mode </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('repair_mode/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('repair_mode') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-cube "></i>
                        <span> Stock Management </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Item Type </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('stock/item_type/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('stock/item_type') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Brand </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('stock/item_brand/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('stock/item_brand') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Model </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('stock/item_model/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('stock/item_model') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Item  </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('stock/item/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('stock/item') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li> 
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-truck"></i>
                                <span> Purchase </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('purchase/create') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('purchase') ?>"><span> Manage </span></a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-arrow-down"></i>
                                <span> Customer Item </span></a>
                                <ul style="">
                                    <li><a href="<?= base_url('Customer/item_load') ?>"><span> Add   </span></a></li>
                                    <li><a href="<?= base_url('Customer/item_load_manage') ?>"><span> Manage  </span></a></li>
                                </ul>

                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <i class="fa fa-arrow-down"></i>
                                <span> Technician Take Out </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('technician/item_takeout') ?>"><span> Add   </span></a></li>
                                <li><a href="<?= base_url('technician/takeout_remove') ?>"><span> Manage  </span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('technician/item_return') ?>" class="waves-effect">
                                <span>Technician Return </span>  </a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-steam"></i>
                        <span> JOB </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> JOB Order </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('joborder/') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('joborder/jobList') ?>"><span>Manage</span></a></li>
                                <li><a href="<?= base_url('joborder/quotation_job') ?>"><span>Pending Quotation</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span>Job Order To Technician </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('joborder/passToTechnician') ?>"><span> Add </span></a></li>
                                <li><a href="<?= base_url('joborder/passToTechnician/remove') ?>"><span> Remove </span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span>Printer Job Close </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('joborder/printer_job_close_with_part') ?>"><span>With Part</span></a></li>
                                <li><a href="<?= base_url('joborder/printer_job_close_without_part') ?>"><span>Without Part</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span>Toner Job Close </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('joborder/toner_job_close_with_part') ?>"><span>Replace Toner</span></a></li>
                                <li><a href="<?= base_url('joborder/toner_job_close_without_part') ?>"><span>Without Part</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> Service </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('joborder/service') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('joborder/service/list') ?>"><span>List</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-paper-airplane"></i>
                        <span> Delivery Department  </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> New Job Order </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('courier/new_request') ?>"><span>Pass To Courier</span></a></li>
                                <li><a href="<?= base_url('courier/new_request/list') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> Job Order Arrived </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('courier/order_arrived') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('courier/order_arrived/list') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> Job Order Complete </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('courier/new_complete_request') ?>"><span>Pass To Courier</span></a></li>
                                <li><a href="<?= base_url('courier/new_complete_request/list') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('courier/item_handover') ?>" class="waves-effect">
                                <span> Job Order Handover </span> <span
                                    class="menu-arrow"></span> </a> 
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span> Backup Items </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('courier/item_replace_handover') ?>"><span>Create</span></a></li>
                                <li><a href="<?= base_url('courier/item_replace_handover/list') ?>"><span>Manage</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bank"></i>
                        <span> InHouse Department  </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="<?= base_url('in_house/passToTechnician') ?>" class="waves-effect">
                                <span>Job Order To Technician </span> <span
                                    class="menu-arrow"></span> </a>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span>Printer Job Close </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('in_house/printer_job_close_with_part') ?>"><span>With Part</span></a></li>
                                <li><a href="<?= base_url('in_house/printer_job_close_without_part') ?>"><span>Without Part</span></a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect">
                                <span>Toner Job Close </span> <span
                                    class="menu-arrow"></span> </a>
                            <ul style="">
                                <li><a href="<?= base_url('in_house/toner_job_close_with_part') ?>"><span>Replace Toner</span></a></li>
                                <li><a href="<?= base_url('in_house/toner_job_close_without_part') ?>"><span>Without Part</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
				<li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="zmdi zmdi-receipt"></i><span> Reports </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li  >
                            <a href="<?= base_url('report/stock_balance') ?>" class="waves-effect">
                                <span> Stock Balance </span>  </a>
                        </li>
                         <li  >
                            <a href="<?= base_url('report/technician_hand') ?>" class="waves-effect">
                                <span> Technician Hand </span>  </a>
                        </li>
                        <li  >
                            <a href="<?= base_url('report/job_order') ?>" class="waves-effect">
                                <span> Job Order </span>  </a>
                        </li>
                        <li  >
                            <a href="<?= base_url('report/purchase_report') ?>" class="waves-effect">
                                <span> Purchase Report </span>  </a>
                        </li>
                        <li  >
                            <a href="<?= base_url('report/Issuing_Parts_Report') ?>" class="waves-effect">
                                <span> Issuing Parts Report </span>  </a>
                        </li>
                        <li  >
                            <a href="<?= base_url('report/Return_Parts_Report') ?>" class="waves-effect">
                                <span> Return Parts Report</span>  </a>
                        </li>
                        <li  >
                            <a href="<?= base_url('report/Replacement_Toners_Report') ?>" class="waves-effect">
                                <span>Replacement Toners Report</span>  </a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="fa fa-user"></i>
                        <span> User </span> <span
                            class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li  >
                            <a href="<?= base_url('user/create')  ?>" class="waves-effect">
                                <span> Create </span>  </a>
                        </li> 
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="fa fa-trash"></i><span> Trash </span> </a>
                    <ul class="list-unstyled" >
                        <li class="has_sub" >
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                                <span> Master </span> <span class="menu-arrow"></span></a> 
                            <ul class="list-unstyled">
                                <li  >
                                    <a href="<?= base_url('trash/customer')  ?>" class="waves-effect">
                                        <span> Customer </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/technician')  ?>" class="waves-effect">
                                        <span> Technician </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/courier')  ?>" class="waves-effect">
                                        <span> Courier </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/supplier')  ?>" class="waves-effect">
                                        <span> Supplier </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/repair_mode')  ?>" class="waves-effect">
                                        <span> Supplier </span>  </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has_sub" >
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-cube "></i>
                                <span> Stock Manage </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li  >
                                    <a href="<?= base_url('trash/item_type')  ?>" class="waves-effect">
                                        <span> Item Type </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/item_brand')  ?>" class="waves-effect">
                                        <span> Item Brand </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/item_model')  ?>" class="waves-effect">
                                        <span> Item Type </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/item')  ?>" class="waves-effect">
                                        <span> Item </span>  </a>
                                </li>
                                <li  >
                                    <a href="<?= base_url('trash/purchase')  ?>" class="waves-effect">
                                        <span> Purchase </span>  </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div><!--- Sidemenu -->
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->