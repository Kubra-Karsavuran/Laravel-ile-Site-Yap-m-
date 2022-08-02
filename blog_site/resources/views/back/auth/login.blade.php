<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Sitesi | Admin Giriş</title>
    <link href="{{asset('back/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">


    <link href="{{asset('back/')}}/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">- Login Sayfası - </h1>
                                    </div>
                                    
                                    <div>
                                        <h4 style="color: red;"><?php  if (isset($unsuccessful)) { echo $unsuccessful;}  ?></h4> 
                                    </div>

                                    <form class="user"  method="POST" action="{{route('admin.login.post')}}" >
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                            name="name" placeholder="İsim">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                            name="email" aria-describedby="emailHelp"
                                            placeholder="Email Adresi">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Şifre">
                                        </div> 
                                        <hr> 
                                        
                                        <input type="submit" value="Gönder" class="btn btn-primary btn-user btn-block"> 

                                        <hr> 
                                        <a class="user" href="#"> <input type="submit" value="Şifremi Unuttum" class="btn btn-primary btn-user btn-block"></a>
                                    </form> 


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>