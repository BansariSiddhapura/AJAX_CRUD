<div id="formDiv">
    <div class="modal fade" id="counterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Counter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="counterForm">

                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label class="form-label">select Customer</label>
                            <select id="ctrCust" class="form-select" name="ctrCust">
                               <option value="">select customer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">select Project</label>
                            <select id="counterPro" class="form-select" name="ctrPro">
                               <option value="">select project</option>
                            </select>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Counter Name</label>
                            <input type="text" class="form-control" name="counterName" id="counterName">
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" id="saveCounter">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid border rounded-3 p-3 shadow-sm mb-5">
    <div class="d-flex justify-content-start pb-3">
        <button id="addCounter" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#counterModal">ADD +</button>
    </div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Counter Name</th>
            <th>Customer</th>
            <th>Project</th>
            <th>Date Created</th>
            <th>Action</th>
        </thead>
        <tbody id="counterBody"></tbody>
    </table>
</div>

