<?php require APPROOT . '/views/inc/header.php'; ?>





<a href="<?php echo URLROOT; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> go back</a>
<div class="card card-body bg-light mt-5>">
  <h2>Add post</h2>
  <p>Create a post with this form</p>
    <form action="<?php echo URLROOT;?>posts/addpost" method="post">
      <div class="form-group col-4">
        <label for="title">Title:</label>
        <input type="text" autocomplete="off" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title']; ?>">
      	<span class="invalid-feedback"><?php echo $data['title_err']?></span>
      </div>
      <div class="form-group col-9 ">
        <label for="body">body:</label>
        <textarea name="body" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '';?>"><?php echo $data['body']; ?></textarea>
      	<span class="invalid-feedback"><?php echo $data['body_err']?></span>
      </div>
      <div>
      	<input class="btn btn-success" type="submit" name="submit" value="Post me!">
      </div>
    </form>
</div>








<?php require APPROOT . '/views/inc/footer.php'; ?>
