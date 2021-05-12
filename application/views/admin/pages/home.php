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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>parent</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pages as $post) : ?>
                                    <tr>
                                        <td><?php echo $post->id; ?></td>
                                        <td><?php echo $post->title; ?></td>
                                        <td><?php echo character_limiter(strip_tags($post->details), 60); ?></td>
                                        <td> <?php
                                            if (!empty($post->parent_id)) {
                                                echo html_escape(helper_get_pages($post->parent_id)->title);
                                            } else {
                                                
                                            }
                                            ?></td>
                                        <td><?php
                                            $author = get_user($post->user_id);
                                            if (!empty($author)) {
                                                echo html_escape($author->username);
                                            }
                                            ?></td>
                                        <td><?= $post->status ? '<span class="badge bg-green"> Active</span>' : '<span class="badge bg-red">Inactive</span>'; ?></td>
                                        <td><?php if ($this->session->userdata('user_id') == $post->user_id) { ?>
                                                <a href="<?php echo base_url(); ?>pages/edit/<?= $post->id; ?>" class=""> <i class="fas fa-edit"></i></a>
                                                <a href="<?php echo base_url(); ?>pages/delete/<?= $post->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash"></i></a>
                                                <?php
                                                if ($post->status == 1) {
                                                    ?>
                                                    <a class="badge bg-gradient-red" href="<?php echo base_url(); ?>pages/unpublish/<?= $post->id; ?>">Druft</a></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="badge bg-gradient-green" href="<?php echo base_url(); ?>pages/publish/<?= $post->id; ?>">Publish</a></li>
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