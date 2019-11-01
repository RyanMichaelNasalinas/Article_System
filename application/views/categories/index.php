<h2><u><?= $title; ?></u></h2>
<!--  Create view -->
<ul class="list-group">
    <?php foreach($categories as $category): ?>
        <li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>">    
        <?php echo $category['name']; ?></a>
         <!-- Make a delete button to delete the category -->
            <!--Check if the session user_id is equal to category user_id-->
            <?php if($this->session->userdata('logged_in')):?>
            <?php if($this->session->userdata['user_id'] == $category['user_id']): ?>
                    <form  action="categories/delete/<?php echo $category['id']; ?>" class="delete" method="post">
                        
                        &nbsp;<input type="submit" class="btn btn-danger btn-sm" value="&times" 
                        onclick="return confirm('Are you sure you want to delete this category')">
                        <?php endif; ?>    
                    </form>
            <?php endif; ?>
    </li> 
    <?php endforeach; ?>
</ul>