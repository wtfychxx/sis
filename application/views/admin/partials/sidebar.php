<section class="sidebar">
  <div data-active-color="white" data-background-color="purple-bliss" data-image="<?= base_url() ?>assets/img/sidebar-bg/06.jpg" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
      <div class="logo clearfix"><a href="desktop" class="logo-text float-left">
          <div class="logo-img"><img src="<?= base_url() ?>assets/img/logo.png"/></div><span class="text align-middle">SIS</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
      <div class="nav-container">
        <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
            <li class="nav-item"><a href="<?= base_url('admin/desktop') ?>"><i class="ft-home"></i><span class="menu-title"> Dashboard </span></a></li>
            <li class="has-sub nav-item"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title"> Employee </span></a>
              <ul class="menu-content">
                <?php if($isadmin == 279){ ?>
                <li class="nav-item"><a href="<?= base_url('admin/sis/employee/add_new') ?>"><i class="ft-circle"></i><span class="menu-title"> Add New </span></a></li>
                <li class="nav-item"><a href="<?= base_url('admin/sis/employee/active_employee') ?>"><i class="ft-circle"></i><span class="menu-title"> Employee List </span></a></li>
                <?php } ?>
                <li class="nav-item"><a href=""><i class="ft-circle"></i><span class="menu-title"> Personal Data </span></a></li>
              </ul>
            </li>
            <?php if($isadmin == 279){ ?>
            <li class="has-sub nav-item"><a href="javascript:void(0)"><i class="ft-settings"></i><span data-i18n="" class="menu-title"> Configuration </span></a>
                <ul class="menu-content">
                    <li class="has-sub nav-item"><a href="javascript:void(0)" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Master Data </span></a>
                      <ul class="menu-content">
                          <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/area') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Area </span></a></li>
                          <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/religion') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Religion </span></a></li>
                          <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/marital_status') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Marital Status </span></a></li>
                          <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/salutation') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Salutation </span></a></li>
                      </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="javascript:void(0)" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Education </span></a>
                      <ul class="menu-content">
                        <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/education/faculty') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Faculty </span></a></li>
                      </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="javascript:void(0)" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Library </span></a>
                      <ul class="menu-content">
                        <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/book') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Book </span></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/sis/configuration/master_data/genre') ?>" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Genre </span></a></li>
                      </ul>
                    </li>
                </ul>
            </li>

            <li class="has-sub nav-item"><a href="javascript:void(0)" class="menu-item"><i class="ft-file-text"></i><span class="menu-title"> Report </span></a>
              <ul class="menu-content">
                <li class="nav-item"><a href="<?= base_url() ?>admin/sis/report/summary" class="menu-item"><i class="ft-circle"></i><span class="menu-title"> Summary Report </span></a></li>
              </ul>
            </li>

            <?php } ?>

            <li class="nav-item"><a href="<?= base_url('admin/sis/libraries/home') ?>"><i class="ft-book"></i><span data-i18n="" class="menu-title"> Book-U </span><span class="tag badge badge-danger float-right mr-1 mt-1"> New </span></a></li>
        </ul>
      </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
  </div>

  <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
    <div class="side-nav notification-sidebar-content">
      <div class="row">
        <div class="col-12 mt-1">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity</a></li>
            <li class="nav-item"><a id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#chat-tab" aria-expanded="false" class="nav-link">Chat</a></li>
            <li class="nav-item"><a id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#settings-tab" aria-expanded="false" class="nav-link">Settings</a></li>
          </ul>
          <div class="tab-content px-1 pt-1">
            <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
              <div id="activity" class="col-12 timeline-left">
                <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                <div id="timeline" class="timeline-left timeline-wrapper">
                  <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-purple bg-lighten-1"><i class="ft-shopping-cart"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="deep-purple-text medium-small">just now</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-info bg-lighten-1"><i class="fa fa-plane"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="cyan-text medium-small">Yesterday</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-success bg-lighten-1"><i class="ft-mic"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="green-text medium-small">5 Days Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-warning bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="amber-text medium-small">1 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-red bg-lighten-1"><i class="ft-inbox"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="deep-orange-text medium-small">2 Week Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-cyan bg-lighten-1"><i class="ft-mic"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="brown-text medium-small">1 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-amber bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="deep-purple-text medium-small">3 Month Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                      </div>
                    </li>
                    <li class="timeline-item">
                      <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-grey bg-lighten-1"><i class="ft-inbox"></i></span></div>
                      <div class="col s9 recent-activity-list-text"><a href="javascript:void(0)" class="grey-text medium-small">1 Year Ago</a>
                        <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="chat-tab" aria-labelledby="base-tab2" class="tab-pane">
              <div id="chatapp" class="col-12">
                <h6 class="mt-1 mb-3 text-bold-400">RECENT CHAT</h6>
                <div class="collection border-none">
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-12.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Elizabeth Elliott</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.00 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Thank you</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-6.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Mary Adams</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Hello Boo</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-11.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Caleb Richards</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.00 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Keny !</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-18.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">June Lane</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Ohh God</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-1.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Edward Fletcher</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.15 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Love you</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-2.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Crystal Bates</h4><span class="medium-small float-right blue-grey-text text-lighten-3">8.00 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Can we</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-3.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Nathan Watts</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.53 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Great!</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-15.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Willard Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.20 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Do it</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-19.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Ronnie Ellis</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.30 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Got that</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-14.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Gwendolyn Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.34 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Like you</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-13.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Daniel Russell</h4><span class="medium-small float-right blue-grey-text text-lighten-3">12.00 AM</span>
                      </div>
                      <p class="text-muted font-small-3">Thank you</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-22.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Sarah Graves</h4><span class="medium-small float-right blue-grey-text text-lighten-3">11.14 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Okay you</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-9.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Andrew Hoffman</h4><span class="medium-small float-right blue-grey-text text-lighten-3">7.30 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Can do</p>
                    </div>
                  </div>
                  <div class="media mb-1"><a><img alt="96x96" src="<?= base_url() ?>assets/img/portrait/small/avatar-s-20.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                    <div class="media-body">
                      <div class="clearfix">
                        <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Camila Lynch</h4><span class="medium-small float-right blue-grey-text text-lighten-3">2.00 PM</span>
                      </div>
                      <p class="text-muted font-small-3">Leave it</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="settings-tab" aria-labelledby="base-tab3" class="tab-pane">
              <div id="settings" class="col-12">
                <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
                <ul class="list-unstyled">
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Notifications</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                            <label for="notifications1" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show recent activity</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                            <label for="recent-activity1" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Notifications</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="notifications2" type="checkbox" class="custom-control-input">
                            <label for="notifications2" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show recent activity</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="recent-activity2" type="checkbox" class="custom-control-input">
                            <label for="recent-activity2" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show your emails</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="show-emails" type="checkbox" class="custom-control-input">
                            <label for="show-emails" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>Use checkboxes when looking for yes or no answers.</p>
                  </li>
                  <li>
                    <div class="togglebutton">
                      <div class="switch"><span class="text-bold-500">Show Task statistics</span>
                        <div class="float-right">
                          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input id="show-stats" type="checkbox" class="custom-control-input">
                            <label for="show-stats" class="custom-control-label"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>

  <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-sm-none d-md-block"><a class="customizer-close"><i class="ft-x font-medium-3"></i></a><a id="rtl-icon" href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-6/" target="_blank" class="bg-dark customizer-toggle"><span class="font-medium-1 white align-middle">RTL</span></a><a id="customizer-toggle-icon" class="customizer-toggle bg-danger"><i class="ft-settings font-medium-4 fa fa-spin white align-middle"></i></a>
    <div data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a" class="customizer-content p-3 ps-container ps-theme-dark">
      <h4 class="text-uppercase mb-0 text-bold-400">Theme Customizer</h4>
      <p>Customize & Preview in Real Time</p>
      <hr>
      <!-- Layout Options-->
      <h6 class="text-center text-bold-500 mb-3 text-uppercase">Layout Options</h6>
      <div class="layout-switch ml-4">
        <div class="custom-control custom-radio d-inline-block custom-control-inline light-layout">
          <input id="ll-switch" type="radio" name="layout-switch" checked class="custom-control-input">
          <label for="ll-switch" class="custom-control-label">Light</label>
        </div>
        <div class="custom-control custom-radio d-inline-block custom-control-inline dark-layout">
          <input id="dl-switch" type="radio" name="layout-switch" class="custom-control-input">
          <label for="dl-switch" class="custom-control-label">Dark</label>
        </div>
        <div class="custom-control custom-radio d-inline-block custom-control-inline transparent-layout">
          <input id="tl-switch" type="radio" name="layout-switch" class="custom-control-input">
          <label for="tl-switch" class="custom-control-label">Transparent</label>
        </div>
      </div>
      <hr>
      <!-- Sidebar Options Starts-->
      <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-options">Sidebar Color Options</h6>
      <div class="cz-bg-color sb-color-options">
        <div class="row p-1">
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="pomegranate" class="gradient-pomegranate d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="king-yna" class="gradient-king-yna d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="ibiza-sunset" class="gradient-ibiza-sunset d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="flickr" class="gradient-flickr d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-bliss" class="gradient-purple-bliss d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="man-of-steel" class="gradient-man-of-steel d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-love" class="gradient-purple-love d-block rounded-circle"></span></div>
        </div>
        <div class="row p-1">
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="black" class="bg-black d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="white" class="bg-grey d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="primary" class="bg-primary d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="success" class="bg-success d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="warning" class="bg-warning d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="info" class="bg-info d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="danger" class="bg-danger d-block rounded-circle"></span></div>
        </div>
      </div>
      <!-- Sidebar Options Ends-->
      <!-- Transparent Layout Bg color Options-->
      <h6 class="text-center text-bold-500 mb-3 text-uppercase tl-color-options d-none">Background Colors</h6>
      <div class="cz-tl-bg-color d-none">
        <div class="row p-1">
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="hibiscus" class="bg-hibiscus d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-purple-pizzazz" class="bg-purple-pizzazz d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-blue-lagoon" class="bg-blue-lagoon d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-electric-viloet" class="bg-electric-violet d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-protage" class="bg-portage d-block rounded-circle"></span></div>
          <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-tundora" class="bg-tundora d-block rounded-circle"></span></div>
        </div>
      </div>
      <!-- Transparent Layout Bg color Ends-->
      <hr>
      <!-- Sidebar BG Image Starts-->
      <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-bg-img">Sidebar Bg Image</h6>
      <div class="cz-bg-image row sb-bg-img">
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/01.jpg" width="90" class="rounded sb-bg-01"></div>
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/02.jpg" width="90" class="rounded sb-bg-02"></div>
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/03.jpg" width="90" class="rounded sb-bg-03"></div>
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/04.jpg" width="90" class="rounded sb-bg-04"></div>
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/05.jpg" width="90" class="rounded sb-bg-05"></div>
        <div class="col-sm-2 mb-3"><img src="<?= base_url() ?>assets/img/sidebar-bg/06.jpg" width="90" class="rounded sb-bg-06"></div>
      </div>
      <!-- Transparent BG Image Ends-->
      <div class="tl-bg-img d-none">
        <h6 class="text-center text-bold-500 text-uppercase">Background Images</h6>
        <div class="cz-tl-bg-image row">
          <div class="col-sm-3"><img src="<?= base_url() ?>assets/img/gallery/bg-glass-1.jpg" width="90" class="rounded bg-glass-1 selected"></div>
          <div class="col-sm-3"><img src="<?= base_url() ?>assets/img/gallery/bg-glass-2.jpg" width="90" class="rounded bg-glass-2"></div>
          <div class="col-sm-3"><img src="<?= base_url() ?>assets/img/gallery/bg-glass-3.jpg" width="90" class="rounded bg-glass-3"></div>
          <div class="col-sm-3"><img src="<?= base_url() ?>assets/img/gallery/bg-glass-4.jpg" width="90" class="rounded bg-glass-4"></div>
        </div>
      </div>
      <!-- Transparent BG Image Ends    -->
      <hr>
      <!-- Sidebar BG Image Toggle Starts-->
      <div class="togglebutton toggle-sb-bg-img">
        <div class="switch"><span>Sidebar Bg Image</span>
          <div class="float-right">
            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
              <input id="sidebar-bg-img" type="checkbox" checked class="custom-control-input cz-bg-image-display">
              <label for="sidebar-bg-img" class="custom-control-label"></label>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <!-- Sidebar BG Image Toggle Ends-->
      <!-- Compact Menu Starts-->
      <div class="togglebutton">
        <div class="switch"><span>Compact Menu</span>
          <div class="float-right">
            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
              <input id="cz-compact-menu" type="checkbox" class="custom-control-input cz-compact-menu">
              <label for="cz-compact-menu" class="custom-control-label"></label>
            </div>
          </div>
        </div>
      </div>
      <!-- Compact Menu Ends-->
      <hr>
      <!-- Sidebar Width Starts-->
      <div>
        <label for="cz-sidebar-width">Sidebar Width</label>
        <select id="cz-sidebar-width" class="custom-select cz-sidebar-width float-right">
          <option value="small">Small</option>
          <option value="medium" selected="">Medium</option>
          <option value="large">Large</option>
        </select>
      </div>
      <!-- Sidebar Width Ends-->
    </div>
  </div>
</section>