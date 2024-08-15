
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a class="{{set_active(['admin/dashboard'])}}" href="{{ route('admin.dashboard') }}">
                        <i class="la la-dashboard"></i><span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="{{set_active(['admin/license'])}}" href="{{ route('admin.license.index') }}">
                        <i class="la la-dashboard"></i><span>License Manage</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
