    
    <!-- Jumbotron -->
    <div class="slide-one-item home-slider owl-carousel">
        <div class="site-blocks-cover overlay" style="background-image: url('<?= base_url('uploads/jumbotron.jpg') ?>');" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" style="margin-top: -200px;" data-aos="fade">
                        <h1 class="mb-2">Welcome To Villa Tetangga</h1>
                        <h2 class="caption">Villa &amp; Resort</h2>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- Jumbotron -->
    
    <!-- Rooms -->
    <div class="site-section block-15 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>Our Rooms</h2>
                </div>
            </div>
            <div class="nonloop-block-15 owl-carousel">
            <?php foreach ($rooms as $room): ?>
                <div class="media-with-text p-md-4 no-gutters">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-popup img-opacity">
                            <img src="<?= base_url('uploads/rooms/').$room->photo_room ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="text-center">
                        <h2 class="heading mb-0"><a href="#"><?= $room->nama_room ?></a></h2>
                        <span class="badge badge-success"><?= $room->nama_status ?></span><br>
                        <strong class="price">IDR <?= $room->harga ?> / per night</strong>
                        <p><?= $room->diskrip_room ?></p>
                        <p><a href="<?= base_url('tetangga/detileroom') ?>">Detile Room</a></p>
                        <a href="https://wa.widget.web.id/815e6f" class="btn btn-primary" target="_blank">Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Rooms -->

    <!-- About -->
    <div class="site-section ">
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
                    <p class="mb-4">Villa Tetangga is a beautiful extension of Villa Sikepan, the studio of Dutch / New Zealand painter, Jhon Vander Sterren. the artist who actually lives in Jakarta spends much of this time in Borobudur sketching and painting the masnificaout landscape in Cental Java. The property on publish this studio is localed in a large are, measuring around 1800 meter, so it offers placnly of opportunity the me the land both for growing. Crops such as rice or corn, chillis or tobaco, addition the artist welcomes having some of thde property need to preserve several beautiful, old, traditional villages homes.</p>
                    <p><a href="<?= base_url('tetangga/about') ?>" class="btn btn-primary">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->

    <!-- Facilities -->
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
    <!-- Facilities -->

    <!-- Galery -->
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
    <!-- Galery -->

    <!-- Whay Book -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Whay Book Room in Villa Tetangga ?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="hotel-room text-center">
                        <div class="intro">
                           <img style="width: 200px;" class="intro-img img-fluid mb-2 mb-lg-0 rounded" src="<?= base_url('uploads/icon1.png') ?>" alt="icon1">
                           <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Header Coming Soon</span>
                                    <span class="section-heading-lower">Header Coming Soon</span>
                                </h2>
                                <hr class="bg-primary">
                                <p class="mb-3">Value guest while book on villa tetangga - Coming Soon -</p>
                               <div class="intro-button mx-auto">
                                   <a class="btn btn-primary btn-xl" href="#">Visit Us!</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="hotel-room text-center">
                        <div class="intro">
                           <img style="width: 200px;" class="intro-img img-fluid mb-2 mb-lg-0 rounded" src="<?= base_url('uploads/icon2.png') ?>" alt="icon2">
                           <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Header Coming Soon</span>
                                    <span class="section-heading-lower">Header Coming Soon</span>
                                </h2>
                                <hr class="bg-primary">
                                <p class="mb-3">Value guest while book on villa tetangga - Coming Soon -</p>
                               <div class="intro-button mx-auto">
                                   <a class="btn btn-primary btn-xl" href="#">Visit Us!</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="hotel-room text-center">
                        <div class="intro">
                           <img style="width: 200px;" class="intro-img img-fluid mb-2 mb-lg-0 rounded" src="<?= base_url('uploads/icon3.png') ?>" alt="icon3">
                           <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Header Coming Soon</span>
                                    <span class="section-heading-lower">Header Coming Soon</span>
                                </h2>
                                <hr class="bg-primary">
                                <p class="mb-3">Value guest while book on villa tetangga - Coming Soon -</p>
                               <div class="intro-button mx-auto">
                                   <a class="btn btn-primary btn-xl" href="#">Visit Us!</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- Whay Book -->

    <!-- Food -->
    <div class="site-section block-15 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>Our Foods</h2>
                </div>
            </div>
            <div class="nonloop-block-15 owl-carousel">
            <?php foreach ($foods as $food): ?>
                <div class="media-with-text p-md-4 no-gutters">
                    <div class="img-border-sm mb-4">
                        <a href="<?= base_url('uploads/food/').$food->food ?>" class="image-popup img-opacity">
                            <img src="<?= base_url('uploads/food/').$food->food ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="text-center">
                        <h2 class="heading mb-0"><a href="#"><?= $food->name_food ?></a></h2>
                        <strong class="price"><?= $food->diskripsi ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Food -->

    <!-- Testimoni -->
    <div class="site-section block-14">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>What People Say</h2>
                </div>
            </div>
            <div class="nonloop-block-14 owl-carousel">
                <div class="p-4">
                    <div class="d-flex block-testimony">
                        <div>
                            <h2 class="h5">Exc</h2>
                            <blockquote>&ldquo;Coming Soon&rdquo;</blockquote>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="d-flex block-testimony">
                        <div>
                            <h2 class="h5">Exc</h2>
                            <blockquote>&ldquo;Coming Soon&rdquo;</blockquote>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="d-flex block-testimony">
                        <div>
                            <h2 class="h5">Exc</h2>
                            <blockquote>&ldquo;Coming Soon&rdquo;</blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimoni -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <?php $this->load->view('tetangga_template/footer_content') ?>
        </div>
    </footer>
    <!-- Footer -->

    </div>
    <!-- Wrap -->