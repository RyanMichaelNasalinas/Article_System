<h2><u><?= $title; ?></u></h2>

<?php echo form_open_multipart('posts/create'); ?>

  <div class="form-group">
    <label for="title">Title</label>
      <input type="text" name='title' class="form-control" id="title" placeholder="Post title">
      <div class="text-danger"><?php echo form_error('title'); ?></div>
  </div>

  <div class="form-group">
    <label for="body">Post Body</label>
      <textarea name="body" id="editor1" class="form-control" placeholder="Add Body"></textarea>
      <div class="text-danger"><?php echo form_error('body'); ?></div>
  </div>

  <div class="form-group">
      <label for="category">Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
  </div>

  <div class="form-group">
    <label>Upload Image</label><br>
    <input type="file" name="userfile" size="20">
  </div>
  
  <button type="submit" class="btn btn-primary" name="create_post">Create Post</button>
</form>
