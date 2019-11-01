<h2><u><?= $title; ?></u></h2>

<?php echo form_open('posts/update'); ?>

<input type="hidden" name="id" value="<?php echo $post['id']; ?>">

<form>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name='title' class="form-control" id="title" placeholder="Post title" value="<?php echo $post['title']; ?>">
    <div class="text-danger"><?php echo form_error('title'); ?></div>
  </div>

  <div class="form-group">
      <label for="body">Post Body</label>
    <textarea name="body" id="editor1" class="form-control" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
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

  <button type="submit" class="btn btn-primary" name="edit_post">Edit Post</button>
</form>
