<div class="card rounded-0 mb-3">
    <ul class="nav nav-fill border-bottom" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active bg-white text-dark" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">latest Post</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-white text-dark" id="viewed-tab" data-bs-toggle="tab" data-bs-target="#viewed" type="button" role="tab" aria-controls="viewed" aria-selected="false">Most Viewed</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
            <div class="list-group list-group-flush">
                <?php foreach ($this->latest as $post): ?>
                <?php $this->load->view('post/small-post', ["post" => $post])?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="viewed" role="tabpanel" aria-labelledby="viewed-tab">
            <div class="list-group list-group-flush">
               <?php foreach ($this->populars as $post): ?>
                    <?php $this->load->view('post/small-post', ["post" => $post])?>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>

</div>