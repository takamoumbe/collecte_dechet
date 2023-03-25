<?php include 'plugins/includes/head.php'; ?>
<style>
  .tabbable .nav-tabs {
    overflow-x: auto;
    overflow-y:hidden;
    flex-wrap: nowrap;
  }
  .tabbable .nav-tabs .nav-link {
    white-space: nowrap;
  }
</style>
<style>
  .error {
    padding-top: 0px;
    padding-bottom: 0px;
    font-size: 14px;
    color: red;
    width: 100%;

  }
</style>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'plugins/includes/Sidebar.php'; ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- TopBar -->
        <?php include 'plugins/includes/nav.php'; ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Enregistrement</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home">Acceuil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Enregistrement</li>
            </ol>
          </div>

          <div class="container-fluid">
            <div class="card rounded-0 mx-auto p-3 col-12 col-md-11">
              <nav class="tabbable">
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active col-md-3 col-6 text-center" id="nav-home-tab" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    Chargé Mission
                  </a>
                  <a class="nav-item nav-link col-md-3 col-6  text-center" id="nav-profile-tab" data-toggle="pill" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Agence
                  </a>
                  <a class="nav-item nav-link col-md-3 col-6  text-center" id="nav-tache-tab" data-toggle="pill" href="#nav-tache" role="tab" aria-controls="nav-tache" aria-selected="false">
                    Affectation Tache
                  </a>
                  <a class="nav-item nav-link col-md-3 col-6  text-center" id="nav-reception-tab" data-toggle="pill" href="#nav-reception" role="tab" aria-controls="nav-reception" aria-selected="false">
                    Receptions
                  </a>
                </div>
              </nav>
            </div>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        NOUVEAU CHARGE DE MISSION
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="login-form">
                            <form class="user" id="form-save-charger">
                              <div class="row">
                                <div class="col-md-5">
                                  <img src="plugins/img/buss.jpg" style="width: 300px;">
                                </div>
                                <div class="col-md-7 col-12">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">Nom Chargé</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nom" placeholder="Nom Responsable" id="nom" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">Prénom Chargé</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="prenom" placeholder="Prénom Responsable" id="prenom" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">Login Chargé</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="login2" placeholder="Login Responsable" id="login2" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">Email Chargé</div>
                                      <div class="col-md-8">
                                        <input type="email" class="form-control form-control-sm" name="email" placeholder="Email Responsable" id="email" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">Password Chargé</div>
                                      <div class="col-md-8">
                                        <input type="password" class="form-control form-control-sm" name="password" placeholder="Password Responsable" id="password" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                      <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                                      <label class="custom-control-label" for="customCheck">Je souhaite enregistré ce chargé de mission !</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12">
                                      <button type="submit" class="btn success btn-block text-white"  id="btn-save-charge">
                                        Enregistrer <i class="mx-1 fa fa-save"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow-sm">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        NOUVELLE AGENCE
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="login-form">
                            <form class="user" id="form-save-agence">
                              <div class="row">
                                <div class="col-md-5">
                                  <img src="plugins/img/agence.jpg" class="mt-5"  style="width: 350px;">
                                </div>
                                <div class="col-md-7 col-12">
                                  <div class="form-group  mt-2">
                                    <div class="row">
                                      <div class="col-md-4">Nom Agence</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="nom_agence" id="nom_agence" placeholder="Nom de l'Agence" id="nom-agence">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group  mt-2">
                                    <div class="row">
                                      <div class="col-md-4">Localisation :</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="lieu_agence" id="lieu_agence" placeholder="Lieu de l'Agence" id="lieu-agence">
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group  mt-2">
                                    <div class="row">
                                      <div class="col-md-4">Email Agence :</div>
                                      <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="email_agence" id="email_agence" placeholder="Email de l'Agence" id="lieu-agence">
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group  mt-2">
                                    <div class="row">
                                      <div class="col-md-4">Password Agence :</div>
                                      <div class="col-md-8">
                                        <input type="password" class="form-control form-control-sm" name="password_agence" id="password_agence" placeholder="Mot de passe de l'Agence" id="password-agence">
                                      </div>
                                    </div>
                                  </div>

                                  <!-- <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4 mt-2">Types Déchets : </div>
                                      <div class="col-md-8">

                                        <select class="select2-multiple form-control" name="type_dechet[]" multiple="multiple" id="type_dechet" style="width: 100%;" required>
                                          <option selected>Plastiques</option>
                                          <option>Cassables</option>
                                          <option>Organiques</option>
                                          <option>Electronique</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div> -->

                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                      <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                                      <label class="custom-control-label" for="customCheck">Je souhaite enregistré cette agence !</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12 mt-2">
                                      <button type="submit" class="btn text-white success btn-block"  id="btn-save-agence">
                                        Enregistrer <i class="mx-1 fa fa-save"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane fade" id="nav-tache" role="tabpanel" aria-labelledby="nav-tache-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        NOUVELLE AFFECTATION DE TACHE 
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTableAffect">
                              <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="text-center">
                                    <div class="row">
                                      <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkall" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                      </div>

                                      <button type="button" class="btn btn-success mx-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Valider la reception des déchets. ">
                                        <i class="fas fa-check"></i> Tout cocher
                                      </button>
                                    </div>
                                  </th>
                                  <th>Image </th>
                                  <th>Type dechet </th>
                                  <th>description </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="text-center">
                                  <td class="text-center">
                                    <center>
                                      <input type="checkbox" class="form-control form-control-sm checkhour" style="width: 20px; height: 20px;" id="checks">
                                    </center>
                                  </td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-center">
                                    <center>
                                      <input type="checkbox" class="form-control form-control-sm checkhour" style="width: 20px; height: 20px;" id="checks">
                                    </center>
                                  </td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <form class="user" id="form-save-agence">
                              <div class="form-group  mt-2">
                                <div class="col-md-12">Charger Mission</div>
                                <div class="col-md-10">
                                  <select class="form-control form-control-sm" name="id_charger" id="id_charger">

                                  </select>
                                </div>
                              </div>

                              <div class="form-group  mt-2">
                                <div class="col-md-12">Description Tache :</div>
                                <div class="col-md-10">
                                  <textarea type="text" class="form-control form-control-sm" name="description_tache" id="description_tache" placeholder="description tache">
                                  </textarea>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-10 mt-2">
                                  <button type="submit" class="btn text-white success btn-block"  id="btn-save-agence">
                                    Enregistrer <i class="mx-1 fa fa-save"></i>
                                  </button>
                                </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-reception" role="tabpanel" aria-labelledby="nav-reception-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        LISTE DES DECHETS A RECEPTIONNER
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                              <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="text-center">
                                    <div class="row">
                                      <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkall" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                      </div>

                                      <button type="button" class="btn btn-success mx-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Valider la reception des déchets. ">
                                        <i class="fas fa-check"></i> Valider
                                      </button>
                                    </div>
                                  </th>
                                  <th>Chargé Missions </th>
                                  <th>Agence </th>
                                  <th>Types Déchets</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="text-center">
                                  <td class="text-center">
                                    <center>
                                      <input type="checkbox" class="form-control form-control-sm checkhour" style="width: 20px; height: 20px;" id="checks">
                                    </center>
                                  </td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-center">
                                    <center>
                                      <input type="checkbox" class="form-control form-control-sm checkhour" style="width: 20px; height: 20px;" id="checks">
                                    </center>
                                  </td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---Container Fluid-->
    </div>
  </div>
