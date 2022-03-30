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
                                        <li><a href="<?php echo base_url('C_user_my_learning/index/'.strtolower($data_detail->learn_det_desc)) ?>"><?php echo $data_detail->learn_det_desc; ?></a></li>
                                    <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                            </ul>
                        <?php }?>
                    <?php }
                ?>
                <!-- <h1><b>SOLIDWORKS</b></h1>
                <ul style="font-weight: bold;">
                    <li>ESSENTIAL</li>
                    <ul>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/sketching') ?>">SKETCHING</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/3d_modeling') ?>">3D MODELING</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/assembly') ?>">ASSEMBLY</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/drawing') ?>">DRAWING</a></li>
                    </ul><br />
                    <li>INTERMEDIATE</li>
                    <ul>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/weldment') ?>">WELDMENT</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/sheet_metal') ?>">SHEET METAL</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/surface') ?>">SURFACE</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/mold') ?>">MOLD</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/routing') ?>">ROUTING</a></li>
                    </ul><br />
                    <li>ADVANCED</li>
                    <ul>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/simulation') ?>">SIMULATION</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/motion_analysys') ?>">MOTION ANALYSIS</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/flow_simulation') ?>">FLOW SIMULATION</a></li>
                        <li><a href="<?php echo base_url('C_user_my_learning/index/cam') ?>">CAM</a></li>
                    </ul>
                </ul><br />
                <h1><b>ANSYS</b></h1>
                <ul style="font-weight: bold;">
                    <li><a href="<?php echo base_url('C_user_my_learning/index/internal_flow') ?>">INTERNAL FLOW</a></li>
                    <li><a href="<?php echo base_url('C_user_my_learning/index/external_flow') ?>">EXTERNAL FLOW</a></li>
                </ul><br />
                <h1><b>SKETCHUP</b></h1>
                <ul style="font-weight: bold;">
                    <li><a href="<?php echo base_url('C_user_my_learning/index/sketching') ?>">SKETCHING</a></li>
                    <li><a href="<?php echo base_url('C_user_my_learning/index/3d_modeling') ?>">3D MODELING</a></li>
                    <li><a href="<?php echo base_url('C_user_my_learning/index/assembly') ?>">ASSEMBLY</a></li>
                    <li><a href="<?php echo base_url('C_user_my_learning/index/rendering') ?>">RENDERING</a></li>
                </ul> -->
            </div>
            <div style="padding-top: 80px; background-color: #E3EBE8; width: 67%;">
                <?php
                if (!empty($file_url)) { ?>
                    <img src="<?php echo $file_url ?>" alt="My Learning" height="100%" width="100%" style="border-radius: 10px;">
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>