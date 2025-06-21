<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - {{ config('app.name', 'Enchen App') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-brand {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .sidebar-brand:hover {
            color: white;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-item {
            margin-bottom: 5px;
        }
        
        .menu-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .menu-link:hover,
        .menu-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: white;
        }
        
        .menu-icon {
            width: 20px;
            margin-right: 15px;
            text-align: center;
        }
        
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
        }
        
        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #666;
            margin-right: 20px;
            cursor: pointer;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        
        .user-dropdown {
            position: relative;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }
        
        .dashboard-content {
            padding: 30px;
        }
        
        .dashboard-header {
            margin-bottom: 30px;
        }
        
        .dashboard-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .dashboard-subtitle {
            color: #666;
            font-size: 1.1rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #667eea;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.success {
            border-left-color: #28a745;
        }
        
        .stat-card.warning {
            border-left-color: #ffc107;
        }
        
        .stat-card.danger {
            border-left-color: #dc3545;
        }
        
        .stat-card.info {
            border-left-color: #17a2b8;
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .stat-icon.success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        
        .stat-icon.warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        }
        
        .stat-icon.danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }
        
        .chart-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .chart-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .chart-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
        
        .recent-activity {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
        }
        
        .activity-icon.success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .activity-icon.warning {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .activity-icon.info {
            background: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-title {
            font-weight: 500;
            color: #333;
            margin-bottom: 3px;
        }
        
        .activity-time {
            font-size: 0.85rem;
            color: #666;
        }
        
        .progress-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .progress-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .progress-item {
            margin-bottom: 20px;
        }
        
        .progress-item:last-child {
            margin-bottom: 0;
        }
        
        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .progress-label {
            font-weight: 500;
            color: #333;
        }
        
        .progress-percentage {
            font-size: 0.9rem;
            color: #666;
        }
        
        .progress-bar {
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        
        .progress-fill.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .progress-fill.success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        
        .progress-fill.warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        }
        
        .progress-fill.danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .chart-section {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    @include('components.sidebar')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="navbar-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0">Dashboard</h5>
            </div>
            <div class="navbar-right">
                <div class="user-dropdown">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
        <!-- Dashboard Content -->
        {{-- <div class="dashboard-content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h1 class="dashboard-title">Selamat Datang di Dashboard</h1>
                <p class="dashboard-subtitle">Pantau aktivitas dan statistik aplikasi Anda</p>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="text-end">
                            <div class="stat-number">1,234</div>
                            <div class="stat-label">Total Pengguna</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card success">
                    <div class="stat-header">
                        <div class="stat-icon success">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="text-end">
                            <div class="stat-number">5,678</div>
                            <div class="stat-label">Penjualan</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card warning">
                    <div class="stat-header">
                        <div class="stat-icon warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="text-end">
                            <div class="stat-number">42</div>
                            <div class="stat-label">Pending</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card danger">
                    <div class="stat-header">
                        <div class="stat-icon danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="text-end">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Masalah</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="chart-section">
                <div class="chart-card">
                    <h3 class="chart-title">Statistik Bulanan</h3>
                    <canvas id="monthlyChart"></canvas>
                </div>
                
                <div class="recent-activity">
                    <h3 class="chart-title">Aktivitas Terbaru</h3>
                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pesanan baru berhasil diproses</div>
                            <div class="activity-time">5 menit yang lalu</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon warning">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Stok produk hampir habis</div>
                            <div class="activity-time">15 menit yang lalu</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon info">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pengguna baru mendaftar</div>
                            <div class="activity-time">30 menit yang lalu</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Laporan bulanan diunduh</div>
                            <div class="activity-time">1 jam yang lalu</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Section -->
            <div class="progress-section">
                <div class="progress-card">
                    <h3 class="chart-title">Target Pencapaian</h3>
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Penjualan Bulanan</span>
                            <span class="progress-percentage">75%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill primary" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Kepuasan Pelanggan</span>
                            <span class="progress-percentage">92%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill success" style="width: 92%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Penyelesaian Proyek</span>
                            <span class="progress-percentage">68%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill warning" style="width: 68%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="progress-card">
                    <h3 class="chart-title">Kinerja Tim</h3>
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Tim Pengembangan</span>
                            <span class="progress-percentage">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill primary" style="width: 85%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Tim Marketing</span>
                            <span class="progress-percentage">78%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill success" style="width: 78%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">Tim Support</span>
                            <span class="progress-percentage">95%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill success" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Chart.js Configuration
        const ctx = document.getElementById('monthlyChart').getContext('2d');
        const monthlyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Penjualan',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Pengguna Baru',
                    data: [2, 3, 20, 5, 1, 4],
                    borderColor: 'rgb(40, 167, 69)',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Mobile responsive
        function handleResize() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('collapsed');
                document.getElementById('mainContent').classList.add('expanded');
            } else {
                document.getElementById('sidebar').classList.remove('collapsed');
                document.getElementById('mainContent').classList.remove('expanded');
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Call on page load
    </script>
</body>
</html>