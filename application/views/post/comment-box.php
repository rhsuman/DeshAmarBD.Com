<h3 class="hr-text">Add Comment</h3>
    <div class="card">
        <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('comments/create/' . $post->id); ?>

            <?php if ($this->session->userdata('user_id')) : ?>
                <input type="hidden" name="name" class="form-control" value="<?= $this->session->userdata("username"); ?>">
            <?php endif; ?>
            <?php if (!$this->session->userdata('user_id')) : ?>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg>
                    </span>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('user_id')) : ?>
                <input type="hidden" name="email" class="form-control" value="<?= $this->session->userdata("email"); ?>">
            <?php endif; ?>
            <?php if (!$this->session->userdata('user_id')) : ?>
                <div class="input-icon my-3">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="4"></circle><path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path></svg>
                    </span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            <?php endif; ?>
            <div class="input-icon my-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path><line x1="8" y1="8" x2="12" y2="8"></line><line x1="8" y1="12" x2="12" y2="12"></line><line x1="8" y1="16" x2="12" y2="16"></line></svg>
                </span>
                <textarea name="body" class="form-control" placeholder="Massege"></textarea>
            </div>
            <input type="hidden" name="slug" value="<?php echo $post->title_slug; ?>">
            <button class="btn bg-blue-lt float-right" type="submit">Submit</button>
            <?= form_close(); ?>
        </div>
    </div>