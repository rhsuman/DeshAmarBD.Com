<article class="mb-3 shadow-sm">
    <h4 class="block-title border-bottom border-dark mb-0 bg-white">
        <span class="text-light" style="background-color: <?php echo html_escape($category->color); ?>">
            <?php echo html_escape($category->name); ?></span>
    </h4>
    <div class="row g-1">
        <div class="col-md-6">
            <?php
        if (isset($this->category_posts['category_' . $category->id])):
            $count = 0;
            $category_posts = $this->category_posts['category_' . $category->id];
            foreach ($category_posts as $post):
                ?>
            <?php $this->load->view('post/big-post', ["post" => $post]) ?>
            <?php
                break;
            endforeach;
        endif;
        ?>
        </div>

        <div class="col-md-6">
            <div class="list-group list-group-flush  rounded-0">
                 <?php
            if (!empty($category_posts)):
                $count = 0;
                foreach ($category_posts as $post):
                    ?>
                    <?php if ($count > 0 && $count < 5): ?>
                <!--Post-->
                <?php $this->load->view('post/small-post', ["post" => $post]) ?>
                <!--Post-->
                <?php
                    endif;
                    $count++;
                endforeach;
            endif;
            ?>
            </div>
        </div>
    </div>
</article>