/*================================ MINUTEUR DE SESSION ========================================*/
  comptQr();
  function comptQr(){
    const departMinutes = 60
    let temps = departMinutes * 60

    const timerElement = document.getElementById("timer")

    setInterval(() => {
      let minutes  = parseInt(temps / 60, 10)
      let secondes = parseInt(temps % 60, 10)

      minutes = minutes < 10 ? "0" + minutes : minutes
      secondes = secondes < 10 ? "0" + secondes : secondes

      timerElement.innerText = `${minutes}:${secondes}`
      temps = temps <= 0 ? 0 : temps - 1 

      if (temps <= 0) { window.location.href = "/";}

    }, 1000)

  }

/*************  LOGIN ***********/
   $('#from_login').on('submit', function(e) {
      event.preventDefault();
      var formData = new FormData(this);
      let url  = $('meta[name=app-url]').attr("content") + "/Auth";
      let url2 = $('meta[name=app-url]').attr("content") + "/Home";

      $('#btn-envoyer').prop('disabled', true);
      $("#success").hide();
      $("#errors").hide();

      $.ajax({
          url: url,
          type: "POST",
          cache: false,
          data: formData,
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data) { 

              if (data.success == true) {
                $("#password").val("");
                $("#login").val(""); 

                  // stockage des kokies
                  localStorage.setItem('id_user', data.id);
                  localStorage.setItem('login', data.nom);
                  localStorage.setItem('type_user', data.type_user);
                  localStorage.setItem('authorization', 'azerty123ytreza'); 
                  localStorage.setItem('connected', "true");
                  
                  $("#success").html(data.msg);
                  $("#success").show();
                  $("#errors").hide();
                  $('#btn-envoyer').prop('disabled', false);

                  window.location.href = url2;
                 
              }else{
                  $("#errors").html(data.msg);
                  $("#errors").show();
                  $("#success").hide();
                  $('#btn-envoyer').prop('disabled', false);
              } 
          },
          error: function(data) {
              console.log(data.responseJSON);
              $("#errors").html('Oousp Quelque chose a mal fonctionner');
              $("#errors").show();
              $("#success").hide();
              $('#btn-envoyer').prop('disabled', false);
          }
      });
  });


/*************  INFORMATION DU COMPTE ***********/
  function getstionCompte(){
     let login        = localStorage.getItem('login');
     let token        = localStorage.getItem('token');
     let type_user    = localStorage.getItem('type_user');
     let connected    = localStorage.getItem('connected');
      $("#login").html(login);
      $("#type_user").html(type_user);
   }

/*************  DECHET NON TRAITER ***********/

 function liste_dechet(){
      let url = $('meta[name=app-url]').attr("content") + "/ListeDechet";

      $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        success: function(response){
          console.log(response);
              $("#nbre").html(response.length+'+');
              for (var i = 0; i < response.length; i++) {
                let ligne = 
                '<a class="dropdown-item d-flex align-items-center" href="#" >'+
                  '<div class="mr-3">'+
                    '<div class="icon-circle bg-primary">'+
                        '<i class="fas fa-file-alt text-white"></i>'+
                    '</div>'+
                  '</div>'+
                  '<div>'+
                      '<div class="small text-gray-500">'+response[i].description+'</div>'
                      '<span class="font-weight-bold"> Contact: '+response[i].telephone+'</span>'
                  '</div>'+
                '</a>';

                  $("#listDechet").append(ligne);

                  if (i == 5) { break;}
              }
        },
        error: function(response){
          console.log(response);
        }
    });
}


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
}