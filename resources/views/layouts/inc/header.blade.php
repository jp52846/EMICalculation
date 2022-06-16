<div class="">
    <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme border-bottom border-top border-primary"
                id="layout-navbar"
                style="border-left: 2px solid"
                >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>

                  </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                  <div class="navbar-nav align-items-center">
                    {{ config('app.name') }}
                  </div>


                  <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item lh-1 me-3">
                      {{ auth()->user()->name }}
                    </li>


                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                      <a class="nav-link dropdown-toggle hide-arrow bg-primary rounded-circle" href="javascript:void(0);" data-bs-toggle="dropdown"
                      style="padding:2px;">
                        <div class="avatar bg-light rounded-circle">
                          <img src="{{ asset(env("CLIENT_THEME").'custom/images/experience.png')}}" alt class="w-px-40 h-auto"  />
                        </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