</div>

<?php include 'plugins/includes/script.php'; ?>
<script type="text/javascript">
 getstionCompte();
</script>
<script>
  var state = false; 
  $('.checkall').click(function () {
    $('.checkhour').each(function() {
      if(!state) {
        this.checked = true;
      } else {
        this.checked = false;
      }
    });

    if (state) {
      state = false;   
    } else {
      state = true;
    }
  });
</script>

<script type="text/javascript">
  $('.select2-multiple').select2({
    placeholder: "Selectionnez le(s) type(s) de déchet(s).....",
    allowClear: true
  }); 

// select pour les charger de mission
  let url = $('meta[name=app-url]').attr("content") + "/ListeCollecteurSelect2";
  $("#id_charger").select2({
      placeholder: "Selectionnez le charger de mission.....",
      allowClear: true,
      ajax: { 
          url: url,
          type: "get",
          dataType: 'json',
          delay: 250,
          headers: {"Authorization": "Bearer " +localStorage.getItem('token')},
          data: function (params) {
               return {
                    searchTerm: params.term // search term
               };
          },
          processResults: function (response) {
               return {
                    results: response
               };
          },
          cache: true
        }
    });




  $('.select2-single').select2();
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
      s.style.display = 
/*************  STATISTIQUES ***********/

 function statistique(){
      let url = $('meta[name=app-url]').attr("content") + "/Statistique";

      $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        success: function(response){
          console.log(response);
          $("#nbre_entrepot").html(response.entrepot.length);
          $("#nbre_recyclage").html(response.collecteur.length);
          $("#nbre_utilisateur").html(response.utilisateur.length);
          $("#nbre_emplacement").html(response.position_dechet.length);

          $("#mat_plastique").css("width", response.mat_plas.length);
          $("#mat_orga").css("width", response.mat_orga.length);
          $("#mat_cass").css("width", response.mat_cass.length);
          $("#mat_metali").css("width", response.mat_metali.length);
          $("#mat_electro").css("width", response.mat_electro.length);

          $("#nb_plas").html(response.mat_plas.length+' %');
          $("#nb_org").html( response.mat_orga.length+' %');
          $("#nb_cas").html( response.mat_cass.length+' %');
          $("#nb_met").html( response.mat_metali.length+' %');
          $("#nb_elec").html( response.mat_electro.length+' %');
          
        },
        error: function(response){
          console.log(response);
        }
    });
}'inline';
      h.style.display = 'none';
    }   
  }
