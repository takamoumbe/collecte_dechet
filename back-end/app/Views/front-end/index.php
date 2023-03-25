<?php include 'plugins/includes/head.php'; ?>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9 my-5">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">
                    </h1>
                  </div>
                  <form class="user" id="from_login">
                    <div class="row">
                      <div class="col-md-7">
                        <img src="plugins/img/yo.jpg" class="col-md-12">
                      </div>
                      <div class="col-md-5 mt-2 col-12">
                        <div class="alert alert-success" style="text-align: center;" id="success"></div>
                        <div class="alert alert-danger" style="text-align: center;" id="errors"></div>
                        <script type="text/javascript"> $("#success").hide(); $("#errors").hide();</script>
                        <div class="input-group mb-3 mt-2">
                          <input type="text" class="form-control" name="login" placeholder="Identifiants" id="login">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-user-circle"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <a href="#" id="Layer_1" class="text-muted" onclick="togglePass()"><span class="fa fa-eye"></span></a>
                              <a href="#" id="Layer_2" class="text-muted" onclick="togglePass()" style="display: none;"><span class="fa fa-eye-slash"></span></a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Se souvenir de moi !</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" id="btn-envoyer" class="btn btn-success btn-block">
                            Connexion <i class="fa fa-sign-in-alt"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small text-muted" href="plugins/register.html">Password Oublié ?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  
  <?php include 'plugins/includes/script.php'; ?>

  <script type="text/javascript">
    var x = document.getElementById("password");  
    var s = document.getElementById("Layer_1");
    var h = document.getElementById("Layer_2");

    function togglePass() {
      if (x.type === "password") {
        x.type = 'text';
        s.style.display = 'none';
        h.style.display = 'inline';
      } else {
        x.type = 'password';
        s.style.display = 'inline';
        h.style.display = 'none';
      }   
    }
  </script>
  <script type="text/javascript">
     localStorage.clear();
     
    </script>
</body>

</html>