<article class="mb-3 shadow-sm">
    <h4 class="block-title border-bottom border-dark mb-0 bg-white">
        <span class="text-light" style="background-color: <?php echo html_escape($category->color); ?>">
            <?php echo html_escape($category->name); ?></span>
    </h4>

    <!--Top part-->
    <div class="card mb-1">
        <div class="row g-0">
            <?php
            if (isset($this->category_posts['category_' . $category->id])):
                $count = 0;
                $category_posts = $this->category_posts['category_' . $category->id];
                foreach ($category_posts as $post):
                    if ($count < 7):
                        if ($count < 1):
                            ?>
                            <div class="col-md-4">
                                <img src="<?= base_url('images/thumblail/' . $post->image) ?>" class="img-fluid w-100 h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?= base_url('view/' . $post->title_slug) ?>"><?= $post->title ?></a></h5>
                                    <p class="card-text"><?= character_limiter(strip_tags($post->content), 120) ?></p>
                                    <p class="card-text small">
                                        <span class="far fa-user"></span>
                                        <?php
                                        $author = get_user($post->user_id);
                                        if (!empty($author)):
                                            ?>
                                            <span class="d-none d-sm-inline me-1 pr-2">
                                                <a class="fw-bold" href="<?= base_url('author/' . $author->username) ?>"><?php echo html_escape($author->username); ?></a>
                                            </span>
                                        <?php endif; ?>
                                        <time datetime="<?= $post->created_at; ?>">
                                            <span class="far fa-clock"></span> <?= time_ago($post->created_at); ?>
                                        </time>
                                        <span title="<?= $post->hit ?> View" class="float-end px-1">
                                            <span class="far fa-eye"></span> <?= $post->hit ?>
                                        </span>
                                        <span title="<?php echo helper_comment_count($post->id); ?> comment" class="float-end">
                                            <span class="far fa-comment"></span> <?php echo helper_comment_count($post->id); ?>
                                        </span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Bottom Part-->
                    <div class="row g-1">
                        <!--left-->
                    <?php else: ?>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <?php $this->load->view('post/small-post', ["post" => $post]) ?>
                            </ul>
                        </div>
                    <?php
                    endif;
                endif;
                $count++;
            endforeach;
        endif;
        ?>
        <!--Right-->

    </div>
</article>