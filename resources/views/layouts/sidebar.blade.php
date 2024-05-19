<div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-heading">Various</li>
                            <li class="nav-main-item{{ request()->is('users/*') ? ' open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-bulb"></i>
                                    <span class="nav-main-link-name">{{__('Users')}}</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('admin/users') ? ' active' : '' }}" href="{{route('users.index')}}">
                                            <span class="nav-main-link-name">{{__('Users List')}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('admin/users/create') ? ' active' : '' }}" href="{{route('users.create')}}">
                                            <span class="nav-main-link-name">{{__('Add New')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-item{{ request()->is('blogs/*') ? ' open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon si si-bulb"></i>
                                    <span class="nav-main-link-name">blogs</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('admin/blogs') ? ' active' : '' }}" href="{{route('blogs.index')}}">
                                            <span class="nav-main-link-name">Blogs List</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('admin/blogs/create') ? ' active' : '' }}" href="{{route('blogs.create')}}">
                                            <span class="nav-main-link-name">Create blog</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </div>
