<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                        <a href="<?= base_url('posts/create') ?>" class="btn btn-sm btn-primary float-right">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $item): ?>
                                    <tr>
                                        <th><?= $item->id ?></th>
                                        <td><img src="<?= base_url('images/' .$item->image) ?>" class="img-size-64"></td>
                                        <th><?= $item->title ?></th>
                                        <td><?php echo character_limiter(strip_tags($item->content), 60); ?></td>
                                        <th>
                                            <?php
                                            $category = helper_get_category($item->category_id);
                                            if (!empty($category)):
                                                ?>
                                                <label class="badge text-light" style="background-color: <?php echo html_escape($category->color); ?>!important;">
                                                    <?php echo html_escape($category->name); ?>
                                                </label>
                                            <?php endif; ?>

                                            <?php
                                            $category = helper_get_category($item->subcategory_id);
                                            if (!empty($category)):
                                                ?>
                                                <label class="badge text-light" style="background-color: <?php echo html_escape($category->color); ?>">
                                                    <?php echo html_escape($category->name); ?>
                                                </label>
                                            <?php endif; ?>
                                        </th>

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
                                                <a href="<?php echo base_url(); ?>posts/edit/<?= $item->id; ?>" class="btn btn-sm bg-blue"> <i class="fa fa-pen"></i></a>
                                                <a href="<?php echo base_url(); ?>posts/delete/<?= $item->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm bg-red"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($item->status == 1) {
                                                    ?>
                                                    <a class="btn btn-sm bg-gradient-red" href="<?php echo base_url(); ?>posts/unpublish/<?= $item->id; ?>">Druft</a></li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-sm bg-gradient-green" href="<?php echo base_url(); ?>posts/publish/<?= $item->id; ?>">Publish</a></li>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Category</th>
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