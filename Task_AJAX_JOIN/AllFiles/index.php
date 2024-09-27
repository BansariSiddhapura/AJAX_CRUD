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

            <div class="col col-2  vh-100 d-flex justify-content-center align-items-center bg-dark flex-column pe-0">
                <ul class="list-group gap-5 list-unstyled">
                    <li><a class="btn-link text-decoration-none text-light" id="customer">Customer </a></li>
                    <li><a class="btn-link text-decoration-none text-light" id="contact">Contact </a></li>
                    <li><a class="btn-link text-decoration-none text-light" id="project">Project </a></li>
                    <li><a class="btn-link text-decoration-none text-light" id="counter">Counter </a></li>
                </ul>
            </div>

            <div class="col col-10 ps-0">

                <div class="container-fluid d-flex align-items-center">
                    <div id="mainpage_content" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 d-flex justify-content-center fs-3 bg-light text-dark">WELCOME</div>
                    </div>

                    <!-- Customer Form -->
                    <div id="custFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-light text-dark">Customer</div>
                        <?php include_once('customer.php'); ?>
                    </div>
                    <!-- Contact Form -->
                    <div id="contactFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-light text-dark">Contact</div>
                        <?php include_once('contact.php'); ?>
                    </div>
                    <!-- Project Form -->
                    <div id="ProjectFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-light text-dark">Project</div>
                        <?php include_once('project.php'); ?>
                    </div>
                      <!-- Counter Form -->
                      <div id="counterFormDiv" class="container-fluid rounded-3 p-3 shadow-sm">
                        <div class="border mt-1 rounded-3 p-3 mb-2 d-flex justify-content-center fs-3 bg-light text-dark">Counter</div>
                        <?php include_once('counter.php'); ?>
                    </div>

                </div>

            </div>
        </div>
</body>

</html>