
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }} ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->level == 'staff')
                    
                <li class="sidebar-item {{ Request::is('allProduct') ? 'active' : '' }} ">
                    <a href="{{ route('allProduct') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>All Product</span>
                    </a>
                </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::is('transaksi_IN') ? 'active' : '' }} ">
                                <a href="{{ route('transaksi_IN.index') }}">Product IN</a>
                            </li>
                            <li class="submenu-item {{ Request::is('transaksi_OUT') ? 'active' : '' }}  ">
                                <a href="{{ route('transaksi_OUT.index') }}">Product Out</a>
                            </li>
                        
                        </ul>
                    </li>

                @endif

                
                @if (Auth::user()->level == 'head staff')
                    
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Request::is('transaksi_IN') ? 'active' : '' }}">
                            <a href="{{ route('transaksi_IN.index') }}">Product IN</a>
                        </li>
                        <li class="submenu-item {{ Request::is('transaksi_OUT') ? 'active' : '' }}">
                            <a href="{{ route('transaksi_OUT.index') }}">Product Out</a>
                        </li>
                    
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu {{ Request::is('laporanIN') ? 'active' : '' }}">
                        <li class="submenu-item ">
                            <a href="{{ route('laporanIN.index') }}">Laporan IN</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporanOUT') ? 'active' : '' }} ">
                            <a href="{{ route('laporanOUT.index') }}">Laporan OUT</a>
                        </li>
                    
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::is('product*') ? 'active' : '' }} ">
                    <a href="{{ route('product.index') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>All Product</span>
                    </a>
                </li>


                @endif


                @if (Auth::user()->level == 'manager')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::is('laporanIN') ? 'active' : '' }}">
                                <a href="{{ route('laporanIN.index') }}">Laporan IN</a>
                            </li>
                            <li class="submenu-item {{ Request::is('laporanOUT') ? 'active' : '' }}">
                                <a href="{{ route('laporanOUT.index') }}">Laporan OUT</a>
                            </li>
                        
                        </ul>
                    </li>
                @endif

              

              

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="layout-default.html">Default Layout</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="layout-vertical-1-column.html">1 Column</a>
                        </li>
                     
                    </ul>
                </li> --}}

                @if (Auth::user()->level == 'admin')
                    
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Request::is('transaksi_IN') ? 'active' : '' }} ">
                            <a href="{{ route('transaksi_IN.index') }}">Product IN</a>
                        </li>
                        <li class="submenu-item {{ Request::is('transaksi_OUT') ? 'active' : '' }}  ">
                            <a href="{{ route('transaksi_OUT.index') }}">Product Out</a>
                        </li>
                    
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Request::is('laporanIN') ? 'active' : '' }} ">
                            <a href="{{ route('laporanIN.index') }}">Laporan IN</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporanOUT') ? 'active' : '' }}">
                            <a href="{{ route('laporanOUT.index') }}">Laporan OUT</a>
                        </li>
                    
                    </ul>
                </li>

                <li class="sidebar-title">Forms &amp; Tables</li>
                
                                <li class="sidebar-item {{ Request::is('product*') ? 'active' : '' }} ">
                                    <a href="{{ route('product.index') }}" class='sidebar-link'>
                                        <i class="bi bi-file-earmark-medical-fill"></i>
                                        <span>All Product</span>
                                    </a>
                                </li>
                
                
                                <li class="sidebar-item  {{ Request::is('category*') ? 'active' : '' }}">
                                    <a href="{{ route('category.index') }}" class='sidebar-link'>
                                        <i class="bi bi-grid-1x2-fill"></i>
                                        <span>Category</span>
                                    </a>
                                </li>
                
                                <li class="sidebar-item  {{ Request::is('supplier*') ? 'active' : '' }}">
                                    <a href="{{ route('supplier.index') }}" class='sidebar-link'>
                                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                        <span>Suppliers</span>
                                    </a>
                                </li>   
                                
                                <li class="sidebar-item {{ Request::is('user*') ? 'active' : '' }} ">
                                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                        <span>Users</span>
                                    </a>
                                </li>

                @endif

               

                <li class="sidebar-item mb-5  mt-4">
                    <form action="{{ route('logout') }}" method="post">
                     @csrf
                        <button type="submit" class="the-icon btn btn-secondary bg-3 h-30 w-50" style="border: none;">
                            <span class="fa-fw select-all fas"></span> Logout
                           
                           </button>
                    </form>
                    {{-- <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Logout</span>
                    </a> --}}
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
