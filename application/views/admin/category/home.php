<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                        <a href="<?= base_url('categories/create') ?>" class="btn btn-sm btn-primary float-right">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>parent</th>
                                    <th>Color</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $item): ?>
                                    <tr>
                                        <th><?= $item->id ?></th>
                                        <th><?= $item->name ?></th>
                                        <td><?php echo character_limiter(strip_tags($item->description), 60); ?></td>
                                        <th>
                                            <?php
                                            if (!empty($item->parent_id)) {
                                                echo html_escape(helper_get_category($item->parent_id)->name);
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </th>

                                        <td class="text-light" style="background-color: <?= $item->color ?>"><?= $item->color ?></td>
                                        <td>
                                            <?php
                                            $author = get_user($item->user_id);
                                            if (!empty($author)) {
                                                echo html_escape($author->username);
                                            }
                                            ?>

                                        </td>
                                        <td><?= $item->status ? '<span class="badge bg-green"> Active</span>' : '<span class="badge bg-red">Inactive</span>'; ?></td>
                                        <td><?php if ($this->session->userdata('user_id') == $item->user_id) { ?>
                                                <a href="<?php echo base_url(); ?>categories/edit/<?= $item->id; ?>" class="btn btn-sm bg-blue"> <i class="fa fa-pen"></i></a>
                                                <a href="<?php echo base_url(); ?>categories/delete/<?= $item->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm bg-red"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($item->status == 1) {
                                                    ?>
                                                    <a class="btn btn-sm bg-gradient-red" href="<?php echo base_url(); ?>categories/unpublish/<?= $item->id; ?>">Druft</a></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-sm bg-gradient-green" href="<?php echo base_url(); ?>categories/publish/<?= $item->id; ?>">Publish</a></li>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>parent</th>
                                    <th>Color</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

               
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>