</script>


<script>
  $(document).ready(function () {
    $('#dataTable, #dataTable1, #dataTable3, #dataTableAffect').DataTable({
    }); 
    $('#dataTableHover').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    }); 
  });
</script>

<script>
  $(document).ready(function() {
    var form = $(this).parents('form');
    var responsable = localStorage.getItem('nom');
    $("#form-save-charger").validate({
      rules: {
        nom : {
          required: true,
          minlength: 5,
          maxlength:25,
        },
        login2 : {
          required: true,
          minlength: 5,
          maxlength:25,
        },
        email : {
          required: true,
          email: true,
        },
        password : {
          required: true,
          minlength: 5,
          maxlength: 20,
        },
      },
      messages : {
        nom: {
          required: "Le nom est obligatoire.",
          minlength: "Le nom doit contenir au moins 05 caractères.",
          maxlength: "Le nom doit contenir au plus 25 caractères."
        },
        login2: {
          required: "Le login est obligatoire.",
          minlength: "Le login doit contenir au moins 05 caractères.",
          maxlength: "Le login doit contenir au plus 25 caractères."
        },
        email: {
          required: "L'email est obligatoire",
          email: "L'email doit etre valide",
        },
        password: {
          required: "Le mot de passe est obligatoire.",
          minlength: "Il doit contenir au moins 05 caractères.",
          maxlength: "Il doit contenir au plus 20 caractères."
        },
      },
      submitHandler: function(form) {
        Swal.fire({
          title: "Êtes vous sûres ?",
          html: "Souhaitez vous vraiment enregistré les informations de ce chargé de mission ?",
          allowOutsideClick: false,
          showCancelButton: true,
          showClass:{
            popup:"animate__animated animate__bounceIn"
          },
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Je le souhaite!",
          cancelButtonText: "Annuler",
          closeOnConfirm: false,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 1000)
            })
          }
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "<?php echo base_url('AddChargerMission')?>", 
              type: "POST",
              data: {
                nom: $('#nom').val(),
                login2: $('#login2').val(),
                prenom: $('#prenom').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                type_user: "charger",
              },
              cache: false,
              success: function(data) { 
                if (data.success == true) {
                  Swal.fire({
                    title: 'Félicitation !',
                    html: "l'enregistrement effectué avec success.",
                    allowOutsideClick: false,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Je comprend.',
                  });
                  form.reset();
                }else{
                  Swal.fire({
                    title: 'Echec !',
                    html: "Des erreurs sont survenues durant l'enregistrement des informations de ce chargé de mission.",
                    allowOutsideClick: false,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Je comprend.',
                  });
                }
              },
              error: function(data) {
                Swal.fire({
                  title: 'Echec !',
                  html: "Des erreurs sont survenues durant l'enregistrement des informations de ce chargé de mission.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
              }
            })
          }
        });
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    var form = $(this).parents('form');
    var responsable = localStorage.getItem('nom');
    $("#form-save-agence").validate({
      rules: {
        nom_agence : {
          required: true,
          minlength: 3,
          maxlength:25,
        },
        email_agence : {
          required: true,
          email: true,
        },
        lieu_agence : {
          required: true,
          minlength: 3,
        },
        password_agence : {
          required: true,
          minlength: 3,
          maxlength: 20,
        }
      },
      messages : {
        nom_agence: {
          required: "Le nom de l'agence est obligatoire.",
          minlength: "Le nom de l'agence doit contenir au moins 05 caractères.",
          maxlength: "Le nom de l'agence doit contenir au plus 25 caractères."
        },
        email_agence: {
          required: "L'email de l'agence est obligatoire",
          email: "L'email de l'agence doit etre valide",
        },
        lieu_agence: {
          required: "La localisation est obligatoire.",
          minlength: "Elle doit contenir au moins 03 caractères.",
        },
        password_agence: {
          required: "Le mot de passe est obligatoire.",
          minlength: "Il doit contenir au moins 03 caractères.",
          maxlength: "Il doit contenir au plus 20 caractères."
        },
      },
      submitHandler: function(form) {
        Swal.fire({
          title: "Êtes vous sûres ?",
          html: "Souhaitez vous vraiment enregistré cette agence ?",
          allowOutsideClick: false,
          showCancelButton: true,
          showClass:{
            popup:"animate__animated animate__bounceIn"
          },
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Je le souhaite!",
          cancelButtonText: "Annuler",
          closeOnConfirm: false,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 1000)
            })
          }
        }).then((result) => {
          if (result.isConfirmed) {
            
            $.ajax({
              url: "<?php echo base_url('AddAgence')?>",
              type: "POST",
              data: {
                nom_agence: $('#nom_agence').val(),
                lieu_agence: $('#lieu_agence').val(),
                email_agence: $('#email_agence').val(),
                password_agence: $('#password_agence').val(),
              },
              cache: false,
              success: function(data) { 
                if (data.success == true) {
                  Swal.fire({
                    title: 'Félicitation !',
                    html: "l'enregistrement effectué avec success.",
                    allowOutsideClick: false,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Je comprend.',
                  });
                  form.reset();
                }else{
                  Swal.fire({
                    title: 'Echec !',
                    html: "Des erreurs sont survenues durant l'enregistrement des informations de cette agence.",
                    allowOutsideClick: false,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Je comprend.',
                  });
                }
              },
              error: function(data) {
                Swal.fire({
                  title: 'Echec !',
                  html: "Des erreurs sont survenues durant l'enregistrement des informations de cette agence.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
              }
            })
          }
        });
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    var form = $(this).parents('form');
    var responsable = localStorage.getItem('nom');
    $("#form-save-tache").validate({
      rules: {
        id_dechet : {
          required: true,
        },
        charger_mission : {
          required: true,
        },
      },
      submitHandler: function(form) {
        Swal.fire({
          title: "Êtes vous sûres ?",
          html: "Souhaitez vous vraiment enregistré cette nouvelle affectation de tache ?",
          allowOutsideClick: false,
          showCancelButton: true,
          showClass:{
            popup:"animate__animated animate__bounceIn"
          },
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Je le souhaite!",
          cancelButtonText: "Annuler",
          closeOnConfirm: false,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 1000)
            })
          }
        }).then((result) => {
          if (result.isConfirmed) {
            var values = "";
            var type_dechet = $('#type_dechet_charge').val();
            for (var i = 0; i < type_dechet.length; i++) {
              values = values + ',' + type_dechet[i];
            }
            $.ajax({
              url: "<?php echo base_url('addUser')?>",
              type: "POST",
              data: {
                id_dechet: values,
                id_user: $('#charger_mission').val(),
                date: $('#date_affectation').val(),
                etat: $('#etat_tache').val(),
              },
              cache: false,
            }).done(function (dataResult) {
              var dataResult = JSON.parse(dataResult);

              if ((dataResult.error == true) && (dataResult.message == 'email failed')) {
                Swal.fire({
                  title: 'Echec !',
                  html: "Des erreurs sont survenues durant l'affectation de cette tache.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
                form.reset();
              }
              else if ((dataResult.error == false) && (dataResult.message == 'good')) {
                Swal.fire({
                  title: 'Félicitation !',
                  html: "l'enregistrement effectué avec success.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
              }
            });
          }
        });
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    var form = $(this).parents('form');
    var responsable = localStorage.getItem('nom');
    $("#form-save-depot").validate({
      rules: {
        depot_tache : {
          required: true,
        },
        depot_charge_mission : {
          required: true,
        },
        depot_agence : {
          required: true,
        },
      },
      submitHandler: function(form) {
        Swal.fire({
          title: "Êtes vous sûres ?",
          html: "Souhaitez vous vraiment effectueé ce dépot ?",
          allowOutsideClick: false,
          showCancelButton: true,
          showClass:{
            popup:"animate__animated animate__bounceIn"
          },
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Je le souhaite!",
          cancelButtonText: "Annuler",
          closeOnConfirm: false,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 1000)
            })
          }
        }).then((result) => {
          if (result.isConfirmed) {
            var values = "";
            var tache = $('#depot_tache').val();
            for (var i = 0; i < tache.length; i++) {
              values = values + ',' + tache[i];
            }
            $.ajax({
              url: "<?php echo base_url('addUser')?>",
              type: "POST",
              data: {
                id_tache: values,
                date: $('#date_depot').val(),
                id_user: $('#depot_charge_mission').val(),
                id_agence: $('#depot_agence').val(),
              },
              cache: false,
            }).done(function (dataResult) {
              var dataResult = JSON.parse(dataResult);

              if ((dataResult.error == true) && (dataResult.message == 'email failed')) {
                Swal.fire({
                  title: 'Echec !',
                  html: "Des erreurs sont survenues durant l'enregistrement de ce dépot.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
                form.reset();
              }
              else if ((dataResult.error == false) && (dataResult.message == 'good')) {
                Swal.fire({
                  title: 'Félicitation !',
                  html: "l'enregistrement effectué avec success.",
                  allowOutsideClick: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Je comprend.',
                });
              }
            });
          }
        });
      }
    });
  });
</script>
</html>