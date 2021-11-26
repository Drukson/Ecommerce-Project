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
                <a href="{{url('/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{--SITE SETTINGS LIKE LOGO UPDATES, FOOTER ETC--}}
            @if(strpos(strtolower(Session::get('user_details')['role_name']),'admin')!==false)

                <li class="treeview {{($route == 'all_settings') ? 'active':''}}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Manage Settings</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="{{($route == 'all_settings') ? 'active':''}}">
                            <a href="{{route('all_settings')}}"><i class="ti-more"></i>All Settings</a></li>
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

            {{--END SITE SETTINGS LIKE LOGO UPDATES, FOOTER ETC--}}
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
                    {{--<li class="{{($route == 'all.subsubcategory') ? 'active':''}}">
                        <a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>Sub Sub Category</a></li>
                    <li>--}}
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

                </ul>
            </li>

            {{--COUPON CODE--}}
            <li class="treeview {{($route == 'manage-coupon') ? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupon Code</span>
                    <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-coupon') ? 'active':''}}">
                        <a href="{{route('manage-coupon')}}"><i class="ti-more"></i>Add Coupon</a></li>

                </ul>
            </li>
            {{--COUPON CODE--}}

            {{-- //ALL USER REPORTS--}}
            <li class="treeview {{($route == 'all.users') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>All Users</span>
                    <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.users') ? 'active':''}}">
                        <a href="{{route('all.users')}}"><i class="ti-more"></i>All Users</a>
                    </li>
                </ul>
            </li>
            {{-- //END ALL USER REPORTS--}}
            @endif

                <li class="treeview {{($route == 'all.agroproducts') ? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Product Details</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.agroproducts') ? 'active':''}}">
                        <a href="{{route('all.agroproducts')}}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{($route == 'manage.agroproducts') ? 'active':''}}">
                    <li><a href="{{route('manage.agroproducts')}}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>
            {{--MANAGE STOCKS--}}
            <li class="treeview {{($route == 'product.stock') ? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Stocks</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'product.stock') ? 'active':''}}">
                        <a href="{{route('product.stock')}}"><i class="ti-more"></i>Stocks</a></li>

                </ul>
            </li>
            {{--END MANAGE STOCKS--}}

            {{--ORDERS--}}
           <li class="treeview {{($route == 'pending-orders') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>All Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'pending-orders') ? 'active':''}}">
                        <a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a>
                    </li>
                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}">
                        <a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}">
                        <a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}">
                        <a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>

                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}">
                        <a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>

                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}">
                        <a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

                    <li class="{{ ($route == 'cancel-orders')? 'active':'' }}">
                        <a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>
                </ul>
            </li>

           {{-- //ADMIN REPORTS--}}
            <li class="treeview {{($route == 'all.reports') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>All Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.reports') ? 'active':''}}">
                        <a href="{{route('all.reports')}}"><i class="ti-more"></i>All Reports</a>
                    </li>

                </ul>
            </li>
           {{-- //END ADMIN REPORTS--}}

            {{-- //RETURN PRODUCTS--}}
            <li class="treeview {{($route == 'return.request') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Return Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'return.request') ? 'active':''}}">
                        <a href="{{route('return.request')}}"><i class="ti-more"></i>Returned Orders</a>
                    </li>
                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}">
                            <i class="ti-more"></i>All Request</a></li>
                </ul>
            </li>
            {{-- //END RETURN PRODUCTS--}}

            {{-- //REVIEWS--}}
            <li class="treeview {{($route == 'pending.review') ? 'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Review</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending.review')? 'active':'' }}">
                        <a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>

                    <li class="{{ ($route == 'publish.review')? 'active':'' }}">
                        <a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>
                </ul>
            </li>
            {{-- //REVIEWS--}}

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
