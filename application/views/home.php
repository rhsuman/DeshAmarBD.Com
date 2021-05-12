<?php
$count = 0;
    foreach ($posts as $value):
        ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('images/' . $value->image) ?>" class="img-fluid w-100 h-100" alt="<?= $value->title ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body py-1">
                        <div>
                            <?php
                            $category = helper_get_category($value->category_id);
                            if (!empty($category)):
                                ?>
                                <a class="text-white px-1" style="background-color: <?= $category->color ?>" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                            <?php endif; ?>

                            <?php
                            $category = helper_get_category($value->subcategory_id);
                            if (!empty($category)):
                                ?>
                                <a class="text-white px-1" style="background-color: <?= $category->color ?>" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
                            <?php endif; ?>
                                
                                <span class="float-end">
                                    <span class="far fa-eye" aria-hidden="true"></span> <?= $value->hit ?>  
                                    <span class="far fa-comments" aria-hidden="true"></span> <?php echo helper_comment_count($value->id); ?>
                                </span>
                        </div>
                        <h3 class="card-title post-title"><a href="<?= base_url('view/' . $value->title_slug) ?>"><?= $value->title ?></a></h3>
                        <div class="card-text"><?= character_limiter(strip_tags($value->content), 120); ?></div>
                        <div class="d-flex align-items-center pt-3 mt-auto">
                            <?php
                            $author = get_user($value->user_id);
                            if (!empty($author)):
                                ?>
                            <img src="<?= base_url('img/' . $author->avatar); ?>" class="rounded-circle avatar" alt="<?php echo html_escape($author->username); ?>"/>
                                <div class="ml-3">
                                    <a class="text-body" href="<?= base_url('author/' . $author->username) ?>">
                                        <?php echo html_escape($author->username); ?>
                                    </a>
                                    <small class="d-block text-muted"><?= time_ago($value->created_at); ?></small>
                                </div>
                            <?php endif; ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($count == 1): ?>
            <!--Include banner-->
            <div class="card">
                <div class="">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-3794927430690735"
                         data-ad-slot="9876921025"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($count == 3): ?>
            <!--Include banner-->
            <div class="card">
                <div class="">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-3794927430690735"
                         data-ad-slot="9876921025"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        <?php endif; ?>   
        <?php
        $count++;
    endforeach;
    ?>

            <div class="col-md-12 mt-3">
        <nav aria-label="Page navigation example">
            <?php echo $this->pagination->create_links(); ?>
        </nav>
    </div>