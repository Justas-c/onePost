<?php //printr($_SESSION);?>
<?php if (isset($_SESSION['user_name'])) {echo "currently logged in: {$_SESSION['user_name']}"; } ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT . 'pages/about'?>">About</a>
      </li>
    </ul>
    <form class="form-inline ml-auto my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

      <ul class="navbar-nav ml-0">
      <?php if (isset($_SESSION['user_id'])) : ?>
      	<li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT;?>users/logout">Logout</a>
      	<?php else : ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT;?>users/register">Register</a>
          </li>
          <li class=""nav-item>
            <a class="nav-link" href="<?php echo URLROOT;?>users/login">Login</a>
          </li>
       <?php endif;?>

      </ul>
  </div>
</nav>
