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
                        <?= form_open_multipart('categories/update') ?>
                        <input type="text" name="category_id" value="<?= $category->id ?>" hidden>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control rounded-0" name="name" value="<?= $category->name ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description (Meta Tag)</label>
                            <input type="text" class="form-control rounded-0" name="description" value="<?= $category->description ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keywords (Meta Tag)</label>
                            <input type="text" class="form-control rounded-0" name="keywords" value="<?= $category->keywords ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Parent Link</label>
                            <select class="custom-select rounded-0" name="parent_id">
                                <option value="0">Select</option>
                                <?php foreach ($categories as $value): ?>
                                    <option value="<?= $value->id ?>" <?php echo ($category->parent_id == $value->id) ? 'selected' : ''; ?>><?= $value->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <div class="input-group my-colorpicker2">
                                <input type="text" name="color" class="form-control rounded-0 my-colorpicker2" value="<?= $category->color ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= form_label('status') ?>
                            <div class="icheck-primary">
                                <input type="radio" id="someRadioId1" name="status" value="1" class="square-purple" <?php echo ($category->status == '1') ? 'checked' : ''; ?>>
                                <?= form_label('Publish', 'someRadioId1') ?>
                            </div>
                            <div class="icheck-primary">
                                <input type="radio" id="someRadioId2" name="status" value="0" class="square-purple" <?php echo ($category->status != '1') ? 'checked' : ''; ?>>
                                <?= form_label('Druft', 'someRadioId2') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" name="show_at_homepage" id="homepahe" value="1" <?php echo ($category->show_at_homepage == '1') ? 'checked' : ''; ?>>
                                <label for="homepahe">Show At Homepage</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Block Type</label>
                            <div class="icheck-primary d-inline-flex">
                                <input type="radio" name="block_type" id="block-1" value="block-1" <?php echo ($category->block_type == 'block-1') ? 'checked' : ''; ?>>
                                <label for="block-1">block 1</label> <img src="<?= base_url('img/block/block-1.png') ?>" alt="block-1" class="img-size-64"/>
                            </div>
                            <div class="icheck-primary d-inline-flex">
                                <input type="radio" name="block_type" id="block-2" value="block-2" <?php echo ($category->block_type == 'block-2') ? 'checked' : ''; ?>>
                                <label for="block-2">block 2</label> <img src="<?= base_url('img/block/block-2.png') ?>" alt="block-2" class="img-size-64"/>
                            </div>
                            <div class="icheck-primary d-inline-flex">
                                <input type="radio" name="block_type" id="block-3" value="block-3" <?php echo ($category->block_type == 'block-3') ? 'checked' : ''; ?>>
                                <label for="block-3">block 3</label> <img src="<?= base_url('img/block/block-3.png') ?>" alt="block-3" class="img-size-64"/>
                            </div>
                            <div class="icheck-primary d-inline-flex">
                                <input type="radio" name="block_type" id="block-4" value="block-4" <?php echo ($category->block_type == 'block-4') ? 'checked' : ''; ?>>
                                <label for="block-4">block 4</label> <img src="<?= base_url('img/block/block-4.png') ?>" alt="block-4" class="img-size-64"/>
                            </div>
                            <div class="icheck-primary d-inline-flex">
                                <input type="radio" name="block_type" id="block-5" value="block-5" <?php echo ($category->block_type == 'block-5') ? 'checked' : ''; ?>>
                                <label for="block-5">block 5</label> <img src="<?= base_url('img/block/block-5.png') ?>" alt="block-5" class="img-size-64"/>
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