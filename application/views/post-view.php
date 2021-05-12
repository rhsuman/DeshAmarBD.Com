<div class="card">
    <div class="card-body">
        <?php
        $category = helper_get_category($post->category_id);
        if (!empty($category)):
            ?>
            <a class="badge text-white rounded-0" style="background-color: <?= $category->color; ?>" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
        <?php endif; ?>

        <?php
        $category = helper_get_category($post->subcategory_id);
        if (!empty($category)):
            ?>
            <a class="badge text-white rounded-0" style="background-color: <?= $category->color; ?>" href="<?= base_url('category/' . $category->slug) ?>"><?= html_escape($category->name); ?></a>
        <?php endif; ?>
        <h2 class="card-title"><?= html_escape($post->title) ?></h2>
        <hr>
        <div class="mb-5">
            <ul class="post-meta list-inline">
                <li class="list-inline-item">
                    <?php
                    $author = get_user($post->user_id);
                    if (!empty($author)):
                        ?>
                        <i class="far fa-user"></i> <a href="<?= base_url('author/' . $author->username) ?>#">
                            <?php echo html_escape($author->username); ?>
                        </a>
                    <?php endif; ?>
                </li>
                <li class="list-inline-item">
                    <i class="far fa-clock"></i><time datetime="<?php echo $post->created_at; ?>"><?php echo time_ago($post->created_at); ?></time> 
                </li>
                <li class="list-inline-item">
                    <i class="far fa-comments"></i> <?php echo helper_comment_count($post->id); ?> Comments
                </li>
                <li class="list-inline-item">
                    <i class="far fa-eye"></i> <?= $post->hit; ?>x view
                </li>
            </ul>
        </div>
        <figure class="figure">
            <img src="<?= base_url('images/' . strip_image_tags($post->image)) ?>" class="figure-img img-fluid rounded" alt="<?= $post->title; ?>">
            <figcaption class="figure-caption text-center"><?= $post->image_description; ?></figcaption>
        </figure>
        <br> 
        <?php if (!empty($post->video_path)): ?>

            <video id="vid1" class="video-js vjs-fluid vjs-default-skin" controls
                   data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?= $post->video_path ?>"}] }'
                   >
            </video>
        <?php endif; ?>

        <p><?= $post->content; ?></p>
        <hr>
        <?php if (!empty($tags)):
            ?>
            <p class="hr-text hr-text-left">Tags</p>
            <?php foreach ($tags as $tag) : ?>
                <a class="badge bg-primary" href="<?= base_url() ?>site/tag?q=<?php echo $tag['tag_slug']; ?>"><?php echo $tag['tag']; ?></a>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="social-share my-3">
            <!--Social Share-->
            <a href="javascript:void(0)"
               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('view/' . $post->title_slug); ?>', 'Share This Post', 'width=640,height=450');
                       return false"
               class="bg-facebook text-white badge">
                <i class="fab fa-facebook"></i>
                <span class="hidden-sm">Facebook</span>
            </a>

            <a href="javascript:void(0)"
               onclick="window.open('https://twitter.com/share?url=<?php echo base_url('view/' . $post->title_slug); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');
                       return false"
               class="bg-twitter text-white btn-sm badge">
                <i class="fab fa-twitter"></i>
                <span class="hidden-sm">Twitter</span>
            </a>

            <a href="https://api.whatsapp.com/send?text=<?php echo html_escape($post->title); ?> - <?php echo base_url('view/' . $post->title_slug); ?>" target="_blank"
               class="bg-success text-white badge">
                <i class="fab fa-whatsapp"></i>
                <span class="hidden-sm">Whatsapp</span>
            </a>

            <a href="javascript:void(0)"
               onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url('view/' . $post->title_slug); ?>', 'Share This Post', 'width=640,height=450');
                       return false"
               class="bg-linkedin text-white badge">
                <i class="fab fa-linkedin"></i>
                <span class="hidden-sm">Linkedin</span>
            </a>

            <a href="javascript:void(0)"
               onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo base_url('view/' . $post->title_slug); ?>&amp;media=<?php echo base_url($post->image); ?>', 'Share This Post', 'width=640,height=450');
                       return false"
               class="bg-pinterest text-white badge">
                <i class="fab fa-pinterest"></i>
                <span class="hidden-sm">Pinterest</span>
            </a>

            <a href="javascript:void(0)"
               onclick="window.open('mailto:?subject=<?= $post->title ?>&amp;body==Read&nbsp;complete&nbsp;article&nbsp;in&nbsp;here&nbsp;<?php echo base_url('view/' . $post->title_slug); ?>&amp;media=<?php echo base_url($post->image); ?>', 'Share This Post', 'width=640,height=450');
                       return false"
               class="bg-warning text-white badge">
                <span class="fa fa-envelope">Email</span>
            </a>

        </div>
    </div>
</div>
<hr>
<?php $this->load->view('post/author-box', ["post" => $post]); ?>
<hr>
<?php $this->load->view('post/next-prex-post', ["post" => $post]); ?>
<hr>
<?php $this->load->view('post/related-post', ["post" => $post]); ?>
<hr>
<?php $this->load->view('post/comment-view', ["post" => $post]); ?>
<hr>
<?php $this->load->view('post/comment-box', ["post" => $post]); ?>