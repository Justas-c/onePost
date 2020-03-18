<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- ----------------------------------------------------------------------------------- -->
<?php echo '<br>this message was generated in views/posts/editpost.php<br>'; ?>
<!-- ----------------------------------------------------------------------------------- -->

<!-- OLD editpost.php -->
<a href="<?php echo URLROOT; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> go back</a>
<div class="card card-body bg-light mt-5>">
<h2>Edit Post</h2>
<p>Edit a post using this form</p>
<form action="<?php echo URLROOT;?>posts/editpost" method="post">
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
      	<input class="btn btn-success" type="submit" name="submit" value="Edit me!">
      </div>
    </form>
</div>










<?php require APPROOT . '/views/inc/footer.php'; ?>
