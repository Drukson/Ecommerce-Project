@php
    $route = Route::current()->getName();
    $prefix = Request::route()->getPrefix();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>SHINE</b> SHOP</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ ($route == 'dashboard') ? 'active':'' }}">
                <a href="{{url('/admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{($route == 'all_sellers') ? 'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Sellers</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route == 'all_sellers') ? 'active':''}}">
                        <a href="{{route('all_sellers')}}"><i class="ti-more"></i>All Sellers</a></li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.slider') ? 'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route == 'all.slider') ? 'active':''}}">
                        <a href="{{route('all.slider')}}"><i class="ti-more"></i>All Sliders</a></li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.sponsors') ? 'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Partners</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route == 'all.sponsors') ? 'active':''}}">
                        <a href="{{route('all.sponsors')}}"><i class="ti-more"></i>All Sponsors</a></li>

                </ul>
            </li>

            <li class="treeview {{($route == 'all.category') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.category') ? 'active':''}}">
                        <a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{($route == 'all.subcategory') ? 'active':''}}">
                        <a href="{{route('all.subcategory')}}"><i class="ti-more"></i>Sub Category</a>
                    </li>
                    <li class="{{($route == 'all.subsubcategory') ? 'active':''}}">
                        <a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>Sub Sub Category</a></li>
                    <li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.dzongkhag') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Dzongkhags</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.dzongkhag') ? 'active':''}}">
                        <a href="{{route('all.dzongkhag')}}"><i class="ti-more"></i>All Dzongkhags</a></li>
                    <li class="{{($route == 'all.gewog') ? 'active':''}}">
                        <a href="{{route('all.gewog')}}"><i class="ti-more"></i>Gewog</a>
                    </li>
                    <li class="{{($route == 'all.village') ? 'active':''}}">
                        <a href="{{route('all.village')}}"><i class="ti-more"></i>Village</a></li>
                    <li>
                </ul>
            </li>

            <li class="treeview {{($route == 'division_view') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Shipping Area</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'division_view') ? 'active':''}}">
                        <a href="{{route('division_view')}}"><i class="ti-more"></i>Dzongkhags</a></li>
                    <li class="{{($route == 'subdistrict_view') ? 'active':''}}">
                        <a href="{{route('subdistrict_view')}}"><i class="ti-more"></i>Places</a>
                    </li>
                    <li class="{{($route == 'all.subsubcategory') ? 'active':''}}">
                        <a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>Sub Sub Category</a></li>
                    <li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.agroproducts') ? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Agro Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.agroproducts') ? 'active':''}}">
                        <a href="{{route('all.agroproducts')}}"><i class="ti-more"></i>Add Agro Products</a></li>
                    <li class="{{($route == 'manage.agroproducts') ? 'active':''}}">
                    <li><a href="{{route('manage.agroproducts')}}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.homestay') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Homestay</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.homestay') ? 'active':''}}">
                        <a href="{{route('all.homestay')}}"><i class="ti-more"></i>Manage Homestay</a></li>
                    <li class="{{($route == 'manage.homestay') ? 'active':''}}">
                        <a href="{{route('manage.homestay')}}"><i class="ti-more"></i>Add Homestay</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{($route == 'all.handicraft') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Handicrafts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.handicraft') ? 'active':''}}">
                        <a href="{{route('all.handicraft')}}"><i class="ti-more"></i>Manage Handicrafts</a></li>
                    <li class="{{($route == 'add.handicraft') ? 'active':''}}">
                        <a href="{{route('add.handicraft')}}"><i class="ti-more"></i>Add Handicrafts</a>
                    </li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
