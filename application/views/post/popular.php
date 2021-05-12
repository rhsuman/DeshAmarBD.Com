
                    <div class="d-flex list-group-item">
                        <div class="flex-shrink-0">
                            <div class="img-ratio-2">
                                <img src="<?= base_url('images/thumblail/' . $post->image) ?>" alt="<?= $post->title; ?>" class="img-64">
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            
                                <small class="badge bg-primary">
                                    <a class="p-1 text-light" href=""><?= html_escape($post->username); ?></a>
                                </small>
                            
                            <small class="float-end"><i class="far fa-clock"></i> <?= time_ago($post->created_at); ?></small> 
                            <p class=""><a href="<?= base_url('view/' . $post->title_slug) ?>"><?= character_limiter(strip_tags($post->title), 40) ?></a></p>
                        </div>
                    </div>
                