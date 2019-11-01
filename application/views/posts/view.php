<h2><u><?= $post['title']; ?></u></h2>

<div class="bg-info text-dark p-1">Posted on:<b><?php echo $post['created_date']; ?></b></div>
<br>

<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" 
            alt="" class="img-thumbnail">
<div class="mt-2"><p><?php echo $post['body']; ?></p></div>
    
<hr>
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
    <!--Delete post view-->
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <!--Edit post-->
    <a href="edit/<?php echo $post['url_title']; ?>" class="btn btn-secondary">Edit</a>
        <input type="submit" value="Delete" class="btn btn-danger float-right" onclick="return confirm('Are you sure you want delete this post');">
    </form>
    <hr>
<?php endif; ?>

<h3>Comments</h3>
    <?php if($comments): ?>
        <?php foreach($comments as $comment): ?>
        <div class="card card-body bg-secondary">
            <h5><?php echo $comment['body']; ?>[by <strong><?php echo $comment['name']; ?></strong>]</h5>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No Comment(s) to dispaly</p>
<?php endif;?>
<hr>
<!-- Comments section -->
<h3>Add Comment</h3>
<?php echo form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        <div class="text-danger"><?php echo form_error('name'); ?></div>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        <div class="text-danger"><?php echo form_error('email'); ?></div>
    </div>

    
    <div class="form-group">
        <label>Body</label>
       <textarea class="form-control" id="editor1" name="body"></textarea>
       <div class="text-danger"><?php echo form_error('body'); ?></div>
    </div>
    <!--Pass the url title-->
    <input type="hidden" name="url_title" value="<?php echo $post['url_title']; ?>">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

