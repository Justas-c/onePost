<!-- TESTS AND INCLUDES AREA -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo '<br>this message is generated at views/posts/myposts.php<br>'; ?>
<!-- ----------------------------------------------------------------------------------- -->
<div class="row">
  <div class="col-md-6">
    <h1>Posts</h1>
  </div> 
  <div class="col md-6">
    <a href="<?php echo URLROOT; ?>posts/add" class="btn btn-primary ">
    <i class=""></i>Add Post
    </a>
  </div>
</div>



<!-- ----------------------------------------------------------------------------------- -->
<?php require APPROOT . '/views/inc/footer.php'; ?>