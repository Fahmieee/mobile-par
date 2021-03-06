 <!-- Footer -->

    </div>
  </div>
<div class="modal fade" id="modal-darurat" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
          
          <div class="modal-header">
              <h3 class="modal-title" id="modal-title-default">DARURAT</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body" align="center">

            <div class="alert alert-danger" role="alert">
                <table border="0" align="center" width="100%">
                  <tr>
                      <td align="center">
                          <h5 class="text-white">Nomor Customer Services</h5>
                      </td>
                  </tr>
                </table>
              <hr>

              <table border="0" align="center" width="100%">
                  <tr>
                      <td align="center">
                          <a href="tel:1500751"><h1 class="text-white">1500751</h1></a>
                      </td>
                  </tr>
                </table>
            </div>
          <div class="alert alert-danger" role="alert">
                <table border="0" align="center" width="100%">
                  <tr>
                      <td align="center">
                          <h5 class="text-white">Nomor Unit Kerja</h5>
                      </td>
                  </tr>
                </table>
              <hr>

              <table border="0" align="center" width="100%">
                  <tr>
                      <td align="center">
                          <h1 class="text-white">08123366781</h1>
                      </td>
                  </tr>
                </table>
            </div>
          </div>
        
          
      </div>
  </div>
</div>
  <!--   Core   -->
  <script src="{{ asset('assets/content/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/content/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets/content/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
  <script src="{{ asset('assets/content/js/moment-with-locales.min.js') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('js/app2.js') }}"></script>
  <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-messaging.js"></script>
 
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

  <script type="text/javascript">
    function angka(e) {
      if (!/^[0-9]*\.?[0-9]*$/.test(e.value)) {
        e.value = e.value.substring(0,e.value.length-1);
      }
    }
  </script>

  <script type="text/javascript">
    
  var config = {
    apiKey: "AIzaSyDwUF0pAA74V1SmzHqFaO94UopKRPp13K8",
    authDomain: "pars-new.firebaseapp.com",
    databaseURL: "https://pars-new.firebaseio.com",
    projectId: "pars-new",
    storageBucket: "pars-new.appspot.com",
    messagingSenderId: "349020208042",
    appId: "1:349020208042:web:1ae6f1e0ea1cd2453e09d3",
    measurementId: "G-J4N15TQGJS"
  };

  firebase.initializeApp(config);

  const messaging = firebase.messaging();
  messaging.requestPermission()
  .then(function() {
    console.log('Have Permission');
    return messaging.getToken();
  })
  .then(function(token){
    console.log(token);

    $.ajax({
      type: 'POST',
      url: "{{ route('TokenFCM') }}",
      data: {
          '_token': $('input[name=_token]').val(),
          'user_id': $('#created_by').val(),
          'fcmtoken': token
      },

      success: function (data) {

      }

    });


  })
  .catch(function(err){
    console.log('Error Ocured');
  })

  messaging.onMessage(function(payload){
    console.log('onMessage: ', payload);
  });
  </script>

  <script type="text/javascript">
    
    $('#darurat').on('click', function () {

        $('#modal-darurat').modal('show');

    });

    $.ajax({
      type: 'POST',
      url: "{{ route('GetDataProfile') }}",
      data: {
          '_token': $('input[name=_token]').val(),
          'user_id': $('#created_by').val()
      },

      success: function (data) {

        var photo = data.photo;

        $('#namaatas').html(data.first_name);

        if (photo == null){

          $('#photo_users').attr('src',"{{ asset('assets/content/img/theme/team-1-800x800.jpg') }}");

        } else {

          $('#photo_users').attr('src',"/assets/profile_photo/"+photo+"");

        }


      }

    });

    $('.btnload').on('click', function () {

      $('.loading').attr('style','display: block');

    });

  </script>