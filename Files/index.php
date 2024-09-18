<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-center">
            <a href="" class="navbar-brand">CRUD WITH AJAX</a>
            <!-- <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Login</a> 
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <div class="container w-50 mt-5 d-flex justify-content-end">
        <button class="btn btn-warning" id="showTableBtn" type="button">Show table Data</button>
    </div>
    <div class="container w-50 border mt-5 rounded-3 p-3 shadow-sm">
        <form action="" method="post" id="myForm">
            <div class="mb-3 d-flex justify-content-center bg-dark text-light rounded-3 pt-2">
                <p class="fs-2" id="title">Client Form</p>
            </div>
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <span id="text"></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label class="form-label">city</label>
                <input type="text" class="form-control" name="city" id="city">
                <label id="citylabel"></label>
            </div>
            <div class="mb-3">
                <label class="form-label me-3">Gender</label>
                <input type="radio" class="form-check-input" name="gender"  value="male">
                <label class="form-check-label">Male</label>
                <input type="radio" class="form-check-input" name="gender" value="female">
                <label class="form-check-label">Female</label>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" id="save">
            </div>
        </form>

    </div>
    <div class="container w-75 border mt-5 rounded-3 p-3 shadow-sm">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
    </div>
</body>

</html>