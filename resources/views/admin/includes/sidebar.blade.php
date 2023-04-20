<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span>Main</span>
                </li>

                <li class="{{ Request::is('admin/dashboard*') ? 'active' : ' ' }}">
                    <a href="{{ route('admin.dashboard') }}" ><i class="la la-dashboard"></i> <span>Dashboard</span></a>                 
                </li>

                <li class="submenu">
                    <a href="#" class="{{ Request::is('admin/profile*') || Request::is('admin/password*') || Request::is('admin/detail*') ? 'active' : ' ' }}"><i class="la la-user-cog"></i> <span>Manage Account </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ Request::is('admin/profile*') ? 'active' : ' ' }}">
                            <a href="{{ route('admin.profile') }}">My Profile</a>
                        </li>
                        <li class="{{ Request::is('admin/password*') ? 'active' : ' ' }}">
                            <a href="{{ route('admin.password') }}">Change Password</a>
                        </li>
                                  
                    </ul>
                </li>
                <li class="menu-title">
                    <span>User Mangement</span>
                </li>
                <li class="{{ Request::is('admin/customers*') ? 'active' : ' ' }}">
                    <a href="{{ route('customers.index') }}" ><i class="la la-users"></i> <span>Manage User</span></a>                 
                </li>

                <li class="menu-title">
                    <span>Order Mangement</span>
                </li>
                <li class="{{ Request::is('admin/orders/list*') || Request::is('admin/orders/view*') ? 'active' : ' ' }}">
                    <a href="{{ route('orders.index') }}" ><i class="la la-shopping-cart"></i>  <span> Orders</span><span></span></a>                 
                </li>
                <li class="{{ Request::is('admin/orders/hold-order*') || Request::is('admin/orders/edit*') ? 'active' : ' ' }}">
                    <a href="{{ route('orders.hold') }}" ><i class="la la-shopping-bag"></i>  <span>Hold Orders</span><span></span></a>                 
                </li>
                <li class="menu-title"> 
                    <span>Others</span>
                </li>
                <li class="{{ Request::is('admin/enquiry*')  ? 'active' : ' ' }}">
                    <a href="{{ route('enquiry.index') }}" ><i class="la la-question"></i>  <span> Hotel Enquiries</span><span></span></a>                 
                </li>
                <li class="{{ Request::is('admin/callback*')  ? 'active' : ' ' }}">
                    <a href="{{ route('callback.index') }}" ><i class="la la-reply"></i>  <span> Callback</span><span></span></a>                 
                </li>
                <li class="{{ Request::is('admin/newsletter*')  ? 'active' : ' ' }}">
                    <a href="{{ route('newsletter.index') }}" ><i class="la la-envelope"></i>  <span> Newsletter</span><span></span></a>                 
                </li>
            </ul> 
        </div>
    </div>
</div>


