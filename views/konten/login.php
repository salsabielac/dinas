<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--background-->
    <style>
    body  {
    background-image: url("/dinas/assets/img/3.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    }
    </style>
    <!--login-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
    }
    .login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    background-color: #ffffff;
    }
    .login-form-1 h3{
    text-align: center;
    color: #333;
    }
    .login-container form{
    padding: 10%;
    }
    .btnSubmit
    {
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
    }
    .login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
    }
    .login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
    }
    </style>
  </head>
  <body>

    <?php echo form_open('login/cekLogin')?>

    <div class="container login-container">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 login-form-1">
          <h3>Login</h3>
          <?php echo validation_errors(); ?>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="NIP" value="" name="nip" id="nip" />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" value="" name="password" id="password" />
            </div>
            <div class="form-group">
              <input type="submit" class="btnSubmit" value="Login" />
            </div>
          </form>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>

  </body>
</html>