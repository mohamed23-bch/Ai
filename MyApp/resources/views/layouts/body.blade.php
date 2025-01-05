<!DOCTYPE html>
    <html lang="fr" dir="ltr">
      <head>
        <meta charset="UTF-8" />
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="/css/style.css" />
        @vite(['resources/js/app.js'])
        <!-- Boxicons CDN Link -->
        <link
          href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
          rel="stylesheet"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      </head>
      <body>
        <div class="sidebar">
          <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">D-CLIC</span>
          </div>
          <ul class="nav-links">
            {{-- <li>
              <a href="#" class="active">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li> --}}
            @yield('dash')
            @yield('Afficher')
            <li>
              <a href="#">
                <i class="bx bx-list-ul"></i>
                <span class="links_name">Commandes</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="links_name">Analyses</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bx bx-coin-stack"></i>
                <span class="links_name">Stock</span>
              </a>
            </li>
            <li @yield('AjouterElement')>
              <a href="#">
                <i class="bx bx-book-alt"></i>
                <span class="links_name">Tout les commmandes</span>
              </a>
            </li>
            <li @yield('ProfileActive')>
              <a href="#">
                <i class="bx bx-user"></i>
                <span class="links_name">Utilisateur</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bx bx-cog"></i>
                <span class="links_name">Configuration</span>
              </a>
            </li>
            <li class="log_out">
              <a href="#">
                <i class="bx bx-log-out"></i>
                <span class="links_name">Déconnexion</span>
              </a>
            </li>
          </ul>
        </div>
        <section class="home-section">
          <nav>
            <div class="sidebar-button">
              <i class="bx bx-menu sidebarBtn"></i>
              <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
              <input type="text" placeholder="Recherche..." />
              <i class="bx bx-search"></i>
            </div>
            <div class="profile-details">
              <!--<img src="images/profile.jpg" alt="">-->
              <span class="admin_name">@yield('UserName')</span>
              <i class="bx bx-chevron-down"></i>
            </div>
          </nav>
        
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>       
        </div>
      </body>
      </html>