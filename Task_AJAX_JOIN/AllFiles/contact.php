<div id="formDiv">
    <div class="modal fade" id="contactModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="contactForm">

                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label class="form-label">select customer</label>
                            <select id="compDropdown" class="form-select" name="custFromDrop">
                               <option value="">select customer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FirstName</label>
                            <input type="text" class="form-control" name="fnm" id="fnm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">LastName</label>
                            <input type="text" class="form-control" name="lnm" id="lnm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="pass" class="form-control" name="pass" id="pass">
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" name="pCon" id="pCon">
                            <label class="form-label me-3">Primary Contact</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" id="saveContact">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid border rounded-3 p-3 shadow-sm mb-5">
    <div class="d-flex justify-content-start pb-3">
        <button id="addContact" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModel">ADD +</button>
    </div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Customer</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Primary Contact</th>
            <th>Action</th>
        
        </thead>
        <tbody id="contactBody"></tbody>
    </table>
</div>