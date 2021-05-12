<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                        <a href="<?= base_url('pages/create') ?>" class="btn btn-sm btn-primary float-right">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                        <?= form_open_multipart('pages/create') ?>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control rounded-0" name="title" placeholder="Page Title" required>
                        </div>
                        <div class="form-group">
                            <label>Description (Meta Tag)</label>
                            <input type="text" class="form-control rounded-0" name="description" placeholder="Description (Meta Tag)" required>
                        </div>
                        <div class="form-group">
                            <label>Keywords (Meta Tag)</label>
                            <input type="text" class="form-control rounded-0" name="keywords" placeholder="Keywords (Meta Tag)" required>
                        </div>
                        <div class="form-group">
                            <label>Parent Link</label>
                            <select class="custom-select rounded-0" name="parent_id">
                                <option value="0">Select</option>
                                <?php foreach ($pages as $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="details" id="summernote" class="form-control rounded-0" required></textarea>
                        </div>
                        <div class="form-group">
                            <?= form_label('status') ?>
                            <div class="icheck-primary">
                                <?= form_radio(array('name' => 'status', 'id' => 'someRadioId1', 'value' => '1', 'checked' => TRUE)) ?>
                                <?= form_label('Publish', 'someRadioId1') ?>
                            </div>
                            <div class="icheck-primary">
                                <?= form_radio(array('name' => 'status', 'id' => 'someRadioId2', 'value' => '1', 'checked' => FALSE)) ?>
                                <?= form_label('Draft', 'someRadioId2') ?>
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