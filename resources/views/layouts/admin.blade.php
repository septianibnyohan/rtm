<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ config('app.url') }}/dist/css/vendor.styles.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/dist/css/demo/flite-template.css">
    <!-- endinject -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ config('app.url') }}/css/main.css">
    @yield('css')
    <link rel="manifest" href="./manifest.webmanifest">
</head>

<body class="minimized-sidebar">
    <div class="main-container">
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_overlays.html -->
            <div class="profile-overlay">
                <div class="profile-header">
                    <div class="profile-head">
                        <h4>Profile</h4>
                        <i data-feather="log-out" class="profile-close"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-pic">
                            <img src="{{ auth()->user()->getAvatar() }}" alt="Profile Picture" />
                        </div>
                        <div class="profile-detail">
                            <h4 class="name">{{ auth()->user()->getFullname() }}</h4>
                            <p class="designation">Full Stack Developer</p>
                            <div class="email">
                                <i class="icon" data-feather="mail"></i>
                                <a href="#">{{ auth()->user()->email }}</a>
                            </div>
                            <div class="username">
                                <i class="icon" data-feather="user"></i>
                                <a href="#">@jason.banks</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="body-wrapper">
                        <div class="project-stat">
                            <div class="widget-2">
                                <h5 class="widget-2-header">Project updates</h5>
                                <div class="widget-2-items">
                                    <div class="widget-2-item">
                                        <div class="widget-2-info">
                                            <a class="widget-2-title" href="#">Jinx Desktop App</a>
                                            <div class="widget-2-other-info">UI/UX, C++, Java</div>
                                        </div>
                                        <div class="widget-2-stat">
                                            <div class="widget-2-stat-figure">+80.1%</div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70.5%;" aria-valuenow="70.5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-2-item">
                                        <div class="widget-2-info">
                                            <a class="widget-2-title" href="#">Social Shares</a>
                                            <div class="widget-2-other-info">C#, Angular, HTML5</div>
                                        </div>
                                        <div class="widget-2-stat">
                                            <div class="widget-2-stat-figure">+80.1%</div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 70.5%;" aria-valuenow="70.5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-2-item">
                                        <div class="widget-2-info">
                                            <a class="widget-2-title" href="#">eBook Downloads</a>
                                            <div class="widget-2-other-info">Angular 8, HTML 5</div>
                                        </div>
                                        <div class="widget-2-stat">
                                            <div class="widget-2-stat-figure">+80.1%</div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 70.5%;" aria-valuenow="70.5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-2-item">
                                        <div class="widget-2-info">
                                            <a class="widget-2-title" href="#">Account Creations</a>
                                            <div class="widget-2-other-info">Php, Laravel</div>
                                        </div>
                                        <div class="widget-2-stat">
                                            <div class="widget-2-stat-figure">+80.1%</div>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 70.5%;" aria-valuenow="70.5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-1">
                                <h5 class="widget-1-header">Task list</h5>
                                <div class="widget-1-items">
                                    <div class="widget-1-item">
                                        <div class="widget-1-info">
                                            <a class="widget-1-title" href="#">Development FTP require</a>
                                            <div class="widget-1-other-info">26 Oct 2018 - 1 Hrs</div>
                                        </div>
                                        <div class="widget-1-actions">
                                            <a href="#" class="primary"><i data-feather="check"></i></a>
                                            <a href="#" class="secondary"><i data-feather="edit-2"></i></a>
                                            <a href="#" class="secondary"><i data-feather="trash-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-1-item">
                                        <div class="widget-1-info">
                                            <a class="widget-1-title" href="#">Designs approval</a>
                                            <div class="widget-1-other-info">26 Oct 2018 - 30 Min</div>
                                        </div>
                                        <div class="widget-1-actions">
                                            <a href="#" class="primary"><i data-feather="check"></i></a>
                                            <a href="#" class="secondary"><i data-feather="edit-2"></i></a>
                                            <a href="#" class="secondary"><i data-feather="trash-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-1-item">
                                        <div class="widget-1-info">
                                            <a class="widget-1-title" href="#">Meeting with designers</a>
                                            <div class="widget-1-other-info">26 Oct 2018 - 1.5 Hrs</div>
                                        </div>
                                        <div class="widget-1-actions">
                                            <a href="#" class="primary"><i data-feather="check"></i></a>
                                            <a href="#" class="secondary"><i data-feather="edit-2"></i></a>
                                            <a href="#" class="secondary"><i data-feather="trash-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-1-item">
                                        <div class="widget-1-info">
                                            <a class="widget-1-title" href="#">Upload application for approval</a>
                                            <div class="widget-1-other-info">26 Oct 2018 - 1 Hrs</div>
                                        </div>
                                        <div class="widget-1-actions">
                                            <a href="#" class="primary"><i data-feather="check"></i></a>
                                            <a href="#" class="secondary"><i data-feather="edit-2"></i></a>
                                            <a href="#" class="secondary"><i data-feather="trash-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-1-item">
                                        <div class="widget-1-info">
                                            <a class="widget-1-title" href="#">Resolve application bugs</a>
                                            <div class="widget-1-other-info">26 Oct 2018 - 2 Hrs</div>
                                        </div>
                                        <div class="widget-1-actions">
                                            <a href="#" class="primary"><i data-feather="check"></i></a>
                                            <a href="#" class="secondary"><i data-feather="edit-2"></i></a>
                                            <a href="#" class="secondary"><i data-feather="trash-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="settings-overlay">
                <div class="settings-header">
                    <h4>Configurations</h4>
                </div>
                <i data-feather="arrow-left-circle" class="setting-close"></i>
                <div class="settings-body">
                    <form class="config-container form">
                        <div class="config-file">
                            <h5>File Sharing</h5>
                            <ul class="config-list">
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Enable auto upload:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="upload-cloud"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Enable file sharing:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="enable">
																				<i class="config-icon" data-feather="share-2"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Enable auto download:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="download-cloud"></i>
																		</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="separator"></div>
                        <div class="config-notify">
                            <h5>Notification</h5>
                            <ul class="config-list">
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Notify when receive email:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="bell-off"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Receive calls in meeting:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="phone-off"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Update on task completion:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="enable">
																				<i class="config-icon" data-feather="thumbs-up"></i>
																		</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="separator"></div>
                        <div class="config-general">
                            <h5>Reporting</h5>
                            <ul class="config-list">
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Auto generate reports:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="file-minus"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Generate customer reports:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="disable">
																				<i class="config-icon" data-feather="user-check"></i>
																		</a>
                                    </div>
                                </li>
                                <li class="config-item form-group-xs row">
                                    <label class="col-8 col-form-label">Generate order reports:</label>
                                    <div class="col-4 text-right">
                                        <a href="#" class="enable">
																				<i class="config-icon" data-feather="shopping-cart"></i>
																		</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>

                </div>
            </div>
            <div class="email-overlay">
                <div class="email">
                    <div class="email-list-header">
                        <h4>Email <small class="text-muted">12 New</small></h4>
                        <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
                    </div>
                    <div class="email-list-wrapper">
                        <div class="email-list-scroll-container">
                            <ul class="email-list email-list-scroll">
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/avatars/user-1.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Ronald Morris</p>
                                            <p class="recipient-time">11:50 AM</p>
                                        </div>
                                        <a href="#" class="email-subject">Prepare Mockups as per scope!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Ronald, Please prepare mockups according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/avatars/user-2.jpg" alt="Profile Picture">
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Poul Smith</p>
                                            <p class="recipient-time">09:15 AM</p>
                                        </div>
                                        <a href="#" class="email-subject">Final demo approval!</a>
                                        <div class="email-text">
                                            Hi, My team has reviewed the demo on development server...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item active">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/company/company-1.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Lex Luther</p>
                                            <p class="recipient-time">08:30 AM</p>
                                        </div>
                                        <a href="#" class="email-subject">Demo design submission!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Lex, Please prepare designs according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/company/company-2.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Brad Pitt</p>
                                            <p class="recipient-time">12:50 PM</p>
                                        </div>
                                        <a href="#" class="email-subject">Development status on the modules!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Brad, Please prepare mockups according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/company/company-3.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Tommy Clark</p>
                                            <p class="recipient-time">02:10 PM</p>
                                        </div>
                                        <a href="#" class="email-subject">Review attached bug list!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Tommy, Please prepare mockups according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/company/company-4.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Alison Gram</p>
                                            <p class="recipient-time">04:50 PM</p>
                                        </div>
                                        <a href="#" class="email-subject">Prepare Mockups as per scope!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Alison, Please prepare mockups according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                                <li class="email-list-item">
                                    <span class="pro-pic">
																				<img src="{{ config('app.url') }}/dist/images/company/company-1.jpg" alt="Profile Picture">
																				<a href="#" class="attachment">
																						<i data-feather="paperclip"></i>
																				</a>
																		</span>
                                    <div class="email-content">
                                        <div class="recipient">
                                            <p class="recipient-name">Pam Agile</p>
                                            <p class="recipient-time">05:00 PM</p>
                                        </div>
                                        <a href="#" class="email-subject">Mobile application meeting cancel!<i class="starred">&nbsp;</i></a>
                                        <div class="email-text">
                                            Hello Pam, Please prepare mockups according to the spec documentation...
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-overlay">
                <div class="notify-header">
                    <h4>Notifications</h4>
                    <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
                </div>
                <div class="notify-body">
                    <ul class="notify-list">
                        <li class="notify-item ">
                            <div class="notify-thumbnail">
                                <div class="notify-icon bg-soft-base rounded-circle">
                                    <i data-feather="tablet" class="text-base"></i>
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">Jazz Desktop App</span>
                                <span class="notify-secondary">tablet design is marked as completed by </span>
                                <span class="notify-primary">Johnson Black</span>
                                <small>Just now</small>
                            </div>
                        </li>
                        <li class="notify-item ">
                            <div class="notify-thumbnail">
                                <div class="notify-icon">
                                    <img src="{{ config('app.url') }}/dist/images/company/company-1.jpg" alt="Company Logo" />
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">4711 Desktop App</span>
                                <span class="notify-secondary">wireframes are submitted to the client</span>
                                <small>Just now</small>
                            </div>
                        </li>
                        <li class="notify-item ">
                            <div class="notify-thumbnail">
                                <div class="notify-icon">
                                    <img src="{{ config('app.url') }}/dist/images/avatars/user-2.jpg" alt="User Logo" />
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">John Brown</span>
                                <span class="notify-secondary">has commented on submitted</span>
                                <span class="notify-primary">wireframes</span>
                                <small>Just now</small>
                            </div>
                        </li>
                        <li class="notify-item">
                            <div class="notify-thumbnail">
                                <div class="notify-icon">
                                    <img src="{{ config('app.url') }}/dist/images/avatars/user-1.jpg" alt="User Logo" />
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">Adios Fashion Store</span>
                                <span class="notify-secondary">design is completed and uploaded on development server</span>
                                <small>1 day ago</small>
                            </div>
                        </li>
                        <li class="notify-item">
                            <div class="notify-thumbnail">
                                <div class="notify-icon bg-soft-danger rounded-circle">
                                    <i data-feather="alert-triangle" class="text-danger"></i>
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">Flight Website</span>
                                <span class="notify-secondary">server is crashed during launch process in Central Europe</span>
                                <small>2 days ago</small>
                            </div>
                        </li>
                        <li class="notify-item">
                            <div class="notify-thumbnail">
                                <div class="notify-icon">
                                    <img src="{{ config('app.url') }}/dist/images/company/company-2.jpg" alt="Company Logo" />
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">Track Website</span>
                                <span class="notify-secondary">development is completed and requested QA engineer for UAT</span>
                                <small>3 days ago</small>
                            </div>
                        </li>
                        <li class="notify-item">
                            <div class="notify-thumbnail">
                                <div class="notify-icon bg-soft-success rounded-circle">
                                    <i data-feather="send" class="text-success"></i>
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">MasterClass Video</span>
                                <span class="notify-secondary">tutorial videos has been made and uploaded to the serve. Please proceed to next step</span>
                                <small>3 days ago</small>
                            </div>
                        </li>
                        <li class="notify-item">
                            <div class="notify-thumbnail">
                                <div class="notify-icon bg-soft-warning rounded-circle">
                                    <i data-feather="x-octagon" class="text-warning"></i>
                                </div>
                            </div>
                            <div class="notify-item-content">
                                <span class="notify-primary">TikRok</span>
                                <span class="notify-secondary">bug list is submitted with brief information of issues</span>
                                <small>4 days ago</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-overlay"></div>
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            @include('layouts.partials.sidebar')
            
            <!-- partial -->
            <!-- main-panel starts -->
            <div class="main-panel">
                <!-- content-wrapper Starts -->
                <div class="content-wrapper">
                    @include('layouts.partials.navbar')
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('layouts.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- inject:js -->
    <script src="{{ config('app.url') }}/dist/js/vendor.base.js"></script>
    <script src="{{ config('app.url') }}/dist/js/vendor.bundle.js"></script>
    <!-- endinject -->
    <!-- ChartJS - Text inside Circle -->
    <script src="{{ config('app.url') }}/dist/js/vendor-override/chartjs-doughnut.js"></script>
    <!-- ChartJS End -->
    <!-- Custom js for this page-->
    <script src="{{ config('app.url') }}/dist/js/vendor-override/tooltip.js"></script>
    <script src="{{ config('app.url') }}/dist/js/components/flite-sidebar/dashboard.js"></script>
    <script src="{{ config('app.url') }}/dist/js/components/flite-sidebar/common.js"></script>
    <!-- End custom js for this page-->
    @yield('js')
</body>

</html>