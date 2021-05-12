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
                        <?= form_open_multipart('posts/update') ?>

                        <input type="text" name="post_id" value="<?= $post->id ?>" hidden>
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="title" value="<?= $post->title ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description (Meta Tag)</label>
                            <input type="text" class="form-control" name="description" value="<?= $post->description ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keywords (Meta Tag)</label>
                            <input type="text" class="form-control" name="keywords" value="<?= $post->keywords ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option value="">No Selected</option>
                                        <?php foreach ($categories as $item): ?>
                                            <?php if ($item->id == $post->category_id): ?>
                                                <option value="<?php echo html_escape($item->id); ?>" selected><?php echo html_escape($item->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Sub Category</label>
                                    <select class="form-control" id="sub_category" name="subcategory_id">
                                        <option>No Selected</option>
                                        <?php foreach ($subcategories as $item): ?>
                                            <?php if ($item->id == $post->subcategory_id): ?>
                                                <option value="<?php echo html_escape($item->id); ?>" selected><?php echo html_escape($item->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
                                            <input type="file" name="image" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image Description</label>
                                    <input type="text" name="image_description" class="form-control" value="<?= $post->image_description ?>">
                                </div>
                            </div>

                            <div class="loc-auto"><img class="img-size-64 img-bordered" src="<?= base_url('images/' . $post->image) ?>"></div>
                        </div>
                        <div class="form-group">
                            <label>Video</label>
                            <input type="text" name="video_path" class="form-control" value="<?= $post->video_path ?>">
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea id="summernote" class="form-control" name="content" required><?= $post->content ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" id="tags" class="form-control" name="post_tag" placeholder="Input placeholder">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="icheck-primary">
                                <input type="radio" id="status1" name="status" value="1"  <?php echo ($post->status == '1') ? 'checked' : ''; ?>>
                                <label for="status1">Publish</label>
                            </div>
                            <div class="icheck-primary">
                                <input type="radio" id="status2" name="status" value="0" <?php echo ($post->status != '1') ? 'checked' : ''; ?>>
                                <label for="status2">Publish</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_featured" value="1" id="is_featured1" <?php echo ($post->is_featured == 1) ? 'checked' : ''; ?>>
                                <label for="is_featured1">Feature Post</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_breaking" id="is_breaking1" value="1" <?php echo ($post->is_breaking == 1) ? 'checked' : ''; ?>>
                                <label for="is_breaking1">Bracking Post</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_slider" id="is_slider1" value="1" <?php echo ($post->is_slider == 1) ? 'checked' : ''; ?>>
                                <label for="is_slider1">Slider Post</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="is_recommended" value="1" id="add_recommended1" <?php echo ($post->is_recommended == 1) ? 'checked' : ''; ?>>
                                <label for="add_recommended1">Recommended Post</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="need_auth" id="need_auth1" value="1" <?php echo ($post->need_auth == 1) ? 'checked' : ''; ?>>
                                <label for="need_auth1">Show Only to Registered Users</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="Submit">
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