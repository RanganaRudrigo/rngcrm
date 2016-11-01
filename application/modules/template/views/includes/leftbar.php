<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="<?= base_url('template') ?>" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                        <span> Master </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_customer')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Customer </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_technician')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Technician </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_courier')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Courier </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_supplier')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Supplier </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_repair_mode')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> Repair Mode </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_user')  ?>" class="waves-effect">
                                <i class="ion ion-clipboard"></i>
                                <span> User </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('template/home/master_customer') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                        <span> Stock Management </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/stock_model') ?>" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Model </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/stock_brand') ?>" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> Brand </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/stock_type') ?>" class="waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span>Item Type </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/master_product_item') ?>" class="waves-effect">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Item Master</span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_purchase') ?>" class="waves-effect">
                                <i class="fa fa-truck"></i>
                                <span> Purchase </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_technician_takeout') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span> Technician Take Out</span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_customer_item') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span> Load Item To Customer </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_technician_return') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span>Technician Return </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                        <span> JOB </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_order') ?>" class="waves-effect">
<!--                                <i class=""></i>-->
                                <span> JOB Order </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_order_technician') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span>Job Order To Technician </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_without_parts') ?>" class="waves-effect"> 
                                <span>Job Order Close </span> <span
                                    class="menu-arrow"></span> </a> 
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_close_toner') ?>" class="waves-effect"> 
                                <span>Toner Job Close </span> <span
                                    class="menu-arrow"></span> </a> 
                        </li>
                    </ul>
                </li>
                <li class="has_sub"
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-briefcase"></i>
                        <span> InHouse Department  </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_order') ?>" class="waves-effect">
                                <!--                                <i class=""></i>-->
                                <span> JOB Order </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/transaction_job_order_technician') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span>Job Order To Technician </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                        <li class="has_sub">
                            <a href="<?= base_url('template/home/inhouse_job_without_parts') ?>" class="waves-effect">
                                <!--<i class=""></i>-->
                                <span>Job Order Close </span> <span
                                    class="menu-arrow"></span> </a>
                            <!--<ul style="">
                                <li><a href="<?/*= base_url('size/create') */?>"><span>Create</span></a></li>
                                <li><a href="<?/*= base_url('size') */?>"><span>Manage</span></a></li>
                            </ul>-->
                        </li>
                    </ul>
                </li>
				<li class="has_sub">
                    <a href="<?= base_url('template') ?>" class="waves-effect">
                        <i class="zmdi zmdi-receipt"></i><span> Reports </span> </a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div><!--- Sidemenu -->
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->