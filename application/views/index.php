<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('temp/_header'); ?>
<!--Top navbar-->
<?php $this->load->view('temp/top-navbar'); ?>

<!--Header-->
<?php $this->load->view('temp/header'); ?>

<!--main navbar-->
<?php $this->load->view('temp/main-navbar'); ?>

<!--start ticker-->
<?php $this->load->view('temp/ticker'); ?>

<!--news ticker-->
<?php if (isset($slider)): ?>
<!--Homepage feature Section-->
<section class="container-xl">
    <div class="row g-1">
        <!--Slider Area-->
        <div class="col-md-6">
            <?php $this->load->view('homepage/slider')?>
        </div>

        <!--Feature Srea-->
        <div class="col-md-6">
            <?php $this->load->view('homepage/featured')?>
        </div>
    </div>
</section>

<?php endif;?>
<div class="container-xl mt-3">
    <div class="row g-2">
        <div class="col-md-8">
            <?= $content?>
        </div>

        <aside class="col-md-4">
            <!--Sponser-->
            <?php $this->load->view('aside/sponser'); ?>
            <!--newsletter-->
            <?php $this->load->view('aside/newsletter'); ?>
            <!--Social-->
            <?php $this->load->view('aside/social'); ?>
            <!--Recent/Viewd-->
            <?php $this->load->view('aside/latest-tab'); ?>

            <!--Popular tab-->
            <?php $this->load->view('aside/popular-tab'); ?>
        </aside>
    </div>
</div>

<?php $this->load->view('temp/footer'); ?>

<?php $this->load->view('temp/_footer'); ?>