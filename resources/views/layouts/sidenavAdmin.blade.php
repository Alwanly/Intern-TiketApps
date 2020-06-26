<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">TOKO HAJI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/profile.png" class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a href="#" class="d-block">
{{--                    {{ Auth::user()->name }}--}}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>DashBoard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('packetList')}}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Packet Umroh</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('paymentList')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Payment</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('transactionList')}}" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('agentList')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Agent</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('masterData')}}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Master Data</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
