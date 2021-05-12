<footer class="section-footer bg-white border-top">
    <div class="container-xl">
        <section class="footer-copyright border-top py-3">
            <p target="_blank" class="float-end text-muted">
                <?php foreach ($this->pagemenu as $page) : ?>
                <a href="<?= base_url('page' .$page->slug )?>"><?= $page->title?></a> 
                <?php endforeach;?>
            </p>
            <p class="text-muted"> &copy <?= $this->settings['copyright'] ?> <?= $this->settings['site_title'] ?>  All rights reserved </p>

        </section>
    </div><!-- //container -->
</footer>