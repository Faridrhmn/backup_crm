<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    

    <link rel="shortcut icon" href="<?= base_url(); ?>public/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/auth.css">
</head>

<body>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/initTheme.js"></script>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="<?= base_url(); ?>public/dist/assets/compiled/svg/logo.svg" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <form id="login-form">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" id="username" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" id="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                        up</a>.</p>
                <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>

    <script src="<?= base_url(); ?>public/dist/assets/extensions/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/extensions/jquery/jquery.min.js"></script>
    <script>
        $(function(){
            $('#login-form').submit(function(e){
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                console.log(username, password);
                let user = {
                    username: username,
                    password: password,
                }
                login(user);
            });
            
        });

        function login(user){
            $.ajax({
                type: "POST",
                url: "api/login",
                data: user,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Login Successfully",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    .then(function() {
                        history.pushState(null, null,'admin');
                        
                        $('#app').html('');
                        $('#app').load('admin/dashboard');
                    });
                    // $('#app').html('');
                    // $('#app').load('admin/dashboard');
                }
            });
        }
    </script>
</body>

</html>