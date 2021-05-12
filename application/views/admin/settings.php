<!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('dashboard/update'); ?>
                        <div class="mb-3">
                            <label class="form-label">Site Title</label>
                            <input type="text" class="form-control" name="site_title" value="<?= $settings['site_title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control-file">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">favicon</label>
                            <input type="file" name="favicon" class="form-control-file">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Site Description</label>
                            <input type="text" class="form-control" name="site_description" value="<?= $settings['site_description'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Site Author</label>
                            <input type="text" class="form-control" name="site_author" value="<?= $settings['site_author'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Site Tag</label>
                            <input type="text" class="form-control" name="site_tag" value="<?= $settings['site_tag'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Copyright</label>
                            <input type="text" class="form-control" name="copyright" value="<?= $settings['copyright'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-facebook-f"></i>
                                </span>
                            </div>
                            <input type="text" name="facebook" class="form-control" placeholder="Facebook Url" value="<?= $settings['facebook'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-twitter"></i>
                                </span>
                            </div>
                            <input type="text" name="twitter" class="form-control" placeholder="Twitter Url" value="<?= $settings['twitter'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-instagram"></i>
                                </span>
                            </div>
                            <input type="text" name="instagram" class="form-control" placeholder="Instagram Url" value="<?= $settings['instagram'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-pinterest-p"></i>
                                </span>
                            </div>
                            <input type="text" name="pinterest" class="form-control" placeholder="Pinterest Url" value="<?= $settings['pinterest'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-telegram"></i>
                                </span>
                            </div>
                            <input type="text" name="telegram" class="form-control" placeholder="Telegram Url" value="<?= $settings['telegram'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-youtube"></i>
                                </span>
                            </div>
                            <input type="text" name="youtube" class="form-control" placeholder="Youtube Url" value="<?= $settings['youtube'] ?>">
                        </div>
                            
                        <div class="col-mb-3">
                            <button type="submit" class="btn btn-primary float-right">
                                Submit
                            </button>
                        </div>
                        <?php echo form_close(); ?><!--End Form -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
    <!-- /.content -->