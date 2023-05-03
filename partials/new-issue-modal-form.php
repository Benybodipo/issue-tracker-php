<div class="modal fade" id="issueModalForm" tabindex="-1" aria-labelledby="issueModalFormLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="issueModalFormLabel">Create a new Issue</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="create_issue.php" method="post">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="title" aria-label="Title">
                        <label for="title">Title</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="client" id="clients" aria-label="Client">
                            <option selected disabled></option>
                            <option value="Client ABC">Client ABC</option>
                            <option value="Client XYZ">Client XYZ</option>
                            <option value="Client MNO">Client MNO</option>
                        </select>
                        <label for="clients">Select a client</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="priority" name="priority" aria-label="Issue priority">
                            <option selected disabled></option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                        <label for="priority">Select issue priority</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="type" name="type" aria-label="Issue type">
                            <option selected disabled></option>
                            <option value="Bug">Bug</option>
                            <option value="Support">Support</option>
                            <option value="Enhancement">Enhancement</option>
                        </select>
                        <label for="type">Select issue type</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating">
                        <textarea class="form-control" name="body" placeholder="Leave a comment here" id="descriptions" rows="7" style="height: 150px"></textarea>
                        <label for="descriptions">Description</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>