<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{url('index')}}">
                <img src="{{asset('build/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{asset('build/assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo"
                    alt="logo">
                <div style="display: flex;flex-wrap: inherit;justify-content: space-between;width: 45%;height: 55%;">
                    <img
                        src="https://crud.ripplesoftware.site/wonderful-beginning.png" style="padding-right: 8px;"
                        class="header-brand-img light-logo1" alt="logo">
                    <img
                        src="https://crud.ripplesoftware.site/cocomelon-text.png" class="header-brand-img light-logo1"
                        alt="logo">
                </div>
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <!-- Center Management -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">Center Management</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('center-managements') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('center-managements/create') }}" class="slide-item">Create</a></li>
                    </ul>
                </li>

                <!-- Manager Master -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-user"></i>
                        <span class="side-menu__label">Manager Master</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('manager-masters') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('manager-masters/create')}}" class="slide-item">Create</a></li>
                    </ul>
                </li>

                <!-- Child Master -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label">Child Master</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('child-masters') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('child-masters/create') }}" class="slide-item">Create</a></li>
                    </ul>
                </li>

                <!-- Program Master -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-book"></i>
                        <span class="side-menu__label">Program Master</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('program-masters') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('program-masters/create') }}" class="slide-item">Assign</a></li>
                    </ul>
                </li>

                <!-- Fees Master -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-dollar-sign"></i>
                        <span class="side-menu__label">Fees Master</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('fees-masters') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('fees-masters/create') }}" class="slide-item">Create</a></li>
                    </ul>
                </li>

                <!-- User Management -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-shield"></i>
                        <span class="side-menu__label">User Management</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('user-managements') }}" class="slide-item">Index</a></li>
                        <li><a href="{{ url('user-managements/create') }}" class="slide-item">Create</a></li>
                    </ul>
                </li>
            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>