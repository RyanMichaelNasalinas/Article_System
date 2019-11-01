

<?php echo form_open('users/register'); ?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h2><?= $title; ?></h2>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                <div class="text-danger"><?php echo form_error('name'); ?></div>
            </div>

            <div class="form-group">
                <label>Authenthication</label>
                <input type="text" name="authentication" class="form-control" placeholder="Authentication Code">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="text-danger"><?php echo form_error('email'); ?></div>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="text-danger"><?php echo form_error('username'); ?></div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="text-danger"><?php echo form_error('password'); ?></div>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                <div class="text-danger"><?php echo form_error('password2'); ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
<?php echo form_close(); ?>