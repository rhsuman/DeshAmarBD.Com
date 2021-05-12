<div class="row g-1">
    <?php foreach ($feature as $post): ?>
        <div class="col-6">
            <div class="card bg-dark text-white overflow-hidden rounded-0">
                <div class="img-ratio">
                    <img src="<?php echo base_url('images/thumblail/') . $post->image; ?>" class="card-img" alt="...">
                </div>
                <div class="card-img-overlay text-center">
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

                    <h5 class="card-title">
                        <a class="text-light" href="<?= base_url('view/' . $post->title_slug) ?>">
                            <?php echo $post->title; ?>
                        </a>
                    </h5>
                    <p class="card-text"><i class="far fa-clock"></i> <?= time_ago($post->created_at); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>