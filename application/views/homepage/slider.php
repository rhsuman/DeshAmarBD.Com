<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
        <li data-target="#carousel" data-slide-to="4"></li>
    </div>
    <div class="carousel-inner">
        <?php
        $count = 0;
        foreach ($sliders as $item):
            if ($count < 4):
                if ($count < 1):
                    ?>
                    <div class="carousel-item active">
                        <div class="pw-img">
                            <img src="<?php echo base_url('images/thumblail/') . $item->image; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <?php
                            $category = helper_get_category($item->category_id);
                            if (!empty($category)):
                                ?>
                                <small class="" style="background-color: <?= $category->color ?>">
                                    <a class="p-1 text-light" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                                </small>
                            <?php endif; ?>

                            <?php
                            $category = helper_get_category($item->subcategory_id);
                            if (!empty($category)):
                                ?>
                                <small class="" style="background-color: <?= $category->color ?>">
                                    <a class="p-1 text-light" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                                </small>
                            <?php endif; ?>

                            <h5><a class="text-light" href="<?= base_url('view/' . $item->title_slug) ?>"><?php echo $item->title; ?></a></h5>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="carousel-item">
                        <div class="pw_img">
                            <img src="<?php echo base_url('images/thumblail/') . $item->image; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <?php
                            $category = helper_get_category($post->category_id);
                            if (!empty($category)):
                                ?>
                                <small class="" style="background-color: <?= $category->color ?>">
                                    <a class="p-1 text-light" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                                </small>
                            <?php endif; ?>

                            <?php
                            $category = helper_get_category($post->subcategory_id);
                            if (!empty($category)):
                                ?>
                                <small class="" style="background-color: <?= $category->color ?>">
                                    <a class="p-1 text-light" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                                </small>
                            <?php endif; ?>
                            <h5><a class="text-light" href="<?= base_url('view/' . $item->title_slug) ?>"><?php echo $item->title; ?></a></h5>
                        </div>
                    </div>
                <?php
                endif;
            endif;
            $count++;
        endforeach;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


