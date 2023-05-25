<head>
   <link rel="stylesheet" type="text/css" href="login.css">
   <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
  rel="stylesheet"
/>
</head>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-5 text-black">
          <div class="row g-10" height ="50%">
            <div class="col-lg-6" height="50%" width="50%">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                <img src="{{asset('AdminLTE/dist')}}/img/Group 1.png" alt="Logo" height="10%">
                  <h4 class="mt-1 mb-5 pb-1">SAHABAT TANI</h4>
                </div>

                <form>
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="email address" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6">
            <div class="row g-10">
            <div class="text-center">    
                <img src="{{asset('AdminLTE/dist')}}/img/SAHABAT TANI.png" width="100%" height ="100%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
></script>
</section>