<div id="formDiv">
    <div class="modal fade" id="projectModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="projectForm">

                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="pnm" id="pnm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">select customer</label>
                            <select id="proDropdown" class="form-select" name="proFromDrop">
                               <option value="">select customer</option>
                            </select>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="sdate" id="sdate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="edate" id="edate">
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" id="saveProject">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid border rounded-3 p-3 shadow-sm mb-5">
    <div class="d-flex justify-content-start pb-3">
        <button id="addProject" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModel">ADD +</button>
    </div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Project Name</th>
            <th>Customer</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Date Created</th>
        </thead>
        <tbody id="projectBody"></tbody>
    </table>
</div>