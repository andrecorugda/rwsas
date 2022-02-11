
<html>

<head>
    <title>Login</title>
    <?php require_once __DIR__.'/../components/common/head.php'; ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box p-5">
                <div class="col-lg-12 card">
                    <div class="col-lg-12 card-header">
                        Admin Access Required
                    </div>
                    <div class="col-lg-12 card-body">
                        <form method="post" action="route">
                            <input type="hidden" name="action" value="login">
                            <div class="form-group mb-3">
                                <label class="form-control-label mb-1">Username:</label>
                                <input type="text" name="username" class="form-control text-field" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label mb-1">Password</label>
                                <input type="password" name="password" class="form-control text-field" required>
                            </div>
                            <div class="col-lg-4 mt-3 login-btm login-button">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
</body>

<?php require_once __DIR__.'/../components/common/foot.php'; ?>

</html>