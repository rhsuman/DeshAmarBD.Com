<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <p class="card-title"><?= $title; ?></p>
                <a href="<?= base_url('pages/create') ?>" class="btn btn-default float-right">Create</a>
            </div>
            <!-- Flash messages -->
            <?php if ($this->session->flashdata('page_created')): ?>
                <?php echo '<p class="card-alert alert alert-success mb-0" role="alert">' . $this->session->flashdata('page_created') . '</p>'; ?>
            <?php endif; ?>
            <div class="card-body">
                <table id="table1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $item): ?>
                            <tr>
                                <th><?= $item->id ?></th>
                                <th><?= $item->username ?></th>
                                <th><?= $item->email ?></th>
                                <td><?= $item->full_name ?></td>
                                <td><?= $item->is_active ? '<span class="badge bg-green"> Active</span>' : '<span class="badge bg-red">Inactive</span>'; ?>
                                    <?= $item->role == 'admin' ? '<span class="badge bg-green"> Admin</span>' : '<span class="badge bg-red">User</span>'; ?></td>
                                <td>
                                    <?php
                                    if ($item->is_active == 1) {
                                        ?>
                                        <a class="btn btn-sm bg-gradient-red" href="<?php echo base_url(); ?>auth/unpublish/<?= $item->id; ?>">Inactive</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-sm bg-gradient-green" href="<?php echo base_url(); ?>auth/publish/<?= $item->id; ?>">Active</a></li>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
