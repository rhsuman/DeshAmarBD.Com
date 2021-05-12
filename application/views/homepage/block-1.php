<article class="mb-3 shadow-sm">
    <h4 class="block-title border-bottom border-dark mb-0 bg-white">
        <span class="text-light" style="background-color: <?php echo html_escape($category->color); ?>">
            <?php echo html_escape($category->name); ?></span>
    </h4>

    <div class="row g-1">
        <!--left-->
        <?php
        if (isset($this->category_posts['category_' . $category->id])):
            $count = 0;
            $category_posts = $this->category_posts['category_' . $category->id];
            foreach ($category_posts as $post):
                if ($count < 2):
                    ?>
                    <div class="col-md-6">
                        <?php $this->load->view('post/big-post', ["post" => $post]) ?>
                    </div>
                    <?php
                endif;
                $count++;
            endforeach;
        endif;
        ?>
        <div class="row g-1">
            <?php
            if (!empty($category_posts)):
                $count = 0;
                foreach ($category_posts as $post):
                    if ($count > 1 && $count < 6):
                        if ($count % 2 == 0):
                            ?>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="list-group list-group-flush">
                                <?php $this->load->view('post/small-post', ["post" => $post]) ?>
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