
    <div class="site-blocks-cover overlay" style="background-image: url('<?= base_url('uploads/jumbotron.jpg') ?>');" data-aos="fade"data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" style="margin-top: -200px;" data-aos="fade">
                    <span class="caption mb-3">Suites villa &amp; Resort</span>
                    <h1 class="mb-4">About Us</h1>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="img-border">
                        <a href="<?= base_url('uploads/galery_1.jpg') ?>">
                            <img src="<?= base_url('uploads/galery_1.jpg') ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                    <a href="<?= base_url('uploads/galery_2.jpg') ?>"><img src="<?= base_url('uploads/galery_2.jpg') ?>" alt="Image" class="img-fluid image-absolute"></a>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="section-heading text-left">
                        <h2 class="mb-5">About Us</h2>
                    </div>
                    <?php foreach ($villa as $vill): ?>
                        <p class="mb-5"><?= $vill->tetanga ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Our Facilities</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($facilities as $fas): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="text-center p-4 item">
                            <i class="<?= $fas->icon_facilities ?>"></i>
                            <h2 class="h5"><?= $fas->name_facilities ?></h2>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-3 section-heading">
                    <h2 class="mb-5">Our Gallery</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <?php foreach ($galery as $row): ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="<?= base_url('uploads/galery/') .$row->photo ?>" class="image-popup img-opacity"><img src="<?= base_url('uploads/galery/') .$row->photo ?>"  alt="Image" class="img-fluid"></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <?php $this->load->view('tetangga_template/footer_content') ?>
        </div>
    </footer>
    <!-- Footer -->

    