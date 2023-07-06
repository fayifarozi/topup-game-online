<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-list"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ms-auto dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Session::get('nameUser'); }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ Session::get('level'); }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="/assets/img/avatar-1.png">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <!-- <li><a class="dropdown-item" href="/master/admin/{{ Session::get('idUser'); }}/detail"><i class="icon-mid bi bi-person me-2"></i> My
                            Profile</a>
                        </li> -->
                        <!-- </li> -->
                        <li><a class="dropdown-item" href="/logout">
                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                            Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>