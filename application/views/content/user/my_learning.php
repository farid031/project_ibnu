<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="left" style="background-color: #E3EBE8;">
        <div class="row">
            <div style="padding: 20px; margin-right: 20px; background-color: #FAC100; width: 30%;">
                <h1><b>SOLIDWORKS</b></h1>
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
                </ul>
            </div>
            <div style="padding-top: 80px; background-color: #E3EBE8; width: 67%;">
                <?php
                if (!empty($file_url)) { ?>
                    <img src="<?php echo $file_url ?>" alt="My Learning" height="60%" width="100%" style="border-radius: 10px;">
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>