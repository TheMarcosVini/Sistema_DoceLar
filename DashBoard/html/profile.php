<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
            width="40">
        <span class="ml-2 d-none d-lg-inline-block"><span>Olá,</span> <span
                class="text-dark"><?php echo $_SESSION['nome'] ?></span> <i data-feather="chevron-down"
                class="svg-icon"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                class="svg-icon mr-2 ml-1"></i>
            Meu Perfil</a>
        <a class="dropdown-item" href="../../Login/backend/logout.php"><i data-feather="power"
                class="svg-icon mr-2 ml-1"></i>
            Sair</a>
    </div>
</li>
