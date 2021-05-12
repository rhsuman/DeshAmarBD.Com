<article class="mb-3 shadow-sm">
    <h4 class="block-title border-bottom border-dark mb-0 bg-white">
        <span class="text-light" style="background-color: <?php echo html_escape($category->color); ?>">
            <?php echo html_escape($category->name); ?></span>
    </h4>
    <div class="row row-cols-1 row-cols-md-3 g-2">
        <?php
        if (isset($this->category_posts['category_' . $category->id])):
            $count = 0;
            $category_posts = $this->category_posts['category_' . $category->id];
            foreach ($category_posts as $post):
                if ($count < 6):
                    ?>

        <div class="col">
            <div class="card bg-dark text-white overflow-hidden rounded-0">
                <div class="img-ratio-2">
                    <img src="<?= base_url('images/thumblail/' . $post->image) ?>" class="card-img" alt="<?= $post->title?>">
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
 
                    <h5 class="card-title"><a class="text-light" href="<?= base_url('view/' . $post->title_slug) ?>"><?= $post->title ?></a></h5>
                    <p class="card-text"><span class="far fa-clock"></span> <?= time_ago($post->created_at); ?></p>
                </div>
            </div>
        </div>
        <?php
        endif;
                $count++;
            endforeach;
        endif;
        ?>

        

    </div>
</article>