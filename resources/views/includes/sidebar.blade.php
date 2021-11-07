<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('dashboard')}}" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                @if (Auth::user()->role == 'admin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('skpd.index')}}" aria-expanded="false">
                        <i class="me-3 fa fa-book" aria-hidden="true"></i><span
                            class="hide-menu">Master Data SKPD</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('tambah-paket.create')}}" aria-expanded="false">
                        <i class="me-3 fa fa-columns" aria-hidden="true"></i><span
                            class="hide-menu">Input Paket</span></a>
                </li>
                @endif
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{route('input-paket')}}" aria-expanded="false"><i class="me-3 fas fa-table"
                        aria-hidden="true"></i><span class="hide-menu">Laporan</span></a>
                 </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>