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
            <h1 class="h3 mb-0 text-gray-800">Listing Données</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home">Acceuil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Listing Données</li>
            </ol>
          </div>

          <div class="container-fluid">
            <div class="card rounded-0 mx-auto p-3 col-12 col-md-8">
              <nav class="tabbable">
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active col-md-3 col-6 text-center" id="nav-home-tab" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    Chargé Mission
                  </a>

                  <a class="nav-item nav-link col-md-3 col-6  text-center" id="nav-profile-tab" data-toggle="pill" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Agence
                  </a>

                  <a class="nav-item nav-link col-md-3 col-6  text-center" id="nav-signalement-tab" data-toggle="pill" href="#nav-signalement" role="tab" aria-controls="nav-signalement" aria-selected="false">
                    Signalements
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
                        LISTE DES CHARGES DE MISSION
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                              <thead class="thead-light">
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th>Noms </th>
                                  <th>Prénoms </th>
                                  <th>Email</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">1</td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                  <td>
                                    <center>
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier les informations de : ">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button type="button" class="btn btn-danger mx-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Supprimé le compte de : ">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                    </center>
                                  </td>
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


              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        LISTE DES AGENCES
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                              <thead class="thead-light">
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th>Noms </th>
                                  <th>Lieu </th>
                                  <th>Types Déchets</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">1</td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                  <td>
                                    <center>
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier les informations de l'agence : ">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button type="button" class="btn btn-danger mx-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Supprimé le l'agence : ">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                    </center>
                                  </td>
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


              <div class="tab-pane fade" id="nav-signalement" role="tabpanel" aria-labelledby="nav-signalement-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        LISTE DES SIGNALEMENTS
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                              <thead class="thead-light">
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th>Photo </th>
                                  <th>Type </th>
                                  <th>Description</th>
                                  <th>Téléphone</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">1</td>
                                  <td>Javascript Developer</td>
                                  <td>Javascript Developer</td>
                                  <td>Singapore</td>
                                  <td>Singapore</td>
                                  <td>
                                    <center>
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier les informations de l'agence : ">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button type="button" class="btn btn-danger mx-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Supprimé le l'agence : ">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                    </center>
                                  </td>
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


              <div class="tab-pane fade" id="nav-reception" role="tabpanel" aria-labelledby="nav-reception-tab">
                <div class="container-fluid my-3">
                  <div class="card shadow">
                    <span class="alert success rounded-0 text-center">
                      <b>
                        LISTE DE RECEPTION DE DECHETS
                      </b>
                    </span>
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                              <thead class="thead-light">
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th>Agent Responsable </th>
                                  <th>Agence Concernée </th>
                                  <th>Type Dechets</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">1</td>
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
<script>
  $(document).ready(function () {
    $('#dataTableHover').DataTable();
  });
</script>
</html>