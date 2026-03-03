<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
                :root {
                --navy-deep:    #0d0a1a;
                --navy-mid:     #13102b;
                --navy-card:    #1a1638;
                --navy-border:  #2a2250;
                --gold:         #a78bfa;
                --gold-light:   #c4b5fd;
                --text-primary: #f0eeff;
                --text-muted:   #7c6f9e;
                --success:      #2dd4a0;
                --danger:       #f25c5c;
            }

        * { box-sizing: border-box; }

        body {
            background-color: var(--navy-deep);
            color: var(--text-primary);
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            min-height: 100vh;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 240px;
            height: 100vh;
            background: var(--navy-mid);
            border-right: 1px solid var(--navy-border);
            display: flex;
            flex-direction: column;
            padding: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 28px 24px 24px;
            border-bottom: 1px solid var(--navy-border);
        }

        .sidebar-brand .brann-icon {
            font-size: 1.6rem;
            color: var(--gold);
           
        }
        .sidebar-brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 8px 0 2px;
            letter-spacing: 0.02em;
        }

        .sidebar-brand p {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin: 0;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .sidebar-nav {
            padding: 20px 12px;
            flex: 1;
        }

        .nav-label {
            font-size: 0.62rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 0 12px;
            margin: 16px 0 6px;
        }

        .sidebar-nav .nav-link {
            color: var(--text-muted);
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 400;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background: var(--navy-card);
            color: var(--gold-light);
            border-left: 2px solid var(--gold);
            padding-left: 12px;
        }

        .sidebar-nav .nav-link i {
            font-size: 1rem;
            width: 20px;
        }

        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--navy-border);
            font-size: 0.7rem;
            color: var(--text-muted);
        }

        /* ---------- MAIN CONTENT ---------- */
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--navy-mid);
            border-bottom: 1px solid var(--navy-border);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .topbar-badge {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            color: var(--text-muted);
            font-size: 0.72rem;
            padding: 4px 12px;
            border-radius: 20px;
            letter-spacing: 0.05em;
        }

        .page-body {
            padding: 32px;
            flex: 1;
        }

        /* ---------- CARDS ---------- */
        .card-navy {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 12px;
            overflow: hidden;
        }

        .card-navy .card-header-navy {
            background: var(--navy-mid);
            border-bottom: 1px solid var(--navy-border);
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-navy h5 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
        }

        .card-header-navy .header-count {
            background: var(--navy-deep);
            border: 1px solid var(--navy-border);
            color: var(--gold);
            font-size: 0.72rem;
            padding: 3px 10px;
            border-radius: 20px;
        }

        /* ---------- TABLE ---------- */
        .table-navy {
            margin: 0;
            color: var(--text-primary);
        }

        .table-navy thead tr {
            background: var(--navy-mid);
        }

        .table-navy thead th {
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 500;
            padding: 14px 24px;
            border-bottom: 1px solid var(--navy-border);
            border-top: none;
        }

                    .table-navy tbody td {
                padding: 14px 24px;
                border-bottom: 1px solid var(--navy-border);
                font-size: 0.875rem;
                vertical-align: middle;
                color: #000000;
            }

            .table-navy tbody tr {
                background: #1a1638;
            }

            .table-navy tbody tr:nth-child(even) {
                background: #151230;
            }

            .table-navy tbody tr:hover {
                background: #221d45 !important;
            }

        .table-navy tbody tr:last-child td {
            border-bottom: none;
        }

        .table-navy tbody tr {
            transition: background 0.15s ease;
        }

        .table-navy tbody tr:hover {
            background: rgba(255,255,255,0.03);
        }

        /* ---------- BADGES ---------- */
        .badge-gold {
            background: rgba(201,168,76,0.15);
            color: var(--gold-light);
            border: 1px solid rgba(201,168,76,0.3);
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 400;
        }

        .badge-teal {
            background: rgba(45,212,160,0.12);
            color: var(--success);
            border: 1px solid rgba(45,212,160,0.25);
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 400;
        }

        /* ---------- BUTTONS ---------- */
        .btn-gold {
            background: var(--gold);
            color: var(--navy-deep);
            border: none;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 7px 18px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-gold:hover {
            background: var(--gold-light);
            color: var(--navy-deep);
            transform: translateY(-1px);
        }

        .btn-outline-navy {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--navy-border);
            font-size: 0.8rem;
            padding: 7px 18px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-outline-navy:hover {
            border-color: var(--gold);
            color: var(--gold-light);
        }

        /* ---------- STAT CARDS ---------- */
        .stat-card {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: rgba(201,168,76,0.12);
            border: 1px solid rgba(201,168,76,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--gold);
            flex-shrink: 0;
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--text-muted);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
        }

        /* ---------- FORMS ---------- */
        .form-navy .form-label {
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .form-navy .form-control,
        .form-navy .form-select {
            background: var(--navy-mid);
            border: 1px solid var(--navy-border);
            color: var(--text-primary);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }

        .form-navy .form-control:focus,
        .form-navy .form-select:focus {
            background: var(--navy-mid);
            border-color: var(--gold);
            color: var(--text-primary);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
        }

        .form-navy .form-select option {
            background: var(--navy-mid);
            color: var(--text-primary);
        }

        /* ---------- ALERTS ---------- */
        .alert-success-navy {
            background: rgba(45,212,160,0.1);
            border: 1px solid rgba(45,212,160,0.25);
            color: var(--success);
            border-radius: 10px;
            padding: 14px 20px;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger-navy {
            background: rgba(242,92,92,0.1);
            border: 1px solid rgba(242,92,92,0.25);
            color: var(--danger);
            border-radius: 10px;
            padding: 14px 20px;
            font-size: 0.875rem;
        }

        /* ---------- DETAIL PAGE ---------- */
        .detail-header {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 12px;
            padding: 28px 32px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .detail-icon {
            width: 56px;
            height: 56px;
            background: rgba(201,168,76,0.12);
            border: 1px solid rgba(201,168,76,0.25);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--gold);
            flex-shrink: 0;
        }

        .detail-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            margin: 0 0 6px;
            color: var(--text-primary);
        }

        .detail-meta {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .meta-item {
            font-size: 0.78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .meta-item span {
            color: var(--text-primary);
        }

        /* ---------- EMPTY STATE ---------- */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 2rem;
            color: var(--navy-border);
            margin-bottom: 12px;
            display: block;
        }

        .empty-state p {
            font-size: 0.875rem;
            margin: 0;
        }

        /* ---------- DIVIDER ---------- */
        .gold-divider {
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
            border: none;
            margin: 0;
        }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
        <h1>Canteen IMS</h1>
        <p>Inventory Management</p>
    </div>


    <nav class="sidebar-nav">
    <div class="nav-label">Main Menu</div>
    <a href="{{ route('products.index') }}"
       class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i> Products
    </a>
    <a href="{{ route('suppliers.index') }}"
       class="nav-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
        <i class="bi bi-truck"></i> Suppliers
    </a>
    <div class="nav-label">Operations</div>
    <a href="{{ route('products.create') }}"
       class="nav-link">
        <i class="bi bi-plus-square"></i> Add Product
    </a>
    <a href="{{ route('suppliers.create') }}"
       class="nav-link">
        <i class="bi bi-plus-square"></i> Add Supplier
    </a>
    <a href="{{ route('stock-entries.create') }}"
       class="nav-link {{ request()->routeIs('stock-entries.*') ? 'active' : '' }}">
        <i class="bi bi-plus-circle"></i> Add Stock Entry
    </a>
</nav>
    </nav>


    <div class="sidebar-footer">
        &copy; {{ date('Y') }} Canteen IMS
    </div>
</aside>



{{-- MAIN --}}
<div class="main-content">
    <div class="topbar">
        <h2 class="topbar-title">@yield('page-title', 'Dashboard')</h2>
        <span class="topbar-badge"><i class="bi bi-circle-fill text-success me-1" style="font-size:0.5rem"></i> System Online</span>
    </div>

    <div class="page-body">
        @if(session('success'))
            <div class="alert-success-navy mb-4">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>