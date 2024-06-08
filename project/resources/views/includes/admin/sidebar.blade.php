 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('front.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ $gs->website_title }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('Dashboard')</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Interface')
    </div>




    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseword"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>@lang('All Words')</span>
        </a>
        <div id="collapseword" class="collapse {{ (request()->is('admin/words') || request()->is('admin/blog-post')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('Blog Management:')</h6>
                <a class="collapse-item" href="{{ route('admin.words.all') }}">@lang('All Words')</a>
                <a class="collapse-item" href="{{ route('admin.words.pending') }}">@lang('Pending Words')</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedonate"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>@lang('Donations')</span>
        </a>
        <div id="collapsedonate" class="collapse {{ (request()->is('admin/donation') || request()->is('admin/user/donation')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('Donation Manage:')</h6>
                <a class="collapse-item" href="{{ route('admin.donation.all') }}">@lang('Donation Campaigns')</a>
                <a class="collapse-item" href="{{ route('admin.all.user.donations') }}">@lang('Donation Details')</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Blogs Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>@lang('Blog System')</span>
        </a>
        <div id="collapseTwo" class="collapse {{ (request()->is('admin/blog-category') || request()->is('admin/blog-post')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('Blog Management:')</h6>
                <a class="collapse-item" href="{{ route('admin.blog.categories') }}">@lang('Category')</a>
                <a class="collapse-item" href="{{ route('admin.blog') }}">@lang('Post')</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.advertisement.all') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>@lang('Advertisement')</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
   
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.general.setting') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>@lang('General Setting')</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pages.all') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>@lang('Page Setting')</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.paypal') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>@lang('Paypal Info')</span></a>
    </li>




    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.contact') }}">
            <i class="fas fa-mobile"></i>
            <span>@lang('Contact Section')</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.seotools') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>@lang('SEO Tools')</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.email.setting') }}">
            <i class="fas fa-envelope"></i>
            <span>@lang('EmailSetting Section')</span></a>
    </li>


    <!-- Divider -->
   

  
   


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->