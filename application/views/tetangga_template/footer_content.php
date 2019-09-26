    <div class="row">
        <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Villa Tetangga is a beautiful extension of Villa Sikepan, the studio of Dutch / New Zealand painter, Jhon Vander Sterren. the artist who actually lives in Jakarta spends much of this time in Borobudur sketching and painting the masnificaout landscape in Cental Java.</p>
            <p><a href="<?= base_url('tetangga/about') ?>" class="btn btn-primary pill text-white px-4">Read More</a></p>
        </div>
        <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">Rooms</h3>
            <ul class="list-unstyled">
              <?php foreach ($rooms as $room): ?>
                <li><a href="<?= site_url('tetangga/detileroom/').$room->id_room ?>"><?= $room->nama_room ?></a></li>
              <?php endforeach ?>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Locate Us</h3></div>
            <p>Location Villa Tetangga</p>
            <div>
              
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5592.88575799957!2d110.23108131600821!3d-7.600268843525812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8d730514b859%3A0x5be720fe2501bcc3!2sVilla%20tetangga!5e0!3m2!1sen!2sid!4v1568997662383!5m2!1sen!2sid" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

            </div>
        </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; Tetangga <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >M Misbah Musthofa</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>      
    </div>
     