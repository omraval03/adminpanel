 <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <!-- <img
                   src="{{ Auth::user()->profile_image ?? asset('default-user.jpg') }}"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                /> -->
                <!-- <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> -->
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="{{ Auth::user()->profile_image ?? asset('default-user.jpg') }}"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <!-- <p>
                    {{ Auth::user()->name }} - {{ Auth::user()->role ?? 'User' }}
                    <small>Member since {{ Auth::user()->created_at->format('M Y') }}</small>
                 </p> -->
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <!-- <li class="user-footer">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                  </form>
                </li> -->
                <!--end::Menu Footer-->
              </ul>
            </li>