<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h2><b>ENGINEER</b> NUSANTARA</h2>
                    <p><i class="fa fa-map-marker-alt"></i>Surabaya, Indonesia</p>
                    <p><i class="fa fa-phone-alt"></i>0817183124</p>
                    <p><i class="fa fa-envelope"></i>info@engineernusantara.com</p>
                    <div class="footer-social">
                        <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href="https://www.youtube.com/channel/UCOyElSjNFiaCotYkbCSQARw" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn" href="https://www.instagram.com/engineernusantara/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-link">
                    <h2>Useful Links</h2>
                    <a href="">Home</a>
                    <a href="#about">About Us</a>
                    <a href="">Services</a>
                    <a href="">Term of Service</a>
                    <a href="">Proivacy Policy</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-link">
                    <h2>Our Solution</h2>
                    <a href="">Design Engineering</a>
                    <a href="">Manufacturing</a>
                    <a href="">Marketing & sales</a>
                    <a href="">Services</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-newsletter">
                    <h2>Our Newsletter</h2>
                    <p>Bergabung sekarang, untuk mendapatkan update terbaru dari kami seputar solusi design</p>
                    <form>
                        <input class="form-control" placeholder="Email">
                        <button class="btn btn-custom">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container copyright">
        <p>&copy; <a href="#">Engineer Nusantara</a>, All Right Reserved.</p>
    </div>
</div>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>

<!-- JavaScript Libraries -->
<script src="<?php echo base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/easing/easing.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/waypoints/waypoints.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/counterup/counterup.min.js') ?>"></script>

<!-- Contact Javascript File -->
<script src="<?php echo base_url('assets/mail/jqBootstrapValidation.min.js') ?>"></script>
<script src="<?php echo base_url('assets/mail/contact.js') ?>"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

<!-- Sweet Alert 2 -->
<script src="<?php echo base_url('assets/js/sweetalert2.min.js') ?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/lib/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- Javascript foor user page -->
<script>
    function daftarPelatihan(id_user, id_catalog) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda tidak dapat membatalkan kepsertaan setelah mendaftar...",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Daftar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('C_catalog/daftar_pelatihan'); ?>",
                    data: {
                        id_user: id_user,
                        id_catalog: id_catalog
                    },
                    success: (data) => {
                        window.location.reload();
                    }
                });
            }
        })
    }
    $(() => {
        $('#tbl_my_achievments').DataTable({
            'paging': false,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })

        $("#btn_edit_avatar").click(() => {
            Swal.fire({
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'accept': 'image/*',
                    'aria-label': 'Upload your profile picture'
                }
            }).then((file) => {
                if (file.isConfirmed) {
                    var formData = new FormData();
                    var file = $('.swal2-file')[0].files[0];
                    formData.append("file_avatar", file);

                    $.ajax({
                        method: 'POST',
                        url: "<?php echo base_url('C_user_setting/update_avatar') ?>",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(resp) {
                            if (resp == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Avatar updated'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error...',
                                    html: resp
                                });
                            }
                        }
                    });
                }
            })
        });
    })
</script>
</body>

</html>