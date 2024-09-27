<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <title>Project JQUERY-AJAX</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col col-2 vh-100 d-flex justify-content-center align-items-center border mt-3 rounded-3 m-2 shadow-sm flex-column">
                <ul class="list-group gap-5 list-unstyled">
                    <li><a class="btn-link text-decoration-none text-dark" id="customer">Customer </a></li>
                    <li><a class="btn-link text-decoration-none text-dark" id="contact">Contact </a></li>
                    <li><a class="btn-link text-decoration-none text-dark" id="project">Project </a></li>
                    <li><a class="btn-link text-decoration-none text-dark">Counter </a></li>
                </ul>

            </div>

            <div class="col col-9">

                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <div id="mainpage_content" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 d-flex justify-content-center fs-3 bg-dark text-light">WELCOME</div>
                    </div>

                    <!-- Customer Form -->
                    <div id="custFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-dark text-light">Customer</div>
                        <?php include_once('customer.php'); ?>
                    </div>
                    <!-- Contact Form -->
                    <div id="contactFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-dark text-light">Contact</div>
                        <?php include_once('contact.php'); ?>
                    </div>
                    <!-- Project Form -->
                    <div id="ProjectFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-dark text-light">Project</div>
                        <?php include_once('project.php'); ?>
                    </div>

                </div>

            </div>
        </div>
</body>

</html>