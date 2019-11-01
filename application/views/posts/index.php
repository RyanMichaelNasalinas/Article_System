<h2><u><?= $title ?></u></h2>

<?php foreach($posts as $post): ?>
    <h3><?php echo $post['title']; ?></h3>
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" 
            alt="" class="img-thumbnail" width="100%">
        </div>

        <div class="col-md-9">
            <small class="bg-info text-dark p-1">Posted on:<b><?php echo $post['created_date']; ?></b> in <strong class="bg-dark text-light p-1"><?php echo $post['name']; 
            ?></strong></small>

            <div class="mt-2"><p><?php echo word_limiter($post['body'],50); ?></p></div>
            <p><a class="btn btn-outline-primary" href="<?php echo site_url('/posts/'.$post['url_title']); ?>">Read More</a></p>
        </div>
    </div>
    <hr>
    
<?php endforeach;?>
<div class="pagination-links text-center">
    <?php echo $this->pagination->create_links(); ?>
</div>
