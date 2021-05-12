<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="<?= base_url('img/' . $user->avatar) ?>"
                                 alt="<?= $user->username ?>">
                        </div>

                        <h3 class="profile-username text-center"><?= $user->username ?></h3>

                        <p class="text-muted text-center"><?= $user->role == 'admin' ? '<span class="badge bg-green"> Admin</span>' : '<span class="badge bg-red">User</span>'; ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right"><?= $user->username ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?= $user->email ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $user->about_me ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    <div class="card-body">

                        <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                        <?= form_open_multipart('auth/update') ?>
                        <input type="text" name="id" class="form-control" id="inputName" value="<?= $user->id ?>" hidden>
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="full_name" class="form-control" id="inputName" value="<?= $user->full_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">About Me</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" name="about_me" ><?= $user->about_me ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" name="facebook_url" class="form-control" id="inputSkills" value="<?= $user->facebook_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" name="twitter_url" class="form-control" id="inputSkills" value="<?= $user->twitter_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" name="instagram_url" class="form-control" id="inputSkills" value="<?= $user->instagram_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Pinterest</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pinterest_url" class="form-control" id="inputSkills" value="<?= $user->pinterest_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input type="text" name="linkedin_url" class="form-control" id="inputSkills" value="<?= $user->linkedin_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Tekegram</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telegram_url" class="form-control" id="inputSkills" value="<?= $user->telegram_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Youtube</label>
                                <div class="col-sm-10">
                                    <input type="text" name="youtube_url" class="form-control" id="inputSkills" value="<?= $user->youtube_url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>

                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->