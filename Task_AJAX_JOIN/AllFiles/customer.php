<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <title>Document</title>
</head>
<body> -->

<!-- Modal -->
<div id="formDiv">
    <div class="modal fade" id="custModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="ProjectForm">
                        <input type="hidden" id="id" name="id">
                
                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="comp" id="comp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="state">
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" id="saveCustomer">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid border rounded-3 p-3 shadow-sm mb-5">
    <div class="d-flex justify-content-start pb-3">
        <button id="addCustomer" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#custModel">ADD +</button>
    </div>
    <table class="table" id="custTable">
        <thead>
            <th>ID</th>
            <th>Company</th>
            <th>Phone</th>
            <th>City</th>
            <th>State</th>
            <th>Action</th>
        </thead>
        <tbody id="custBody"></tbody>
    </table>
</div>


 <div class="container-fluid border rounded-3 p-3 shadow-sm">
    <div class="d-flex justify-content-center pb-3">
      <h3>Join Table</h3>
    </div>
    <table class="table" id="custTable">
        <thead>
            <th>ID</th>
            <th>Customer</th>
            <th>Primary Contact</th>
            <th>Primary Email</th>
            <th>Phone</th>
            <th>Date Created</th>
        </thead>
        <tbody id="custJoinTable"></tbody>
    </table>
</div> 