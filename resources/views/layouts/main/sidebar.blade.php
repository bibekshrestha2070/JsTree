<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('dashboard')}}" >
                        <i class="metismenu-icon fa fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-users"></i>
                        Users
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="{{route('user.add')}}">

                                Add User
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">

                                All Users
                            </a>
                        </li>

                    </ul>
                </li>
                @if($current_user->hasRole('admin'))
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-user"></i>
                        Roles
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="{{route('role.add')}}">

                                Add Role
                            </a>
                        </li>
                        <li>
                            <a href="{{route('role.index')}}">

                                All Roles
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-lock"></i>
                        Permissions
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="{{route('permission.add')}}">

                                Add Permission
                            </a>
                        </li>
                        <li>
                            <a href="{{route('permission.index')}}">

                                All Permissions
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>