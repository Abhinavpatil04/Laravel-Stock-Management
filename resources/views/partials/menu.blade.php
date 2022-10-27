<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("library.dashboard.index") }}" class="nav-link {{ request()->is('library/dashboard') || request()->is('library/dashboard/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                    <i class="fa-fw fas fa-cogs nav-icon " style="color:black; ">

                    </i>
                    {{ trans('cruds.dashboard.title') }}
                </a>
            </li>
            @can('asset_access')
                <li class="nav-item">
                    <a href="{{ route("library.assets.index") }}" class="nav-link {{ request()->is('library/assets') || request()->is('library/assets/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                        <i class="fa-fw fas fa-cogs nav-icon" style="color:black;">

                        </i>
                        {{ trans('cruds.asset.title') }}
                    </a>
                </li>
            @endcan
{{--            @can('stock_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("library.stocks.index") }}" class="nav-link {{ request()->is('library/stocks') || request()->is('library/stocks/*') ? 'active' : '' }}"  style="color:black; font-weight:bold;">--}}
{{--                        <i class=" fa-fw fas fa-cogs nav-icon" style="color:black;">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.stock.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
            @can('transaction_access')
                <li class="nav-item">
                    <a href="{{ route("library.transactions.index") }}" class="nav-link {{ request()->is('library/transactions') || request()->is('library/transactions/*') ? 'active' : '' }}"  style="color:black; font-weight:bold;">
                        <i class="fa-fw fas fa-cogs nav-icon" style="color:black;">

                        </i>
                        {{ trans('cruds.transaction.title') }}
                    </a>
                </li>
            @endcan


                @can('user_management_access')
                    <li class="nav-item nav-dropdown " >
                        <a class="nav-link  nav-dropdown-toggle" href="#"  style="color:black; font-weight:bold;">
                            <i class="fa-fw fas fa-users nav-icon" style="color:black;">

                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="nav-dropdown-items">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("library.permissions.index") }}" class="nav-link {{ request()->is('library/permissions') || request()->is('library/permissions/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                                        <i class="fa-fw fas fa-unlock-alt nav-icon" style="color:black;">

                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("library.roles.index") }}" class="nav-link {{ request()->is('library/roles') || request()->is('library/roles/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                                        <i class="fa-fw fas fa-briefcase nav-icon" style="color:black;">

                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("library.users.index") }}" class="nav-link {{ request()->is('library/users') || request()->is('library/users/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                                        <i class="fa-fw fas fa-user nav-icon" style="color:black;">

                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("library.teams.index") }}" class="nav-link {{ request()->is('library/teams') || request()->is('library/teams/*') ? 'active' : '' }}" style="color:black; font-weight:bold;">
                                        <i class="fa-fw fas fa-users nav-icon"style="color:black;" >

                                        </i>
                                        {{ trans('cruds.team.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
