<?php 
  if (!isset($_SESSION['user_id'])) {
    include "./pages/error/error401.php";
  } else {

?>

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
  <p class="my-3">Check out your list of CVs below!</p>
  <?php 
  include_once './db/connect.php';
  $user_id = $_SESSION['user_id']; // this should be taken from session!
  $stmt = $conn->prepare("SELECT * FROM cv_management WHERE user_id = ?");
  $stmt->bind_param("i", $user_id);  // Assuming user_id is an integer, change the "i" if it's a different type
  $stmt->execute();
  $result = $stmt->get_result();
?>
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
      <?php
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {   
?>
      <tr>
        <td class="align-middle"><?php echo $row['cv_id']; ?></td>
        <td class="align-middle"><?php echo $row['created_date']; ?></td>
        <td class="align-middle"><?php echo $row['updated_date']; ?></td>
        <td>
          <div class="d-flex flex-column flex-md-row gap-2">
            <button onclick="window.location.href = 'index.php?page=reviewCV&id=<?php echo $row['cv_id']; ?>'"
              type=" button" class="btn btn-primary btn-sm">View/Update</button>
            <button type="button" class="btn btn-danger btn-sm"
              onclick="deleteCVHandler(<?php echo $user_id; ?>, <?php echo $row['cv_id']; ?>)">Delete</button>
          </div>
        </td>
      </tr>
      <?php 
    }  
    ?>
    </tbody>
  </table>
  <?php
  } else {
    echo "No rows found for user_id: $user_id";
  }
  $stmt->close();
  $conn->close();
?>
</main>

<script>
function deleteCVHandler(user_id, cv_id) {
  console.log(user_id, cv_id)
  var result = confirm("Do you want to proceed?");
  if (result) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Handle the response from the server
        console.log(xhr.responseText);
        window.location.href = 'index.php?page=manageCVs';

      }
    };
    xhr.open("POST", "./db/delete.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user_id=" + user_id + "&cv_id=" + cv_id);
  }

}
</script>
<?php 
  }
?>