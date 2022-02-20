<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="left" style="background-color: #E3EBE8;">
        <div class="row">
            <div style="padding: 20px; background-color: #E3EBE8; width: 70%;">
                <p style="font-size: 45px; font-weight: bold;">I am Ready<br />to Become a Certifed<br />Engineer Professional!</p><br />
                <p style="text-align: center; font-size: 20px; font-weight: bold;">“Jika kamu tidak sanggup menahan lelahnya belajar, maka kamu harus sanggup menahan perihnya kebodohan"<br />-Imam Syaf'i-</p><br />
                <button class="btn" style="color: black; background-color: #FAC100; border: 1px solid black; font-weight: bold; font-size: 20px"><i class="fas fa-plus"></i> Go To Catalog</button>
            </div>
            <div align="center" style="padding: 20px; background-color: #FAC100; width: 30%; border-radius: 5%;">
                <img src="<?php echo base_url('assets/img/avatar/' . $user[0]->user_avatar) ?>" alt="User Image" height="200px" width="200px" style="border-radius: 50%;"><br />
                <p style="font-weight: bold; font-size: 40px;"><?php echo $user[0]->user_name ?></p>
                <div class="row" align="center" style="padding-left: 20px;">
                    <div align="center" class="level"><?php echo ($user[0]->user_is_registered == '0' ? 'Pemula' : 'Pemula') ?></div>
                    <div align="center" class="badges"><?php echo ($user[0]->user_is_registered == '0' ? 0 : 100) ?></div>
                    <div align="center" class="certificate"><?php echo ($user[0]->user_is_registered == '0' ? 0 : 100) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>