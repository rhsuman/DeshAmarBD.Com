<div class="container-xl mb-3">
            <div class="news-ticker mt-3 bg-white">
                <div class="row">
                    <div class="col-2">
                        <div class="breakingNews text-light">News Ticker</div>
                    </div>

                    <div class="col-10">
                        <ul class="my-news-ticker">
                            <?php foreach ($this->tickers as $ticker) { ?>
                            <li>
                                <a class=""  href="<?= base_url('view/' . $ticker->title_slug) ?>">
                                    <?php echo strip_tags($ticker->title); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>