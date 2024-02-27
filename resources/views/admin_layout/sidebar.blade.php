<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><span class="text-primary">Med</span>esh</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{-- active --}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li class="{{-- active --}}"><a class="nav-link" href="{{ route('Maintenance') }}">Maintenance Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Blogs</li>
            <li class="dropdown {{ request()->is('blog*') || request()->is('categories*') || request()->is('user*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>Blogs</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('Blog') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Blog') }}">Blogs</a></li>
                    <li class="{{ request()->routeIs('Categories') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Categories') }}">Blogs Category</a></li>
                    <li class="{{ request()->routeIs('user') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user') }}">Writers</a></li>
                </ul>
            </li>
            <li class="menu-header">Special Test</li>
            <li class="dropdown {{ request()->is('SpecialTest*') || request()->is('SpecialTestCategory*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>Special Test</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('SpecialTest') ? 'active' : '' }}"><a class="nav-link" href="{{ route('SpecialTest') }}">Special Test</a></li>
                    <li class="{{ request()->routeIs('SpecialTestCategory') ? 'active' : '' }}"><a class="nav-link" href="{{ route('SpecialTestCategory') }}">Special Test Category</a></li>

                </ul>
            </li>
            <li class="menu-header">E-Book</li>
            <li class="dropdown {{ request()->is('E_book*') || request()->is('E_bookCategory*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>E-book</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('E_book') ? 'active' : '' }}"><a class="nav-link" href="{{ route('E_book') }}">E-book</a></li>
                    <li class="{{ request()->routeIs('E_bookCategory') ? 'active' : '' }}"><a class="nav-link" href="{{ route('E_bookCategory') }}">E-Book Category</a></li>
                </ul>
            </li>
            <li class="menu-header">Subscribers Email</li>
            <li class="dropdown {{ request()->is('subcribersEmail*')? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>Subscriber Email</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('subcribersEmail') ? 'active' : '' }}"><a class="nav-link" href="{{ route('subcribersEmail') }}">Subscribers Email</a></li>
                </ul>
            </li>
            <li class="menu-header">Enquiry</li>
            <li class="dropdown {{ request()->is('enquiry*')? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>Enquiry</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('enquiry') ? 'active' : '' }}"><a class="nav-link" href="{{ route('enquiry') }}">Enquir List</a></li>
                </ul>
            </li>
            <li class="menu-header">CMS pages</li>
            <li class="dropdown {{ request()->is('cmsPages*')? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>CMS Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('cmsPages') ? 'active' : '' }}"><a class="nav-link" href="{{ route('cmsPages') }}">CMS List</a></li>
                </ul>
            </li>
            <li class="menu-header">Global Setup</li>
            <li class="dropdown {{ request()->is('GlobalSetup*')? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-text"></i><span>Global Setup</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('GlobalSetup') ? 'active' : '' }}"><a class="nav-link" href="{{ route('GlobalSetup') }}">Global Setup</a></li>
                </ul>
            </li>
           


        </ul>


    </aside>
</div>
