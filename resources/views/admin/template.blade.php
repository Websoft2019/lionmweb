<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
  <title>
    Admin Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('admin/assets/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />
  @yield('css')
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}" target="_blank">
        <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">District 325 M, Nepal </span>
        
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.slider.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Slider</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.getManageClub') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Clubs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.getAllMembers')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Members</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.getManageDonor') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Donation</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white"
              href="#orderMenu" data-bs-toggle="collapse" role="button" aria-expanded="false"
              aria-controls="orderMenu">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Gallery</span>
          </a>
          <div class="collapse" id="orderMenu">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('admin.album.index') }}">
                          <span class="ms-4">Ablum</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('admin.image.index') }}">
                          <span class="ms-4">Image</span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.getManageDistrictDepartment') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">District Department</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.getManageDistrictTeam') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">District Team</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.getRegistrationList')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Registration</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.getHostClubList')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Host Club Panel</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.download.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Download</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.district_calender.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">District Calendar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.document.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Documents</span>
          </a>
        </li>
       
       
       
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="" type="button">Lion Year {{env('lion_year')}}</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">{{ Auth::guard('admin')->user()->name }}</span>
              </a>
            </li>
             <li class="nav-item d-flex align-items-center">
              <form method="POST" action="{{ route('admin.logout') }}">
                @csrf

                <a href="{{route('admin.logout')}}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    &nbsp; &nbsp; {{ __('Log Out') }}
               </a>
            </form>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="{{ asset('admin/assets/img/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="{{ asset('admin/assets/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')
      <footer class="footer py-4">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                &copy; All Copyright <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="https://www.websoftnepal.com.np" class="font-weight-bold" target="_blank">Websoft Technology Nepal</a>
                
              </div>
            </div>
            <div class="col-lg-6">
              
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Content Management System</h5>
          <p>You can manage website pages</p>
        </div>

      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <a class="btn bg-gradient-info w-100" href="{{ route('admin.getManagePost') }}">Manage Officer Desgination</a>
        <a class="btn btn-outline-dark w-100" href="{{ route('admin.getManageProgram') }}">Focused Programs</a>
        <a class="btn btn-outline-dark w-100" href="{{ route('admin.getManageDonorType') }}">Donor Type</a>
        <a class="btn btn-outline-dark w-100" href="{{ route('admin.getManageNews') }}">News &amp; Events</a>
        <a class="btn btn-outline-dark w-100" href="{{ route('admin.getManageNotice') }}">Notices</a>
        <a class="btn btn-outline-dark w-100" href="{{ route('admin.getManagePDFDocuments') }}">PDF Documents</a>

      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/assets/js/material-dashboard.min.js?v=3.0.4') }}"></script>
  <script src="{{ asset('admin/assets/js/jquery.js') }}"></script>
  @yield('js')
  
    <!--- Slug ---->
    <script>
        function generateSlug() {
            const nameInput = document.getElementById('name').value.toLowerCase();
            const slugInput = nameInput.replace(/[^a-z0-9]/g, '-');
            document.getElementById('slug').value = slugInput;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Target the input field with the id 'slug'
            var slugInput = document.getElementById('slug');

            // Add an input event listener to the input field
            slugInput.addEventListener('input', function() {
                // Get the current value of the input field
                var currentValue = slugInput.value;

                // Replace consecutive spaces with a single dash and update the input field value
                var slugValue = currentValue.replace(/\s+/g, '-');

                // Remove leading and trailing dashes
                slugValue = slugValue.replace(/^-+|-+$/g, '');

                // Update the input field value
                slugInput.value = slugValue;
            });

            // Add a keypress event listener to the input field
            slugInput.addEventListener('keypress', function(event) {
                // Check if the pressed key is the space key
                if (event.key === ' ') {
                    // Prevent the default behavior of the space key
                    event.preventDefault();

                    // Append a dash to the current input field value only if the last character is not a dash
                    if (slugInput.value.slice(-1) !== '-') {
                        slugInput.value += '-';
                    }
                }
            });
        });

        // for success popup
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('successPopup');
            popup.style.display = 'block';
            popup.style.animation = 'slideIn 0.5s ease-out forwards';

            setTimeout(function() {
                popup.style.animation = 'slideOut 0.5s ease-out forwards';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 500); // Match the duration of the slideOut animation
            }, 3000); // Duration before popup starts to slide out
        });
    </script>
</body>

</html>