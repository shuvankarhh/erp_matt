@php

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('storage/images/' . $website_settings->favicon) }}">

    <link rel="logo" type="/image/png" href="{{ asset('storage/images/' . $website_settings->company_logo) }}">

    <meta name="referrer" content="origin-when-cross-origin">
    {{-- previous meta for csrf-token --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    {{-- new meta for csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $website_settings->seo_description }}">

    <meta property="og:site_name" content="{{ $website_settings->company_name }}">
    <meta property="og:type"          content="website" />
    <meta property="og:description"   content="{{ $website_settings->seo_description }}" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="{{ $website_settings->seo_description }}">

    <meta name=”robots” content=”none”>

    <title>{{ $pagename }} - {{ $website_settings->company_name }} </title>

{{-- BEGIN GLOBAL MANDATORY STYLES --}}
<link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
<link rel="stylesheet" type="text/css" href="{{ mix('/css/bootstrap/bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="/css/plugins.css" />
<link rel="stylesheet" type="text/css" href="/css/ui-kit/custom-modal.css" />
{{-- END GLOBAL MANDATORY STYLES --}}

<link rel="stylesheet" type="text/css" href="/plugins/font-icons/pixeden/pe-icon-7-stroke.css">
<link rel="stylesheet" type="text/css" href="/plugins/font-icons/pixeden/style.css">
<link href="/plugins/font-icons/themify/themify-style.css" rel="stylesheet" type="text/css" />
<link href="/plugins/font-icons/themify/themify-icons.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/css/ui-kit/notification/notify.css" />

{{-- css CDN for select2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Latest Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
integrity="sha384-PnpchM76Rcmz0krDdiPYCzWgN/D3dFTo/KTZZv+u2z8&..." crossorigin="anonymous">

{{-- BEGIN UMTT CUSTOM STYLES --}}
<link rel="stylesheet" type="text/css" href="{{ mix('/css/umtt/dashboard-layout.css')}}" />
{{-- END UMTT CUSTOM STYLES --}}
    @isset ($css)
        {{ $css }}
    @endisset
</head>
<body class="default-sidebar">

    {{-- BEGIN NAVBAR --}}
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>

        <ul class="navbar-nav flex-row ml-lg-auto">
            <x-nav-right-items :notifications="$notifications" :unseen="$unseen_notifications_count" />
        </ul>
    </header>
    {{-- END NAVBAR --}}

    {{-- BEGIN MAIN CONTAINER  --}}
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        {{-- BEGIN SIDEBAR  --}}

        <div class="sidebar-wrapper sidebar-theme">
            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

            <nav id="sidebar">
                <ul class="navbar-nav theme-brand d-none d-lg-flex" style="text-align: center;">
                    <li class="nav-item" style="display: inline-block;">
                        <img src="{{ asset('storage/images/' . $website_settings->company_logo) }}" alt="logo" style="height: 59px;max-width: 100%;padding: 10px;">
                    </li>
                </ul>


                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ route('dashboard') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-computer-6 ml-3"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <x-sidebar-dropdown-menu icon="flaticon-user-group" id="contact" name="Contact" :routes="[
                        'contacts.index' => [
                            'button_text' => 'Contacts',
                            'activeForRouteNames' => [
                                'contacts.index',
                                'contacts.create',
                            ],
                        ],
                        'organizations.index' => [
                            'button_text' => 'Organizations',
                            'activeForRouteNames' => [
                                'organizations.index',
                                'organizations.create',
                            ],
                        ],
                        'customer-accounts.index' => [
                            'button_text' => 'Customer Accounts',
                            'activeForRouteNames' => [
                                'customer-accounts.index',
                                'customer-accounts.create',
                            ],
                        ],
                    ]" />

                    <x-sidebar-dropdown-menu icon="flaticon-user-1" id="Sales" name="Sales" :routes="[
                        'sales.index' => [
                            'button_text' => 'Sales',
                            'activeForRouteNames' => [
                                'sales.index',
                                'sales.create',
                            ],
                        ],
                        'pipelines.index' => [
                            'button_text' => 'Sales Pipelines',
                            'activeForRouteNames' => [
                                'pipelines.index',
                                'pipelines.create',
                            ],
                        ],
                        'pipeline-stages.index' => [
                            'button_text' => 'Pipeline Stages',
                            'activeForRouteNames' => [
                                'pipeline-stages.index',
                                'pipeline-stages.create',
                            ],
                        ],
                        'invoices.index' => [
                            'button_text' => 'Invoices',
                            'activeForRouteNames' => [
                                'invoices.index',
                                'invoices.create',
                            ],
                        ],
                        'quotes.index' => [
                            'button_text' => 'Quotes',
                            'activeForRouteNames' => [
                                'quotes.index',
                                'quotes.create',
                            ],
                        ],
                    ]"/>

                    <x-sidebar-single-menu icon="flaticon-menu-4" name="Email Template" route="email-template.index" :activeForRouteNames="[
                        'email-template.index',
                        'email-template.create',
                    ]" />

                    <x-sidebar-single-menu icon="flaticon-email-3" name="Email" route="email.index" :activeForRouteNames="[
                        'email.index',
                    ]" />

                    <x-sidebar-dropdown-menu icon="flaticon-user-1" id="company" name="Company" :routes="[
                        'staffs.index' => [
                            'button_text' => 'All Staffs',
                            'activeForRouteNames' => [
                                'staffs.index',
                                'staffs.create',
                            ],
                        ],
                        'company-settings.index' => [
                            'button_text' => 'Company Settings',
                            'activeForRouteNames' => [
                                'company-settings.index',
                                'company-settings.create',
                            ],
                        ],
                    ]"/>


                    <x-sidebar-dropdown-menu icon="ti-ticket" id="ticket" name="Tickets" :routes="[
                        'tickets.index' => [
                            'button_text' => 'Tickets',
                            'activeForRouteNames' => [
                                'tickets.index',
                                'tickets.create',
                            ],
                        ],
                        'ticket-settings.index' => [
                            'button_text' => 'Ticket Settings',
                            'activeForRouteNames' => [
                                'ticket-settings.index',
                                'ticket-settings.create',
                            ],
                        ],
                    ]"/>

                    <x-sidebar-dropdown-menu icon="ti-ticket" id="task" name="Tasks" :routes="[
                        'tasks.index' => [
                            'button_text' => 'Task',
                            'activeForRouteNames' => [
                                'tasks.index',
                            ],
                        ],
                    ]"/>



                    <x-sidebar-dropdown-menu icon="ti-headphone-alt" id="support" name="Support" :routes="[
                        'support-settings.index' => [
                            'button_text' => 'Support Settings',
                            'activeForRouteNames' => [
                                'support-settings.index',
                                'support-settings.create',
                            ],
                        ],
                    ]"/>

                    <x-sidebar-single-menu icon="flaticon-settings-1" name="Solutions" route="solutions.index" :activeForRouteNames="[
                        'solutions.index',
                        'solutions.create',
                        'solutions.edit',
                    ]" />
                    <x-sidebar-single-menu icon="flaticon-users" name=" Organizations " route="organizations.index" :activeForRouteNames="[
                        'organizations.index',
                        'organizations.create',
                    ]" />

                    <x-sidebar-single-menu icon="flaticon-link" name=" Tags " route="tags.index" :activeForRouteNames="[
                        'tags.index',
                        'tags.create',
                    ]" />
                    <x-sidebar-single-menu icon="flaticon-link" name=" Industries " route="industries.index" :activeForRouteNames="[
                        'industries.index',
                        'industries.create',
                    ]" />
                    
                    <x-sidebar-single-menu icon="flaticon-settings-1" name="Website Settings" route="website_settings" :activeForRouteNames="[
                        'website_settings',
                    ]" />


                </ul>
            </nav>
        </div>

        {{-- END SIDEBAR --}}

       {{-- BEGIN CONTENT PART --}}
        <div id="content" class="main-content">
            <div class="container">
                {{ $slot }}

                @include('partials._blank_modal', ['layout'=> 'true'])
            </div>
        </div>
        {{-- END CONTENT PART --}}

    </div>
    {{-- END MAIN CONTAINER --}}

    {{-- BEGIN FOOTER --}}
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">
        </div>

        <div class="footer-section-2 container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline mb-0 d-flex justify-content-sm-center justify-content-center mr-sm-3 ml-sm-0 mx-3">
                        <li class="list-inline-item  mr-3">
                            <p class="bottom-footer">&#xA9; {{ date('Y') }} {{ $website_settings->company_name }}</p>
                        </li>
                        {{-- <li class="list-inline-item align-self-center">
                            <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- END FOOTER --}}

    {{-- BEGIN CONTROL SIDEBAR --}}
    <aside class="control-sidebar control-sidebar-light-color cs-content">
        <div class="">

            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="close-sidebar">
                        <i class="flaticon-close-fill p-3 toggle-control-sidebar"></i>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="usr-info text-center mb-5">
                        <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid rounded-circle mb-3">
                        <div class=" mt-2">
                            <h5 class="usr-name mb-0">Linda Nelson</h5>
                            <p class="usr-occupation mb-0 mt-1">Developer</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-navigation-section text-center mb-5 mt-3">
                <ul class="nav nav-tabs nav-justified mx-2">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#feeds-tab" class="nav-link rounded-circle active show">
                            <p class="mb-0">Task</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#friends-tab" class="nav-link rounded-circle">
                            <p class="mb-0">Friends</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#alerts-tab" class="nav-link rounded-circle">
                            <p class="mb-0">Settings</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">

                <div id="feeds-tab" class="tab-pane tab-1 fade show active">

                    <div class="tasks">

                        <div class="recent">

                            <div class="d-flex justify-content-between mb-5">

                                <div class="icon">
                                    <i class="flaticon-clock-1"></i>
                                </div>


                                <div>
                                    <span class="">Today</span> <span class="notification-count ml-2">12</span>
                                </div>

                                <div>
                                    <p class="r-view-all">See all</p>
                                </div>

                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Sean Freeman</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Laurie Fox</h6>
                                    <p>comment to your posts.</p>
                                    <p class="meta-time">13 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                            <div class="media system-notify">
                                <i class="flaticon-settings-7  mr-3"></i>
                                <div class="media-body">
                                    <h6 class="mb-0">System Notifications</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>


                            <div class="media mail-notify">
                                <i class="flaticon-folder-fill-1  mr-3"></i>
                                <div class="media-body">
                                    <h6 class="mb-0">Ricky Turner</h6>
                                    <p>has replied your mails.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                        </div>



                        <div class="today mt-5">

                            <div class="d-flex justify-content-between mb-5">

                                <div class="icon">
                                    <i class="flaticon-bell-fill-1"></i>
                                </div>
                                <div>
                                    <span>Yesterday</span> <span class="notification-count ml-2">8</span>
                                </div>

                                <div>
                                    <p class="r-view-all">See all</p>
                                </div>

                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Angie Lamb</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Amy Diaz</h6>
                                    <p>comment to your posts.</p>
                                    <p class="meta-time">13 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Irene Collins</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Lila Perry</h6>
                                    <p>has replied your mails.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>


                        </div>


                        <div class="task-stats mt-5">

                            <div class="t-s-header mb-5">
                                <div class="row">
                                    <div class="col-md-10 text-center">
                                        <h6><span>Task Statistics</span></h6>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <i class="flaticon-close-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="t-s-body">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between">
                                            <p>Feature Development</p>
                                            <p>70%</p>
                                        </div>

                                        <div class="progress  br-30 mb-4">
                                            <div class="progress-bar  br-30 bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between mt-3">
                                            <p>Uploading files</p>
                                            <p>30%</p>
                                        </div>

                                        <div class="progress  br-30 mb-4">
                                            <div class="progress-bar  br-30 bg-danger" role="progressbar" style="width: 30%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between mt-3">
                                            <p>Total Progress</p>
                                            <p>86%</p>
                                        </div>

                                        <div class="progress  br-30">
                                            <div class="progress-bar  br-30 bg-info" role="progressbar" style="width: 86%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                </div>

                                <div class="text-center mt-5 mb-5">
                                    <button class="btn btn-primary btn-rounded mb-5">See all</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div id="friends-tab" class="tab-pane tab-2 fade">

                    <div class="friends">

                        <div class="recent">

                            <div class="t-s-header mb-5">

                                <div class="row">

                                    <div class="col-md-8 text-center">
                                        <h6>
                                            <span>New Activity</span>
                                        </h6>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <p>See all</p>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <ul class="list-inline text-center mb-5">

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="/images/120x120.jpg">
                                    <span class="badge badge-pill badge-new">8</span>
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="/images/120x120.jpg">
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="/images/120x120.jpg">
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="/images/120x120.jpg">
                                    <span class="badge badge-pill badge-new">5</span>
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="/images/120x120.jpg">
                                </li>

                            </ul>


                            <div class="friend-request">

                                <div class="d-flex justify-content-between header mb-5">

                                    <div class="media">
                                        <i class="flaticon-user-plus mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mt-1">Friend request</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="mb-0 mt-2">See all</p>
                                    </div>

                                </div>

                                <div class="media">
                                    <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Kara Young</h6>
                                        <p>2 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                                <div class="media mt-2">
                                    <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Justin Cross</h6>
                                        <p>5 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                                <div class="media mt-2">
                                    <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Amy Diaz</h6>
                                        <p>7 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                                <div class="media mt-2">
                                    <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Ernest Reeves</h6>
                                        <p>10 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="online mt-5">

                            <div class="t-s-header mb-5">

                                <div class="row">

                                    <div class="col-md-8 text-center">
                                        <h6>
                                            <span>Online</span>
                                        </h6>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <p class="mb-0 mt-0">See all</p>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3" src="/images/120x120.jpg">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Irene Collins</span><span class="badge badge-info float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p><p class="meta-time">7 mins ago</p>
                                </div>
                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3 rounded" src="/images/120x120.jpg">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Thomas Granger</span><span class="badge badge-secondary float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p><p class="meta-time">13 mins ago</p>
                                </div>
                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3 rounded-circle" src="/images/120x120.jpg">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Grace Roberts</span><span class="badge badge-warning float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p><p class="meta-time">7 mins ago</p>
                                </div>
                            </div>

                        </div>


                        <div class="away-stats">


                            <div class="t-s-header mb-5 mt-5">

                                <div class="row">

                                    <div class="col-md-12">
                                        <h6>
                                            <span>Away</span>
                                        </h6>
                                    </div>

                                </div>

                            </div>

                            <div class="a-s-media mb-5">

                                <div class="media mb-3">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="/images/90x90.jpg" class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Traci Lopez</h6>
                                    </div>
                                </div>

                                <div class="media mb-3">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Kristen Beck</h6>
                                    </div>
                                </div>

                                <div class="media mb-5">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="/images/120x120.jpg" class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Keith Foster</h6>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

                <div id="alerts-tab" class="tab-pane tab-3 fade">

                    <div class="settings">

                        <div class="admin-setting">

                            <div class="d-flex justify-content-between">

                                <div class="media">
                                    <i class="flaticon-gear-5 mr-3"></i>
                                    <div class="media-body">
                                        <h6 class="mt-2">Admin settings</h6>

                                    </div>

                                </div>

                                <div>
                                    <p class="mb-0 mt-2">See all</p>
                                </div>

                            </div>

                            <div class="mb-3 mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show notifications</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Enable auto logout</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show recent activity</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Chat history</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Users activity</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Orders history</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show task statistics</h6>
                                    <label class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="general-setting mt-5">

                            <div class="d-flex justify-content-between mb-5">

                                <div class="media">
                                    <i class="flaticon-gear-5 mr-3"></i>
                                    <div class="media-body">
                                        <h6 class="mt-2">General Settings</h6>
                                    </div>
                                </div>

                            </div>

                            <div class="media mb-4">
                                <i class="flaticon-facebook-logo fb"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <i class="flaticon-dribbble-bold dribbble"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <i class="flaticon-linkedin-logo lin"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <i class="flaticon-twitter-logo tweet"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <i class="flaticon-behance-logo behance"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="chk-settings mt-5">

                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title">Report panel usage</span>
                                        </h6>
                                        <p class="media-text">
                                            Show information on any malicious activity
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                          <input type="checkbox" class="new-control-input" checked>
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title">Allow mail redirect</span>
                                        </h6>
                                        <p class="media-text">
                                            Redirect mail through exchange server
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                          <input type="checkbox" class="new-control-input">
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Show author name in posts</span>
                                        </h6>
                                        <p class="media-text">
                                            Allow the user to show his name in blog posts
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                          <input type="checkbox" class="new-control-input" checked>
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Sync phone when connected to the PC</span>
                                        </h6>
                                        <p class="media-text">
                                            Connect smart phone automatically and sync with user profile
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                          <input type="checkbox" class="new-control-input" checked>
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-5 delete-chat mb-5">

                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Delete chat history</span>
                                        </h6>
                                    </div>
                                    <i class="del-chat-his flaticon-delete-1 mb-4"></i>

                                </div>

                            </div>




                            <div class="mt-5 usr-status mb-5">

                                <div class="d-flex justify-content-between mb-5">

                                    <div class="media">
                                        <i class="flaticon-chat-fill mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mt-2">Status</h6>
                                        </div>
                                    </div>

                                </div>

                                <div class="media mb-2 stats">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Online</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox  mr-1  checkbox-outline-success new-checkbox-rounded">
                                          <input type="checkbox" class="chb new-control-input">
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>

                                </div>


                                <div class="media mb-2 stats">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Offline</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox  mr-1  checkbox-outline-default new-checkbox-rounded">
                                          <input type="checkbox" class="chb new-control-input">
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>



                                <div class="media mb-5 stats">
                                    <div class="media-body mb-5">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Away</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox  mr-1  checkbox-outline-warning new-checkbox-rounded">
                                          <input type="checkbox" class="chb new-control-input">
                                          <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </aside>
    {{-- END CONTROL SIDEBAR --}}

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap/popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="/js/custom.js"></script>
    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- JS CDN -> select2 --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                $('#select2').select2({
                    // multiple: true,
                });
            </script>



    {{-- BEGIN CUSTOM SCRIPTS FILE --}}
    <script src="/js/ui-kit/notification/notify.js"></script>
    <script src="{{ mix('/js/umtt/common.js')}}"></script>
    <script src="{{ mix('/js/umtt/vendor/tauhid/time/time.js')}}"></script>
    <script src="{{ mix('/js/umtt/dashboard-common.js') }}"></script>

    {{-- END CUSTOM SCRIPTS FILE --}}

    @isset ($scripts)
    {{ $scripts }}
    @endisset

    @if(session()->has('success_message'))
        <script>
            displaySuccessNotification('{{ session("success_message") }}');
            hideOldestNotification();
        </script>
        @php session()->forget('success_message'); @endphp
    @endif

    @if(session()->has('error_message'))
        <script>
            displayErrorNotification('{{ session("error_message") }}');
            hideOldestNotification();
        </script>
        @php session()->forget('error_message'); @endphp
    @endif
</body>
</html>
