<!--related post -->
<?php if (!empty($related_posts)): ?>
    <!--Block start-->
    <div class="block-area">
        <!--block title-->
        <div class="block-title-6">
            <h4 class="h5 border-primary">
                <span class="bg-primary text-white">Related post</span>
            </h4>
        </div>
        <!-- block content -->
        <div class="row clearfix">
            <?php foreach ($related_posts as $item): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="boxs project_widget">
                        <div class="pw_img img-ratio">
                            <img class="img-fluid" src="<?= base_url('images/thumblail/' . $item->image) ?>" alt="<?= $item->title ?>">
                        </div>
                        <div class="pw_content">
                            <div class="pw_header">
                                <h6><a href="<?= base_url('view/' . $item->title_slug) ?>"><?= $item->title ?></a></h6>
                                <small class="text-muted"><!--author-->
                                <?php
                                $author = get_user($item->user_id);
                                if (!empty($author)):
                                    ?>
                                    <span class="d-none d-sm-inline me-1 pr-2">
                                        <a class="fw-bold" href="<?= base_url('author/' . $author->username) ?>"><?php echo html_escape($author->username); ?></a>
                                    </span>
                                <?php endif; ?>
                                    |  
                                    <!--date-->
                                <time datetime="<?= $item->created_at; ?>">
                                    <span class="far fa-clock"></span> <?= time_ago($item->created_at); ?>
                                </time></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end block content -->
    </div>
    <!--End Block-->
<?php endif; ?>