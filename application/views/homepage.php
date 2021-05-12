<?php
    $x = 0;
    foreach ($this->categories as $category):
        if ($category->show_at_homepage == 1 && $category->status == 1 ):
            if ($category->block_type == "block-1") {
                $this->load->view('homepage/block-1', ['category' => $category]);
            }
            if ($category->block_type == "block-2") {
                $this->load->view('homepage/block-2', ['category' => $category]);
            }
            if ($category->block_type == "block-3") {
                $this->load->view('homepage/block-3', ['category' => $category]);
            }
            if ($category->block_type == "block-4") {
                $this->load->view('homepage/block-4', ['category' => $category]);
            }
            if ($category->block_type == "block-5") {
                $this->load->view('homepage/block-5', ['category' => $category]);
            }

            $x++;
        endif;
    endforeach;
    
    //$this->load->view('homepage/popular');
    ?>