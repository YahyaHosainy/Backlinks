<li class="topbar-nav-item relative">
    <span class="user-welcome d-none d-lg-inline-block">Welcome
        {{ Str::ucfirst(auth()->user()->name ) }}</span>
    <a class="user-thumb d-flex align-items-center justify-content-center text-white" role="button"
        wire:click.prevent="toggleDropdown">
        <em class="ti ti-user"></em>
    </a>
    @if($activeDropDown)
        <div class="dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
            <div class="user-status">
                <h6 class="user-status-title font-weight-bold text-center text-white">
                    {{ Str::ucfirst(auth()->user()->name ) }}
                </h6>
                <h6 class="user-status-title mx-auto text-center mt-4">Total Balance</h6>
                <div class="user-status-balance text-center mt-2">
                    {{ auth()->user()->balance }} <span>USD</span>
                </div>
            </div>
            <hr class="border-1 border-white" />
            <ul class="user-links text-white text-center" style="background-color:#253992;">
                <li>
                    <a href="{{ route('user-dashboard') }}" class="hover:text-white">
                        <em class="ikon ikon-dashboard pr-1"></em>
                        My Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}" class="hover:text-white">
                        <i class="ti ti-id-badge"></i>
                        My Profile
                    </a>
                </li>
            </ul>
            <ul class="user-links text-white text-center" style="background-color:#253992;">
                <li class="px-15 py-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-power-off mr-2"></i>
                                Logout
                            </div>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @endif
</li><!-- .topbar-nav-item -->
