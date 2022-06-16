<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-lg">
                Logo
            </span>
        </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <li class="menu-item {{ request()->is('/')? 'active': '' }}">
        <a href="{{ route('home') }}" class="menu-link">
          {{-- <i class="menu-icon tf-icons bx bx-home-circle"></i> --}}
          <i class='menu-icon tf-icons bx bx-calculator'></i>
          <div data-i18n="Analytics">Calculate EMI</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('history')? 'active': '' }}">
        <a href="{{ route('history') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-history'></i>
          <div data-i18n="Analytics">History</div>
        </a>
      </li>

    </ul>
  </aside>
