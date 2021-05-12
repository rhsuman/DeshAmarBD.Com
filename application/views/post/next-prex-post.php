<!-- Next Prev Post -->
<div class="row row-deck">
    <div class="col">
        <?php if (!empty($previous_post)): ?>
            <div class="card">
                <div class="ribbon ribbon-left bg-dark-lt"><!-- SVG icon code -->
                    Previous Post
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo base_url('view/' . $previous_post->title_slug) ?>"><?= $previous_post->title; ?></a>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="col">
        <?php if (!empty($next_post)): ?>
            <div class="card">
                <div class="text-right"><!-- SVG icon code -->
                    Next Post
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo base_url('view/' . $next_post->title_slug) ?>"><?= $next_post->title; ?></a>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>