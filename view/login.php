<?php
global $error;
?>

<section class="login container">
    <div class="row">
        <div class="col-md-6 offset-md-3 d-flex justify-content-center align-items-center">
            <form method="POST" action="<?php echo __HOME__ ?>">
                <h3>LOGIN</h3>
                <div class="form-group">
                    <label>Username <span>requied *</span></label>
                    <input type="text" class="form-control <?php _e(['username', $error]) ?>" name="username">
                </div>
                <div class="form-group">
                    <label>Password <span>requied *</span></label>
                    <input type="text" class="form-control <?php _e(['password', $error]) ?>" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</section>