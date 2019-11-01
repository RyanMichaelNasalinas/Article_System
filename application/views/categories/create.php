<h2><u><?= $title; ?></u></h2>
<!--  Create view -->
<?php echo form_open_multipart('categories/create'); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Categogy name">
            <div class="text-danger"><?php echo form_error('name'); ?></div>
    </div>
    <button type="submit" class="btn btn-secondary">Submit</button>
</form>
