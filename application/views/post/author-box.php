<!-- author -->
<?php
$author = get_user($post->user_id);
if (!empty($author)):
    ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('img/' . $author->avatar); ?>" class="img-fluid rounded-circle" alt="<?= $author->username ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $author->username ?></h5>
                    <p class="card-text"><?= $author->about_me ?></p>
                    <p class="card-text">
                            <small class="text-muted">
                                <a class="list-inline-item" href="<?= $author->facebook_url ?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="list-inline-item" href="<?= $author->twitter_url ?>"><i class="fab fa-twitter"></i></a>
                                <a class="list-inline-item" href="<?= $author->instagram_url ?>"><i class="fab fa-instagram"></i></a>
                                <a class="list-inline-item" href="<?= $author->pinterest_url ?>"><i class="fab fa-pinterest-p"></i></a>
                                <a class="list-inline-item" href="<?= $author->linkedin_url ?>"><i class="fab fa-linkedin-in"></i></a>
                                <a class="list-inline-item" href="<?= $author->telegram_url ?>"><i class="fab fa-telegram-plane"></i></a>
                                <a class="list-inline-item" href="<?= $author->youtube_url ?>"><i class="fab fa-youtube"></i></a>
                            </small>
                        </p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

