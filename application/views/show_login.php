<!DOCTYPE html>
<html lang="en">
<head>
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
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black"></br>

      <div class="px-5 ms-xl-4">
      <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/logo.svg" style="width: 100px; height: auto;">
      </div></br></br>


        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="<?php echo site_url('login/authenticate'); ?>" method="post" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login</h3>

            <div style="margin-top: 50px;">
              <div class="formusername">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Input Username" required>
              </div>

              <div class="formpassword">
                <label for="inputpassword">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Input Password" required>
              </div>
            </div></br>

            <div class="pt-1 mb-4">
              <button class="btn btn-danger btn-lg btn-block" type="submit">Login</button>
            </div>
            <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/logo_footer.svg" style="margin-top: 50px;">
          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://cdn.cdnlogo.com/logos/k/3/kfc-kentucky-fried-chicken.svg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
    
</body>
</html>