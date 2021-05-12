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
                <?= form_open_multipart('categories/create') ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label>Description (Meta Tag)</label>
                    <input type="text" class="form-control rounded-0" name="description" placeholder="Description (Meta Tag)" required>
                </div>
                <div class="form-group">
                    <label>Keywords (Meta Tag)</label>
                    <input type="text" class="form-control rounded-0" name="keywords" placeholder="Keywords (Meta Tag)">
                </div>
                <div class="form-group">
                    <?= form_label('Parent category') ?>
                    <select class="form-control select2bs4" name="parent_id">
                        <option value="0">Select</option>
                        <?php foreach ($categories as $value): ?>
                            <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <div class="input-group my-colorpicker2">
                        <input type="text" name="color" class="form-control rounded-0 my-colorpicker2" placeholder="#ff0099">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Starus</label>
                    <?= form_label('status') ?>
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
                        <input type="checkbox" name="show_at_homepage" id="homepahe" value="1">
                        <label for="homepahe">Show At Homepage</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Block Type</label>
                    <div class="icheck-primary">
                        <input type="radio" name="block_type" id="block-1" value="block-1">
                        <label for="block-1"></label> <img src="<?= base_url('img/block/block-1.png')?>" alt="block-1" class="img-size-64"/>
                    </div>
                    <div class="icheck-primary">
                        <input type="radio" name="block_type" id="block-2" value="block-2">
                        <label for="block-2">block 2</label> <img src="<?= base_url('img/block/block-2.png')?>" alt="block-1" class="img-size-64"/>
                    </div>
                    <div class="icheck-primary">
                        <input type="radio" name="block_type" id="block-3" value="block-3">
                        <label for="block-3">block 3</label> <img src="<?= base_url('img/block/block-3.png')?>" alt="block-1" class="img-size-64"/>
                    </div>
                    <div class="icheck-primary">
                        <input type="radio" name="block_type" id="block-4" value="block-4">
                        <label for="block-4">block 4</label> <img src="<?= base_url('img/block/block-4.png')?>" alt="block-1" class="img-size-64"/>
                    </div>
                    <div class="icheck-primary">
                        <input type="radio" name="block_type" id="block-5" value="block-5">
                        <label for="block-5">block 5</label> <img src="<?= base_url('img/block/block-5.png')?>" alt="block-1" class="img-size-64"/>
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