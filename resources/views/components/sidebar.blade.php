<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="/dashboard" class="sidebar-brand">
            <i class="fas fa-cube me-2"></i>
            Enchen App
        </a>
    </div>
    <div class="sidebar-menu">
        <div class="menu-item">
            <a href="/dashboard" class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home menu-icon"></i>
                Dashboard
            </a>
        </div>
        <div class="menu-item">
            <a href="/barangs" class="menu-link {{ request()->is('barangs*') ? 'active' : '' }}">
                <i class="fas fa-users menu-icon"></i>
                Barang
            </a>
        </div>
        <div class="menu-item">
            <a href="/sales" class="menu-link {{ request()->is('sales*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar menu-icon"></i>
                Penjualan
            </a>
        </div>
        <div class="menu-item">
            <a href="/pengaturan" class="menu-link {{ request()->is('pengaturan*') ? 'active' : '' }}">
                <i class="fas fa-cog menu-icon"></i>
                Pengaturan
            </a>
        </div>
        <div class="menu-item">
            <a href="/dokumen" class="menu-link {{ request()->is('dokumen*') ? 'active' : '' }}">
                <i class="fas fa-file-alt menu-icon"></i>
                Dokumen
            </a>
        </div>
        <div class="menu-item">
            <a href="/notifikasi" class="menu-link {{ request()->is('notifikasi*') ? 'active' : '' }}">
                <i class="fas fa-bell menu-icon"></i>
                Notifikasi
            </a>
        </div>
    </div>
</div>
