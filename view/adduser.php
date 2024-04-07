<?php
global $error;
global $error_exists;
?>
<section class="login container">
    <div class="row">
        <div class="col-md-6 offset-md-3 d-flex justify-content-center align-items-center">
            <form method="POST" action="<?php echo __HOME__ . 'adduser' ?>">
                <h3>ADD USER</h3>
                <div class="form-group">
                    <label>FUll Name <span>requied *</span></label>
                    <input type="text" class="form-control <?php _e(['fullname', $error]) ?>" name="fullname">
                </div>
                <div class="form-group">
                    <label>Username <span>
                            <?php echo $error_exists ? 'already exists' : 'requied'; ?> *
                        </span>
                    </label>
                    <input type="text"
                        class="form-control <?php echo $error_exists ? 'is-error' : _e(['username', $error]); ?>"
                        name="username">
                </div>
                <div class="form-group">
                    <label>Password <span>requied *</span></label>
                    <input type="text" class="form-control <?php _e(['password', $error]) ?>" name="password">
                </div>
                <div class="form-group">
                    <div class="form-radio <?php _e(['gender', $error]) ?>">
                        <label><input type="radio" class="form-control" name="gender" value="1">MALE</label>
                        <label><input type="radio" class="form-control" name="gender" value="-1">FEMALE</label>
                    </div>
                    <span>REQUIRED *</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
</section>