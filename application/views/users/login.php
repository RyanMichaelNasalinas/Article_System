<?php echo form_open('users/login');  ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 mt-5 border border-dark p-5">
            <h1><?= $title; ?></h1>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
                </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>