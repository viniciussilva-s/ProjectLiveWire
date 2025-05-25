<!-- ========== Menu ========== -->
<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{route('home')}}" class="logo-light">
            <img src="assets/images/logo-light.png" alt="logo" class="logo-lg">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{route('home')}}" class="logo-dark">
            <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">
        <!--- Menu -->
        <ul class="menu">
            <li class="menu-title">Navegação</li>
            <li class="menu-item">
                <a href="#menuTasks1" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="package"></i></span>
                    <span class="menu-text"> Categorias </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuTasks1">
                    <ul class="sub-menu">

                        <li class="menu-item">
                            <a href="{{ route('categories.list') }}" class="menu-link">
                                <span class="menu-text">Lista</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="menu-item">
                <a href="#menuTasks2" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="clipboard"></i></span>
                    <span class="menu-text"> Chamados </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuTasks2">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ route('tickets.list') }}" class="menu-link">
                                <span class="menu-text">Lista</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left menu End ========== -->
