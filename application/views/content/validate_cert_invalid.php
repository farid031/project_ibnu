<div class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-8">
            <h2>Certificate Validation</h2><br />
            <div align="center">
                <i style="color: red;" class="fas fa-times-circle fa-5x"></i><br/><br/>
                <h3><?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7); ?></h3>
                <h3><?php echo 'Certificate is not valid' ?></h3>
            </div>
        </div>
    </div>
</div>