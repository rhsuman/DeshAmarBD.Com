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
                if ($count < 3):
                    ?>
                    <div class="col">
                        <div class="card rounded-0">
                            <div class="img-ratio">
                                <img src="<?= base_url('images/thumblail/' . $post->image) ?>" alt="<?= $post->title ?>" class="card-img-top w-100 rounded-0">
                            </div>
                            <div class="card-body">
                                <!-- date & comments -->
                                <div class="card-text text-muted small">
                                    <time datetime="<?= $post->created_at; ?>">
                                    <span class="fas fa-clock"></span> <?= time_ago($post->created_at); ?>
                                </time>
                                    <span title="<?php echo helper_comment_count($post->id); ?> comment" class="float-end pr-1">
                                    <span class="fas fa-comment"></span> <?php echo helper_comment_count($post->id); ?>
                                </span>
                                </div>
                                <h5 class="card-title text-center"><a href="<?= base_url('view/' . $post->title_slug) ?>"><?= $post->title ?></a></h5>
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