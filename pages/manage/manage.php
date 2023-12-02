<main class="container my-4">
  <div class="row">
    <div class="col-md d-flex align-items-center">
      <h2 class="mb-0">Manage your CVs</h2>
    </div>
    <div class="col-md d-flex align-items-center justify-content-md-end justify-content-start my-md-0 my-3">
      <a href="./index.php?page=createCV">
        <button type="button" class="btn btn-secondary" id="add-CV">
          <div class="btn-additem d-flex gap-2 align-items-center">
            <p>Create</p>
            <i class="fa-solid fa-file-circle-plus" style="font-size: 14px !important;"></i>
          </div>
        </button>
      </a>
    </div>
  </div>
  <p class="my-3">The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>CV ID</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>
          <div class="d-flex flex-column flex-md-row gap-2">
            <button onclick="window.location.href='index.php?page=reviewCV&id='" type=" button"
              class="btn btn-primary btn-sm">View/Update</button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
              data-bs-target="#deleteCVModal">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>
          <div class="d-flex flex-column flex-md-row gap-2">
            <button onclick="window.location.href='index.php?page=reviewCV&id='" type=" button"
              class="btn btn-primary btn-sm">View/Update</button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
              data-bs-target="#deleteCVModal">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>July</td>
        <td>Doe</td>
        <td>Doe</td>
        <td>
          <div class="d-flex flex-column flex-md-row gap-2">
            <button onclick="window.location.href='index.php?page=reviewCV&id='" type=" button"
              class="btn btn-primary btn-sm">View/Update</button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
              data-bs-target="#deleteCVModal">Delete</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</main>

<!-- Delete CV modal -->
<div class="modal fade" id="deleteCVModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete CV</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Do you wish to delete this CV?
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>