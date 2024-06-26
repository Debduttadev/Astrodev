<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <!-- for side bar active class -->
                @php
                $dashboard = "";
                $adminuser = "";
                $adminappointment = "";
                $adminservice = "";
                $adminhoroscope = "";
                $adminchember = "";
                $adminclient = "";
                $managebannervideo = "";
                $adminsocial = "";
                $manageblog = "";
                $magageaboutcontactus = "";
                $managecontactus = "";
                $seodetails = "";
                $seodetailsubmenu = "";
                $alltag="";

                if ($navstatus == "adminuser"){
                $adminuser = "active";
                }elseif($navstatus == "adminappointment"){
                $adminappointment = "active";
                }elseif ($navstatus == "adminservice"){
                $adminservice = "active";
                }elseif ($navstatus == "horoscope"){
                $adminhoroscope = "active";
                }elseif ($navstatus == "adminchember"){
                $adminchember = "active";
                }elseif ($navstatus == "adminclient"){
                $adminclient = "active";
                }elseif ($navstatus == "managebannervideo"){
                $managebannervideo = "active";
                }elseif ($navstatus == "adminsocial"){
                $adminsocial = "active";
                }elseif ($navstatus == "manageblog"){
                $manageblog = "active";
                }elseif ($navstatus == "magageaboutcontactus"){
                $magageaboutcontactus = "active";
                }elseif ($navstatus == "managecontactus"){
                $managecontactus = "active";
                }elseif ($navstatus == "seodetails"){
                $seodetails = "active";
                $seodetailsubmenu = "show";
                }elseif ($navstatus == "alttag"){
                $seodetails = "active";
                }else{
                $dashboard = "active";
                }
                @endphp

                <a class="nav-link {{ $dashboard }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-table-columns {{ $dashboard }}"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ $adminuser }}" href="{{ URL::to('adminuser') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie {{ $adminuser }}"></i></div>
                    Admin Management
                </a>

                <a class="nav-link {{ $adminappointment }}" href="{{ URL::to('adminappointment') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-check {{ $adminappointment }}"></i></div>
                    Appointment
                </a>

                <a class="nav-link {{ $adminservice }}" href="{{ URL::to('adminservice') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-hand-sparkles {{ $adminservice }}"></i></div>
                    Service
                </a>

                <a class="nav-link {{ $adminhoroscope }}" href="{{ URL::to('adminhoroscope') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-half-stroke" {{ $adminhoroscope }}"></i></div>
                    Horoscopes
                </a>

                <a class="nav-link {{ $adminchember }}" href="{{ URL::to('adminchember') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot {{ $adminchember }}"></i></div>
                    Chamber details
                </a>

                <a class="nav-link {{ $adminclient }}" href="{{ URL::to('adminclient') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users {{ $adminclient }}"></i></div>
                    Client
                </a>
                @php
                if($seodetails==="active"){
                $aria_expanded=true;
                $seodetailsubmenu = "show";
                }else{
                $seodetailsubmenu = "";
                $aria_expanded=false;
                }
                @endphp
                <a class="nav-link collapsed {{ $seodetails }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="{{$aria_expanded}}" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-globe {{ $seodetails }}"></i>
                    </div>

                    SEO Details
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse {{$seodetailsubmenu}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $seodetails }}" href="{{ URL::to('alttag') }}">Alt Tag for Images</a>
                        <a class="nav-link {{ $seodetails }}" href="{{ URL::to('seodetails') }}">Seo Form for Pages</a>
                    </nav>
                </div>

                <a class="nav-link {{ $managebannervideo }}" href="{{ URL::to('managebannervideo') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-images {{ $managebannervideo }}"></i></div>
                    Manage Banner and Video
                </a>

                <a class="nav-link {{ $adminsocial }}" href="{{ URL::to('adminsocial') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-hashtag {{ $adminsocial }}"></i></div>
                    Social media link
                </a>

                <a class="nav-link {{ $manageblog }}" href="{{ URL::to('manageblog') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-clipboard {{ $manageblog }}"></i></div>
                    Manage Blog
                </a>

                <a class="nav-link {{ $magageaboutcontactus }}" href="{{ URL::to('magageaboutcontactus') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-address-card {{ $magageaboutcontactus }}"></i></div>
                    About and Contact details
                </a>

                <a class="nav-link {{ $managecontactus }}" href="managecontactus">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-message {{ $managecontactus }}"></i></div>
                    Contact us
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>

        </div>
    </nav>
</div>