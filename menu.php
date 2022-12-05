<nav class="navbar navbar-expand-lg bg-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">MUSIK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php if ($isLoggedIn) : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="add-music.php">Add Music</a>
          </li>
        <?php endif; ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <?php if (!$isLoggedIn) : ?>
        <form class="d-flex" role="search" action="login.php">
          <button class="btn btn-outline-success" type="submit">Login</button>
        </form>
      <?php else : ?>
        <form class="d-flex align-items-center" role="search" action="logout.php">
          <span>
            <?php echo $_SESSION["firstName"] ." ". $_SESSION["lastName"] ?>
          </span>
          <button class="btn btn-outline-success ms-3" type="submit">Logout</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</nav>