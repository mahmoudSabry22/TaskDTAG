<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Departments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('dep.create') }}"><i class="fa fa-plus"></i>Create Department</a></li>
                    <li><a href="{{ route('dep.index') }}"><i class="fa fa-list"></i>Show All Departments</a></li>
                </ul>
            </li>
            

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.create') }}"><i class="fa fa-plus"></i>Create Product</a></li>
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-list"></i>Show All Product</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
