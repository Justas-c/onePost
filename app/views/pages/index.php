<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if (isLoggedIn()) {redirect('posts'); }?>

<div class="jumbotron jumbotron-flud text-center">
  <div class="container">
    <h1 class="display-3"><?php echo $data['title']?></h1>
  </div>
    <p class="lead"><?php echo $data['description']?></p>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
