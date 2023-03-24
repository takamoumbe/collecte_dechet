<script type="text/javascript">if (localStorage.getItem('authorization') != 'azerty123ytreza') {window.location.href = '/'}</script>
<?php include 'plugins/includes/head.php'; ?>

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Entrepot</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="nbre_entrepot">loading</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>pour cette année</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Agens de Recyclage</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="nbre_recyclage">loading</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>pour cette année</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-friends fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Utilisateurs</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="nbre_utilisateur">loading</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>pour cette année</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Emplacements Impliqués</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="nbre_emplacement">loading</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>pour cette année</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map-marked-alt fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Pie Chart -->
        <div class="container-fluid col-xl-12 col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Analyse / Type <span class="mx-3">(% par Entité)</span></h6>
            </div>
            <div class="p-3">
              <div class="card-body">
                <div class="mb-3">
                  <div class="small text-gray-500">Matières Plastiques 
                    <div class="small float-right"><b id="nb_plas">...</b></div>
                  </div>
                  <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-warning" role="progressbar" id="mat_plastique" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="small text-gray-500">Matières Organiques
                    <div class="small float-right"><b id="nb_org">...</b></div>
                  </div>
                  <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-success" role="progressbar" id="mat_orga" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="small text-gray-500">Matières Cassables
                    <div class="small float-right"><b id="nb_cas">...</b></div>
                  </div>
                  <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-danger" role="progressbar" id="mat_cass" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="small text-gray-500">Matières Métaliques
                    <div class="small float-right"><b id="nb_met">...</b></div>
                  </div>
                  <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-info" role="progressbar" id="mat_metali" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="small text-gray-500">Matières Electroniques
                    <div class="small float-right"><b id="nb_elec">...</b></div>
                  </div>
                  <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-success" role="progressbar" id="mat_electro" aria-valuenow="30"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>etes vpous sure de vouloir vous deconnecter ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Annuler</button>
                <a href="<?= base_url() ?>" class="btn btn-primary">Deconnexion</a>
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
 liste_dechet();
 statistique();
</script>
</html>