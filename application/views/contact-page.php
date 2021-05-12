<div class="card rounded-0 border-0">
        <div class="card-body">
            <h2 class="card-title"><?= html_escape($title) ?></h2>
            <hr>
             <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
            <?= form_open('site/contact'); ?>
            <div class="mb-3">
                <label class="form-label">Name*</label>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <?= form_error('name', '<div class="badge bg-red">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Email*</label>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <?= form_error('email', '<div class="badge bg-red">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="number" name="mobile" class="form-control" placeholder="Mobile" required>
                </div>
                <?= form_error('mobile', '<div class="badge bg-red">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Massage*</label>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="fa fa-book"></i>
                    </span>
                    <textarea class="form-control" name="massage" placeholder="massage"></textarea>
                </div>
            </div>
            <input type="submit" class="btn bg-primary float-right text-light mb-3" value="Submit">
            <?= form_close(); ?>
        </div>
    </div>