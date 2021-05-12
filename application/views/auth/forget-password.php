<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>" class="h1"><b>DeshAmar</b>BD</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php if ($this->session->flashdata('message')): ?>
                    <?= '<p class="login-box-msg">' . $this->session->flashdata('message') . '</p>'; ?>
                <?php endif; ?>
                <?php echo form_open("forget"); ?>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Forget</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?= form_close() ?>

                <p class="mt-3 mb-1">
                    <a href="<?= base_url('login')?>">Login</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('register')?>" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
