<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="left" style="background-color: #E3EBE8;">
        <div class="row">
            <div style="padding: 20px; margin-right: 20px; background-color: #FAC100; width: 30%;">
                <?php
                $this->load->model('M_data');

                foreach ($learn_title as $data_title) { ?>
                    <h1><b><?php echo $data_title->learn_title_desc; ?></b></h1>
                    <?php if ($data_title->jml_header > 0) {
                        $header = $this->M_data->get_learning_header($data_title->id_learn_title); ?>
                        <ul style="font-weight: bold;">
                            <?php foreach ($header as $data_header) { ?>
                                <li><?php echo $data_header->learn_head_desc; ?></li>
                                <?php if ($data_header->jml_header > 0) {
                                    $detail = $this->M_data->get_learning_detail($data_header->id_learn_head); ?>
                                    <ul>
                                        <?php foreach ($detail as $data_detail) { ?>
                                            <li><a href="<?php echo base_url('C_user_my_learning/index/' . $data_detail->id_learn_det) ?>"><?php echo $data_detail->learn_det_desc; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                <?php }
                ?>
            </div>
            <div style="padding-top: 20px; background-color: #E3EBE8; width: 67%;">
                <h1><?php echo (!empty($learn_detail_judul) ? $learn_detail_judul[0]->learn_det_desc : '') ?></h1>                            
                <?php
                $assign_user = $this->M_data->get_user_is_assign((!empty($learn_detail_judul) ? $learn_detail_judul[0]->learn_det_desc : ''));
                if ($this->session->userdata('is_registered') == TRUE) {
                    if (!empty($assign_user)) {
                        if (!empty($video_url)) { ?>
                            <video width="100%" height="100%" controls controlsList="nodownload">
                                <source src="<?php echo $video_url ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php } else {
                            echo '<h1>Video tidak tersedia</h1>';
                        }
                    } else {
                        echo '<h1>Anda Tidak Terdaftar di Sub Materi Ini</h1><br/>
                        <h2>untuk mendaftar pada sub materi ini, silahkan klik <a href="'. base_url('C_catalog').'">di sini</a></h2>';
                    }
                } else {
                    if (!empty($thumb_url)) { ?>
                        <img src="<?php echo $thumb_url ?>" alt="My Learning" height="100%" width="100%" style="border-radius: 10px;">
                <?php } else {
                    echo '';
                }
                } ?>
            </div>
        </div>
    </div>
</div>