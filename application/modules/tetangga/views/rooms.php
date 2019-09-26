
    <div class="site-blocks-cover overlay " data-aos="fade" data-stellar-background-ratio="0.5" style="background-image: url('<?= base_url('uploads/jumbotron.jpg') ?>');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" style="margin-top: -200px;" data-aos="fade">
                    <h1 class="mb-3">Tetangga Rooms</h1>
                    <h2 class="caption">Villa &amp; Resort</h2>
                </div>
            </div>
        </div>
    </div>

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
                        <p><a href="<?= site_url('tetangga/detileroom/').$room->id_room ?>">Detile Room</a></p>
                        <a href="https://wa.widget.web.id/815e6f" class="btn btn-primary" target="_blank">Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Rooms -->
    
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

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <?php $this->load->view('tetangga_template/footer_content') ?>
        </div>
    </footer>
    <!-- Footer -->