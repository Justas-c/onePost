<?php
    if ($_SESSION['user_id'] != $data['post']->user_id){
    redirect('posts');
    }
?>



<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- ----------------------------------------------------------------------------------- -->
<a href="<?php echo URLROOT; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> go back</a>
<!-- ----------------------------------------------------------------------------------- -->
<div class="card card-body bg-light mt-5>">
  <h2>Edit Post</h2>
  <p>Edit a post using this form</p>
    <form style="display: inline-block;" action="<?php echo URLROOT;?>posts/editpost/<?php echo $data['post']->id; ?>"  method="post">
      <div class="form-group col-4">
        <label for="title">Title:</label>
        <input type="text" autocomplete="off" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>"
         value="<?php echo $data['post']->title; ?>">
      	<span class="invalid-feedback"><?php echo $data['title_err']?></span>
      </div>
      <div class="form-group col-9 ">
        <label for="body">body:</label>
        <textarea name="body" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '';?>"><?php echo $data['post']->body; ?></textarea>
      	<span class="invalid-feedback"><?php echo $data['body_err']?></span>
      </div>
      <div class="col-9">
        <!-- SUBMIT -->
      	<input class="btn btn-success pull-right mr-3" type="submit" name="submit" value="Edit me!">
      </div>
    </form>
    <form style="display: inline-block;" action="posts/delete/<?php echo $data['post']->Id?>" method="post" ><input class="btn btn-danger pull-right" type="submit" value="delete"></form>
</div>
	<!--  cia buvo delete bellow: -->
	<!-- DELETE -->



<!-- ----------------------------------------------------------------------------------- -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
