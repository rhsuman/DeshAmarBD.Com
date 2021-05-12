<nav class="navbar navbar-expand-lg navbar-black bg-black p-0 shadow-sm">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTop">
            <!--Date-->
            <div class="d-none d-lg-block pr-5">
                <div id="date" class="text-light"></div>
            </div>
            <ul class="navbar-nav me-auto">
                <?= menu_anchor(base_url(), "Home") ?>
                <!-- page Menu -->
                <?php foreach ($this->pagemenu as $page) : ?>
                    <?= menu_anchor(base_url('/page/' . $page->slug), "$page->title") ?>
                <?php endforeach; ?>
                <!-- Contact Menu -->
                <?= menu_anchor(base_url('contact'), "Contact") ?>
            </ul>

            <ul class="navbar-nav">
                <?php if($this->settings['facebook']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['facebook']?>" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <?php endif;?>
                <?php if($this->settings['twitter']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['twitter']?>" class="nav-link"><i class="fab fa-twitter"></i></a>
                </li>
                <?php endif;?>
                <?php if($this->settings['pinterest']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['pinterest']?>" class="nav-link"><i class="fab fa-pinterest-p"></i></a>
                </li>
                <?php endif;?>
                <?php if($this->settings['instagram']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['instagram']?>" class="nav-link"><i class="fab fa-instagram"></i></a>
                </li>
                <?php endif;?>
                <?php if($this->settings['telegram']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['telegram']?>" class="nav-link"><i class="fab fa-telegram-plane"></i></a>
                </li>
                <?php endif;?>
                <?php if($this->settings['youtube']):?>
                <li class="nav-item">
                    <a href="<?= $this->settings['youtube']?>" class="nav-link"><i class="fab fa-youtube"></i></a>
                </li>
                <?php endif;?>
                <?php if (!$this->session->userdata('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>" >
                                Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?= base_url('register') ?>" >
                                Register
                        </a>
                    </li>
                <?php elseif ($this->session->userdata('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>" >
                                <?= $this->session->userdata("username"); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout') ?>" >
                                Logout
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>