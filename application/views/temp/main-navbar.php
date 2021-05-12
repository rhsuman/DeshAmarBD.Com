<nav class="navbar navbar-expand-lg navbar-light bg-white border-top shadow-sm sticky-top">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar_main">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?= menu_anchor(base_url(), "Home") ?>
                <?php
                foreach ($this->menu_links as $item):
                    if ($item['parent_id'] == "0"):
                        $sub_links = helper_get_sub_menu_links($item['id']);
                        if (!empty($sub_links)):
                            ?>
                            <li class="nav-item dropdown <?php
                            echo (uri_string() == 'category/' . $item['slug'] ||
                            uri_string() == $item['slug']) ? 'active' : '';
                            ?>">
                                <a class="nav-link dropdown-toggle" href="<?php echo $item['link']; ?>" data-toggle="dropdown" role="button" aria-expanded="false" >
                                    <span class="nav-link-title">
                                        <?php echo $item['title']; ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-3">
                                    <?php foreach ($sub_links as $sub_item): ?>
                                        <li >
                                            <a class="dropdown-item" href="<?php echo $sub_item['link']; ?>"><?php echo html_escape($sub_item['title']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item <?php
                            echo (uri_string() == 'category/' . $item['slug'] ||
                            uri_string() == $item['slug']) ? 'active' : '';
                            ?>">
                                <a href="<?php echo $item['link']; ?>" class="nav-link"><?php echo html_escape($item['title']); ?></a>
                            </li>
                        <?php
                        endif;
                    endif;
                endforeach;
                ?>
                <?= menu_anchor(base_url('coronavirus'), "Corona") ?>
            </ul>
            <div class="ml-md-auto pl-md-4 py-2 py-md-0 mr-md-4 order-first order-md-last flex-grow-1 flex-md-grow-0">
                    <form action="<?= base_url(); ?>site/search" method="get">
                        <div class="input-icon">
                            <input name="q" maxlength="300" pattern=".*\S+.*" class="typeahead form-control mr-sm-2" type="text" placeholder="Search">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</nav>