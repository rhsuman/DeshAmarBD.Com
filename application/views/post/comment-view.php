<?php if ($comments) : ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="card mt-3">
                <div class="list-group card-list-group">
                    <div class="list-group-item">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto">
                                <div class="text-muted">
                                    <span class="avatar"></span></div>

                            </div>
                            <div class="col">
                                <?php echo $comment->name; ?>
                                <div class="text-muted">
                                    <?php echo $comment->body; ?>
                                </div>
                            </div>
                            <div class="col-auto text-muted"><?= $comment->created_at = nice_date($comment->created_at, 'F d, Y') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="card">
            <p class="card-body">No Comments To Display</p>
        </div>
    <?php endif; ?>