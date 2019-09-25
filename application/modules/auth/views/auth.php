  <body class="bg-gradient-primary">

    <div class="container"><br><br><br><br>

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-4 col-md-5">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                      <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                    <form action="<?php echo base_url() ?>auth/save" method="post" class="user">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user" placeholder="Username Anda...">
                        <?php echo form_error('username', '<div class="text-danger small ml-3">','</div>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password Anda...">
                        <?php echo form_error('password', '<div class="text-danger small ml-3">','</div>'); ?>
                      </div>
                      <button class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>