<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                        <a href="<?= base_url('posts/create') ?>" class="btn btn-sm btn-primary float-right">Create</a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $value): ?>
                                    <tr>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->massage ?></td>
                                        <td><?= $value->mobile ?></td>
                                        <td>Action</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>