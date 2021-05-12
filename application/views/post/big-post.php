<div class="card">
    <div class="img-ratio">
        <img src="<?= base_url('images/thumblail/' . $post->image) ?>" alt="<?= $post->title ?>" class="card-img-top" alt="<?= $post->title ?>">
    </div>
    <div class="card-body">
        <!-- author, date & comments -->
        <div class="card-text mb-2 text-muted small pl-1">
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
            </span>
        </div>
        <h5 class="card-title"><a href="<?= base_url('view/' . $post->title_slug) ?>"><?= $post->title ?></a></h5>
        <p class="card-text"><?= character_limiter(strip_tags($post->content), 80); ?></p>
    </div>
</div>