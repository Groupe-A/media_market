<div class=" container mt-4 sticky-top mb-3">
    <nav class="bg-white border-bottom">
        <div class="d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item me-5">
                    <a class="nav-link link-dark px-2 <?= $page == "Accueil" ? 'text-info fw-bold' : "" ?>" href="home.php">Accueil</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Les Smartphones</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">LesPc Portables</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Les Pc fixés</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Les tablettes</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">Les accessoires</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item me-5">
                    <a class="nav-link link-dark px-2  <?= $page == "shop" ? 'text-info fw-bold' : "" ?>" href="shop">Boutique</a>
                </li>

               

            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <a href="login" class="nav-link link-dark px-2 <?= $page == "login" ? 'text-info fw-bold' : "" ?>"> <i class="fa-solid fa-user"></i> Connection</a>
                </li>
                <li class="nav-item">
                    <a href="register" class="nav-link link-dark px-2 <?= $page == "register" ? 'text-info fw-bold' : "" ?>"> <i class="fa-solid fa-arrow-right-to-bracket"></i>  Créer un compte</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
