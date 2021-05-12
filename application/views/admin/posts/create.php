<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                        <?= form_open_multipart('posts/create') ?>
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Post title" required>
                        </div>
                        <div class="form-group">
                            <label>Description (Meta Tag)</label>
                            <input type="text" class="form-control" name="description" placeholder="Post keywords" required>
                        </div>
                        <div class="form-group">
                            <label>Keywords (Meta Tag)</label>
                            <input type="text" class="form-control" name="keywords" placeholder="Post keywords" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option value="">No Selected</option>
                                        <?php foreach ($categories as $row): ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Sub Category</label>
                                    <select class="form-control" id="sub_category" name="subcategory_id">
                                        <option>No Selected</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" required>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image Description</label>
                                    <input type="text" name="image_description" class="form-control" placeholder="Image Description">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Video</label>
                            <input type="text" name="video_path" class="form-control" placeholder="Video Path">
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea id="summernote" class="form-control" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" id="tags" class="form-control" name="tags" placeholder="Input placeholder">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="icheck-primary">
                                <input type="radio" name="status" id="status1" value="1" checked>
                                <label for="status1">Publish</label>
                            </div>
                            <div class="icheck-primary">
                                <input type="radio" name="status" id="status2" value="0">
                                <label for="status2">Publish</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_featured" id="is_featured1" value="1">
                                <label for="is_featured1">Feature Post</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_breaking" id="is_breaking1" value="1">
                                <label for="is_breaking1">Bracking Post</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_slider" id="is_slider1" value="1">
                                <label for="is_slider1">Slider Post</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_recommended" id="add_recommended1" value="1">
                                <label for="add_recommended1">Recommended Post</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="need_auth" id="need_auth1" value="1">
                                <label for="need_auth1">Show Only to Registered Users</label>
                            </div>
                        </div>

                        <hr>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <?= form_close() ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>