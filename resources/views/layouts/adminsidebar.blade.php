<nav id="adminnav" class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" id ="adminnav" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <b class=""></b>
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?user_profile="><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Products
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_customers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Customeres
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_cats"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Đăng Xuất
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
    
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="{{url('admin/dashboard')}}"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Sản Phẩm
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/insert_product')}}">     <i class="glyphicon glyphicon-plus"></i> &nbsp Thêm mới sản phẩm </a>        
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/view_products')}}">   <i class="glyphicon glyphicon-th-list"></i> &nbsp Danh Sách sản phẩm </a> 	
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#manufacturer"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-star"></i> Hãng Sản Xuất
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="manufacturer" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/insert_hang')}}"> <i class="glyphicon glyphicon-plus"></i> &nbsp Thêm Hãng Sản Xuất </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/view_hang')}}">   <i class="glyphicon glyphicon-th-list"></i> &nbsp Danh Sách Hãng Sản Xuất </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-edit"></i> Danh Mục Sản Phẩm
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="p_cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/insert_p_type')}}"> <i class="glyphicon glyphicon-plus"></i> &nbsp Thêm Danh Mục</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/view_p_type')}}">  <i class="glyphicon glyphicon-th-list"></i> &nbsp Danh Sách Danh Mục</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-book"></i> Quản lý Size
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/insert_size')}}"><i class="glyphicon glyphicon-plus"></i> &nbsp Thêm Size </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/view_size')}}">  <i class="glyphicon glyphicon-th-list"></i>  &nbsp Danh Sách Các Size </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="slides" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/insert_slider')}}"><i class="glyphicon glyphicon-plus"></i> &nbsp Thêm Slide </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="{{url('admin/view_slider')}}"> <i class="glyphicon glyphicon-th-list"></i> &nbsp Xem Slides </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#boxes"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dropbox"></i> Boxes
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="boxes" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_box"><i class="glyphicon glyphicon-plus"></i> &nbsp Thêm Box </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_boxes">  <i class="glyphicon glyphicon-th-list"></i> &nbsp Xem Boxes </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            
            
            
            
            <li><!-- li begin -->
                <a href="{{url('admin/view_user')}}"><!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> Xem Khách Hàng
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    <i class="fa fa-fw fa-book"></i> Xem Đơn Hàng
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
           
            
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Admin
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_user"> <i class="glyphicon glyphicon-plus"></i>  &nbsp Thêm Admin </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_users">  <i class="glyphicon glyphicon-th-list"></i> &nbsp Xem Admin </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Đăng Xuất
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->