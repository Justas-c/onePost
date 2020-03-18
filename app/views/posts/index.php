
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message')?>
<div class="row mb-3">
  <div class="cold-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col">
    <a href="<?php echo URLROOT; ?>posts/addpost" class="btn btn-primary pull-right">
    <i class="fa fa-pencil"></i>Add Post
    </a>
  </div>
</div>

<?php foreach($data['posts'] as $post) : ?>
<div class="card mb-2">
  <div class="card-body">
      <div style="position: relative;">
      	<span class="bg-light p-1 mb-1" style="font-size:20px"><b><?php echo $post->title; ?></b></span>
      	<span class="bg-light pr-2 mb-0" style="font-size:10px; float:right; padding-top:10px; "><?php echo ' post-id: ' .  $post->postId; ?></span>
      </div>
      <div class="bg-secondary p-1 m-1">
        <p><?php echo $post->body; ?></p>
      </div>
      <div class="bg-light p-1 mb-1">
	    <span><i>written by</i> <?php echo '<b>' . $post->name . '</b>'; ?>
	    on
	    <?php echo $post->postCreated?>

	   <?php if($_SESSION['user_id'] == $post->userId){
	       echo '<a style="float:right" href="' . URLROOT . 'posts/edit/' . $post->postId .  '" class="btn btn-dark">edit</a>';
	   }
	   ?>
       </div>
    </div>
</div>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
