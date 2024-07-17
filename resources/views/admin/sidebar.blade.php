<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="<?= $pageTitle == 'Dashboard' ? 'active-link' : '';?>">
                        <a href="{{url('admin/dashboard')}}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></a>
                    </li>
                   

                    <li class="<?= $pageTitle == 'Post' ? 'active-link' : '';?>">
                        <a href="{{url('admin/post')}}"><i class="fa fa-table "></i>Posts  <span class="badge"></a>
                    </li>
                    <li class="<?= $pageTitle == 'Category' ? 'active-link' : '';?>">
                        <a href="{{url('admin/category')}}"><i class="fa fa-edit "></i>Categories  <span class="badge"></a>
                    </li>
                    <li class="<?= $pageTitle == 'Users' ? 'active-link' : '';?>">
                        <a href="{{url('admin/users')}}"><i class="fa fa-user "></i>Users  <span class="badge"></a>
                    </li>



                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->