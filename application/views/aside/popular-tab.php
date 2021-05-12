<div class="card rounded-0 mb-3">
    <h5 class="card-header">Popular Post</h5>
    <ul class="nav nav-fill border-bottom p-0" id="popularTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active bg-white text-dark" id="week-tab" data-bs-toggle="tab" data-bs-target="#week" type="button" role="tab" aria-controls="week" aria-selected="true">This Week</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-white text-dark" id="month-tab" data-bs-toggle="tab" data-bs-target="#month" type="button" role="tab" aria-controls="month" aria-selected="false">This Month</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-white text-dark" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button" role="tab" aria-controls="year" aria-selected="false">This Year</button>
        </li>
    </ul>
    <div class="tab-content" id="popularsTabContent">
        <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="week-tab">
            <div class="list-group list-group-flush">
                <?php foreach ($this->popular_posts_week as $post): ?>
                    <?php $this->load->view('post/popular', ["post" => $post]) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">
            <ul class="list-group list-group-flush">
                <?php foreach ($this->popular_posts_month as $post): ?>
                    <?php $this->load->view('post/popular', ["post" => $post]) ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
            <ul class="list-group list-group-flush">
                <?php foreach ($this->popular_posts_year as $post): ?>
                    <?php $this->load->view('post/popular', ["post" => $post]) ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>