<br /><br />
<div>
    <div class="container">
        <div class="owl-carousel testimonials-carousel">
            <?php
            $no = 1;
            foreach ($catalog as $data) {
                if ($no % 2 == 0) { ?>
                    <div class="testimonial-item" style="margin-left: 20px; margin-right: 20px;">
                        <div class="testimonial-text" style="background-color: black; border-radius: 10px; padding: 15px;">
                            <a href="<?php echo base_url($data->catalog_flyer_url) ?>" target="_blank"><img src="<?php echo base_url($data->catalog_flyer_url) ?>" alt="Image" height="300px" width="300px" style="border-radius: 10px; border: 1px solid #FCD128;"></a><br />
                            <h5 style="color: #FCD128;"><b><?php echo $data->catalog_title ?></b></h5><br />
                            <h5 style="color: #FCD128;"><i class="fas fa-certificate fa-2x"></i> <?php echo $data->catalog_penghargaan ?></h5>
                            <h5 style="color: #FCD128;"><i class="far fa-file-video fa-2x"></i> <?php echo $data->catalog_pelajaran ?></h5><br />
                            <table width="100%">
                                <tr>
                                    <td width="60%">
                                        <h5 style="color: #FCD128;"><b><?php echo 'Rp' . number_format(($data->catalog_harga * ($data->catalog_diskon / 100)), 0, ',', '.') . ',-' ?></b></h5>
                                    </td>
                                    <td width="25%" align="center">
                                        <h5 class="alert alert-danger"><b><?php echo '-' . $data->catalog_diskon . '%' ?></b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="100%">
                                        <button class="btn btn-block" style="color: black; background-color: #FCD128;" onclick="daftarPelatihan(<?php echo $this->session->userdata('id') ?>,<?php echo $data->id_catalog ?>)"><b>Mulai Belajar...</b></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="testimonial-item" style="margin-left: 20px; margin-right: 20px;">
                        <div class="testimonial-text" style="background-color: #FCD128; border-radius: 10px; padding: 15px;">
                            <a href="<?php echo base_url($data->catalog_flyer_url) ?>" target="_blank"><img src="<?php echo base_url($data->catalog_flyer_url) ?>" alt="Image" height="300px" width="300px" style="border-radius: 10px; border: 1px solid black;"></a><br />
                            <h5><b><?php echo $data->catalog_title ?></b></h5><br />
                            <h5><i class="fas fa-certificate fa-2x"></i> <?php echo $data->catalog_penghargaan ?></h5>
                            <h5><i class="far fa-file-video fa-2x"></i> <?php echo $data->catalog_pelajaran ?></h5><br />
                            <table width="100%">
                                <tr>
                                    <td width="60%">
                                        <h5><b><?php echo 'Rp' . number_format(($data->catalog_harga - ($data->catalog_harga * ($data->catalog_diskon / 100))), 0, ',', '.') . ',-' ?></b></h5>
                                    </td>
                                    <td width="25%" align="center">
                                        <h5 class="alert alert-danger"><b><?php echo '-' . $data->catalog_diskon . '%' ?></b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="100%">
                                        <button class="btn btn-block" style="color: white; background-color: black;" onclick="daftarPelatihan(<?php echo $this->session->userdata('id') ?>,<?php echo $data->id_catalog ?>)"><b>Mulai Belajar...</b></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            <?php }
                $no++;
            } ?>
            <!-- <div class="testimonial-item" style="margin-left: 20px; margin-right: 20px;">
                <div class="testimonial-text" style="background-color: #FCD128; border-radius: 10px; padding: 15px;">
                    <a href="<?php echo base_url('assets/img/flyer-catalog/flyer_1.jpg') ?>" target="_blank"><img src="<?php echo base_url('assets/img/flyer-catalog/flyer_1.jpg') ?>" alt="Image" height="300px" width="300px" style="border-radius: 10px; border: 1px solid black;"></a><br />
                    <h5><b>Training Solidworks Mechanical Design</b></h5><br />
                    <h5><i class="fas fa-certificate fa-2x"></i> Sertifikat</h5>
                    <h5><i class="far fa-file-video fa-2x"></i> Video Materi</h5><br />
                    <table width="100%">
                        <tr>
                            <td width="60%">
                                <h5><b>Rp999.000,-</b></h5>
                            </td>
                            <td width="25%" align="center">
                                <h5 class="alert alert-danger"><b>-60%</b></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">
                                <a href="https://bit.ly/ENtrainingSW" target="_blank"><button class="btn btn-block" style="color: white; background-color: black;"><b>Mulai Belajar</b></button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <div class="testimonial-item" style="margin-left: 20px; margin-right: 20px;">
                <div class="testimonial-text" style="background-color: black; border-radius: 10px; padding: 15px;">
                    <a href="<?php echo base_url('assets/img/flyer-catalog/flyer_2.jpg') ?>" target="_blank"><img src="<?php echo base_url('assets/img/flyer-catalog/flyer_2.jpg') ?>" alt="<?php echo base_url('assets/img/flyer-catalog/flyer_1.jpg') ?>" height="300px" width="300px" style="border-radius: 10px; border: 1px solid #FCD128;"></a><br />
                    <h5 style="color: #FCD128;"><b>Training XXX</b></h5><br />
                    <h5 style="color: #FCD128;"><i class="fas fa-certificate fa-2x"></i> Sertifikat</h5>
                    <h5 style="color: #FCD128;"><i class="far fa-file-video fa-2x"></i> Video Materi</h5><br />
                    <table width="100%">
                        <tr>
                            <td width="60%">
                                <h5 style="color: #FCD128;"><b>RpXXX,-</b></h5>
                            </td>
                            <td width="25%" align="center">
                                <h5 class="alert alert-danger"><b>-XX%</b></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">
                                <a href="#" target="_blank"><button class="btn btn-block" style="color: black; background-color: #FCD128;" readonly="yes"><b>Coming Soon...</b></button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>