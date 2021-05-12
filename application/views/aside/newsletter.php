<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card rounded-0 mb-3">
    <h5 class="card-header">Newsletter</h5>
    <div class="card-body">
        <?= validation_errors() ?>
        <?= form_open('site/subscribe') ?>
        <div class="mb-3">
            <label class="form-label">Signup today for free and be the first to get notified on new updates. </label>
            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <?= form_error('email', '<div class="badge bg-red-lt">', '</div>'); ?>
        </div>
        <?= form_close() ?>
    </div>
</div>  