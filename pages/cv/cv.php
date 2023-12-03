<link rel="stylesheet" href="./pages/cv/style.css" />
<?php 
  if (!isset($_SESSION['user_id'])) {
    include "./pages/error/error401.php";
  } else {

?>

<?php
  // echo $state;
  // echo $id;
  $user_id = $_SESSION['user_id']; // take from session

?>
<main class="my-4" id="form-wrapper">
  <div class="container mt-3">
    <!-- Nav pills -->
    <div class="">
      <!-- <div class="bg-grey" style="height: 2px; position: absolute; width: 100%; bottom: 10px"></div> -->
      <ul class="nav nav-tabs d-flex align-items-end" role="tablist">
        <li class="nav-item">
          <a class="nav-link-tab nav-link active" data-bs-toggle="tab" href="#pinfo">
            <div id="pinfo-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-primary text-center">Information</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#exp">
            <div id="exp-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Experience</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#edu">
            <div id="edu-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Education</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#cer">
            <div id="cer-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Certificates</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#skills">
            <div id="skills-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Skills</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#prj">
            <div id="prj-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Projects</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link-tab nav-link" data-bs-toggle="tab" href="#ref">
            <div id="ref-nav-link" class="process-pill d-flex flex-column align-items-center">
              <div class="mb-2 text-center text-primary">Reference</div>
              <div class="process-icon bg-white border-primary"></div>
            </div>
          </a>
        </li>
      </ul>
    </div>

    <form action="action.php" method="post" class="" id="cv-form" enctype="multipart/form-data">
      <?php
        if ($state == 0) {
      ?>
      <input type="hidden" name="state" value="create">
      <?php
        } else {
      ?>
      <input type="hidden" name="state" value="review">
      <input type="hidden" name="CVID" value="<?php echo $id; ?>">
      <?php
        }
      ?>
      <div class="tab-content">
        <div id="pinfo" class="container tab-pane active">
          <br />
          <h2 class="mb-3">Personal Information</h2>
          <p class="mb-4">Fill in your personal information below!</p>
          <div class="mb-3 mt-3">
            <label for="pinfo-fname" class="form-label">Fullname:</label>
            <input type="text" class="form-control" id="pinfo-fname" placeholder="Enter fullname" name="fname"
              required />
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-pinfo">
              Please fill out this field.
            </div>
          </div>
          <div class="mb-3">
            <label for="pinfo-profess" class="form-label">Profession title:</label>
            <input type="text" class="form-control" id="pinfo-profess" placeholder="Enter profession title..."
              name="profess" required />
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-pinfo">
              Please fill out this field.
            </div>
          </div>

          <div class="row">
            <div class="col-md">
              <div id="pinfo-email-list">
                <div class="mb-3">
                  <label for="pinfo-email" class="form-label">Email</label>
                  <input type="email" class="form-control  pinfo-email" id="pinfo-email" placeholder="Enter email..."
                    name="email[]" required />
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback invalid-pinfo">
                    Please fill out this field.
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm mb-3" id="pinfo-add-email">
                <div class="btn-additem d-flex gap-1 align-items-center">
                  <p>Add</p>
                  <i class="fa-solid fa-plus"></i>
                </div>
              </button>
            </div>
            <div class="col-md">
              <div id="pinfo-phone-list">
                <div class="mb-3">
                  <label for="pinfo-phone" class="form-label">Phone number</label>
                  <input type="tel" class="form-control pinfo-phone" id="pinfo-phone"
                    placeholder="Enter phone number..." name="phone[]" required />
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback invalid-pinfo">
                    Please fill out this field.
                  </div>
                </div>

                <!-- <div class="d-flex mb-3 align-items-center gap-2">
                  <div class="flex-grow-1">
                    <input type="tel" class="form-control" id="pinfo-phone" placeholder="Enter phone number..."
                      name="phone[]" required />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                      Please fill out this field.
                    </div>
                  </div>
                  <button type="button" class="btn-close" aria-label="Close" id="del-phonexx"></button>
                </div> -->
              </div>
              <button type="button" class="btn btn-secondary btn-sm mb-3" id="pinfo-add-phone">
                <div class="btn-additem d-flex gap-1 align-items-center">
                  <p>Add</p>
                  <i class="fa-solid fa-plus"></i>
                </div>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Social media (maximum 5)</label>
            <div id="pinfo-media-list">
              <!-- <div class="mb-3 media-card">
                <div class="d-flex gap-2 align-items-center">
                  <div class="input-group" >
                    <select class="form-select w-25" id="mediaSelect0">
                      <option selected disabled>Select social media</option>
                      <option value="LinkedIn">LinkedIn</option>
                      <option value="Twitter">Twitter</option>
                      <option value="GitHub">GitHub</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Dribbble">Dribbble</option>
                      <option value="Stack Overflow">Stack Overflow</option>
                      <option value="AngelList">AngelList</option>
                      <option value="Pinterest">Pinterest</option>
                      <option value="TikTok">TikTok</option>
                      <option value="GitLab">GitLab</option>
                      <option value="Bitbucket">Bitbucket</option>
                      <option value="other">Other</option>
                    </select>
                    <input type="text" class="form-control w-25 d-none" placeholder="Enter social media name..." name="media-name[]" required id="mediaName0">
                    <input type="text" class="form-control w-75" placeholder="Enter social media link..." name="media-link[]" required id="mediaLink0">
                  </div>
                  <button type="button" class="btn-close del-media" aria-label="Close" id="del-media0"></button>
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback invalid-pinfo">Please fill out this field.</div>
              </div> -->
            </div>

            <button type="button" class="btn btn-secondary btn-sm mb-3" id="pinfo-add-media">
              <div class="btn-additem d-flex gap-1 align-items-center">
                <p>Add</p>
                <i class="fa-solid fa-plus"></i>
              </div>
            </button>
          </div>

          <div class="row">
            <div class="col-md">
              <div class="mb-3">
                <label for="pinfo-country" class="form-label">Country</label>
                <input class="form-control" list="countries" id="pinfo-country" name="country"
                  placeholder="Type/Select country..." />
                <datalist id="countries"> </datalist>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback invalid-pinfo">
                  Please fill out this field.
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <label for="pinfo-city" class="form-label">City</label>
                <input class="form-control" list="cities" id="pinfo-city" name="city"
                  placeholder="Type/Select city..." />
                <datalist id="cities"> </datalist>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback invalid-pinfo">
                  Please fill out this field.
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <label for="pinfo-address" class="form-label">Address</label>
                <input type="text" class="form-control" id="pinfo-address" placeholder="Enter address..." name="address"
                  required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback invalid-pinfo">
                  Please fill out this field.
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="pinfo-image" class="form-label">Profile picture (accepted extension: .jpg, .jpeg,
              .png)</label>
            <input class="form-control" type="file" id="pinfo-image" name="profile-img" accept=".jpg, .jpeg, .png" />
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-pinfo">
              Please fill out this field.
            </div>
          </div>
          <div class="row">
            <div class="col-md mb-3">
              <ul class="list-style-circle">
                <li>
                  Select a well-groomed and professionally dressed photo.
                </li>
                <li>Use a high-resolution image for clarity and detail.</li>
                <li>
                  Include a clear head-and-shoulders shot, focusing on your
                  face.
                </li>
                <li>
                  Adhere to company-specific guidelines regarding photo
                  inclusion in CVs.
                </li>
              </ul>
            </div>
            <div class="col-md d-flex justify-content-center mb-3">
              <img src="" alt="Profile image" class="w-75 rounded-2" id="pinfo-uploadedImage"
                style="display: none; max-height: 300px; object-fit: contain" />
            </div>
          </div>
        </div>

        <div id="exp" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Experience</h2>
          <p class="mb-4">Show your recruiter your experience (maximum 5)</p>
          <div id="job-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-job">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>

        <div id="edu" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Education</h2>
          <p class="mb-4">Show your recruiter your education (maximum 5)</p>
          <div id="edu-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-edu">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>

        <div id="cer" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Certificate</h2>
          <p class="mb-4">Show your recruiter your certificate (maximum 5)</p>
          <div id="cer-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-cer">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>

        <div id="skills" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Skill</h2>
          <p class="mb-4">Show your recruiter your skillsets (maximum 5)</p>
          <div id="skills-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-skills">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>

        <div id="prj" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Project</h2>
          <p class="mb-4">Show your recruiter your project (maximum 5)</p>
          <div id="prj-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-prj">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>

        <div id="ref" class="container tab-pane fade">
          <br />
          <h2 class="mb-3">Reference</h2>
          <p class="mb-4">Show your recruiter your reference (maximum 5)</p>
          <div id="ref-list"></div>
          <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-ref">
            <div class="btn-additem d-flex gap-1 align-items-center">
              <p>Add</p>
              <i class="fa-solid fa-plus"></i>
            </div>
          </button>
        </div>
      </div>

      <div class="<?php echo $state == 0 ? "d-flex":  "d-none";?> w-100 justify-content-center mt-4">
        <button type="submit" class="btn btn-primary w-100 disabled mb-4" id="final-submit">
          Submit
        </button>
      </div>

      <div class="row <?php echo $state == 1 ? "d-flex":  "d-none";?>">
        <div class="col-md">
          <button type="button" class="btn btn-primary w-100 my-1 mb-4" id="save-changes" data-bs-toggle="modal"
            data-bs-target="#saveChangesModal">
            Save changes
          </button>
        </div>
        <div class="col-md">
          <button type="button" class="btn btn-danger w-100 my-1 mb-4" id="cancel-changes" data-bs-toggle="modal"
            data-bs-target="#cancelChangesModal">
            Cancel changes
          </button>
        </div>
      </div>
    </form>

    <!-- Tab panes -->
  </div>

  <!-- Cancel changes modal -->
  <div class="modal fade" id="cancelChangesModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cancel changes</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Do you wish to cancel changes made to the CV?
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
            onclick="window.location.href='index.php?page=manageCVs'">Yes</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Cancel changes modal -->
  <div class="modal fade" id="saveChangesModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Save changes</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Do you wish to save changes made to the CV?
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
            onclick="handleFormSubmit()">Yes</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        </div>

      </div>
    </div>
  </div>



  <script>
  function handleFormSubmit() {
    const form = document.getElementById('cv-form')
    form.submit();
  }
  </script>
  <!-- <script>
  const bar = document.getElementById("pwd")
  bar.classList.add("is-invalid")
  bar.classList.remove("is-valid")
  </script> -->

  <script src="./pages/cv/validate/tab_script.js"></script>

  <?php 
  include_once './db/connect.php';

  // Prepare and execute the SQL query

    if ($state == 0) {
  ?>
  <script src="./pages/cv/validate/firstItem_script.js"></script>
  <?php  
    }
  ?>
  <script src="./pages/cv/validate/pinfo_script.js"></script>
  <script src="./pages/cv/validate/exp_script.js"></script>
  <script src="./pages/cv/validate/edu_script.js"></script>
  <script src="./pages/cv/validate/cer_script.js"></script>
  <script src="./pages/cv/validate/skills_script.js"></script>
  <script src="./pages/cv/validate/prj_script.js"></script>
  <script src="./pages/cv/validate/ref_script.js"></script>
</main>

<?php 
  $sql = "SELECT cv_id FROM cv_management WHERE user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  $result = $stmt->get_result();
  $all_cv = [];
  while ($row = $result->fetch_assoc()) {
      $all_cv[] = $row['cv_id'];
  }

  // Close the statement and connection
  $stmt->close();
  if ($state == 1) {
    if (!in_array($id, $all_cv)) {
      include "./pages/error/error501.php";
      ?>
<script>
document.getElementById('form-wrapper').style.display = 'none';
</script>
<?php
    } else {
  $CVid = $id;
  
  // Prepare and execute the SQL query
  $sql = "SELECT * FROM pinfo WHERE user_id = ? AND cv_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $user_id, $CVid);  // Assuming cv_id is an integer, change the "i" if it's a different type
  $stmt->execute();
  
  // Get the result
  $result = $stmt->get_result();
  
  // Check if a row was returned
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<script>
document.getElementById('pinfo-fname').value = '<?php echo $row['fullname'];?>'
document.getElementById('pinfo-profess').value = '<?php echo $row['professional_title'];?>'
document.getElementById('pinfo-country').value = '<?php echo $row['country'];?>';
document.getElementById('pinfo-city').value = '<?php echo $row['city'];?>';
document.getElementById('pinfo-address').value = '<?php echo $row['address'];?>';
document.getElementById('pinfo-image').value = '';
</script>
<?php
  };
  // Close the statement and connection
  $stmt->close();

  // Email

  $sql = "SELECT * FROM email WHERE user_id = ? AND cv_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $user_id, $CVid);  // Assuming cv_id is an integer, change the "i" if it's a different type
  $stmt->execute();
  
  // Get the result
  $result = $stmt->get_result();
  
  // Check if a row was returned
  if ($result->num_rows > 0) {
    if ($result->num_rows > 1) {
?>
<script>
for (var i = 0; i < <?php echo $result->num_rows-1;?>; i++) {
  document.getElementById('pinfo-add-email').click();
}
</script>
<?php
    };
    for ($i = 0; $row = $result->fetch_assoc(); $i++) {
?>
<script>
document.getElementsByClassName('pinfo-email')[<?php echo $i;?>].classList.remove('is-invalid');
document.getElementsByClassName('pinfo-email')[<?php echo $i;?>].classList.add('is-valid');
document.getElementsByClassName('pinfo-email')[<?php echo $i;?>].value = '<?php echo $row['email_address'];?>';
</script>
<?php
  }
};
// Close the statement and connection
$stmt->close();

// Phone

$sql = "SELECT * FROM phone_number WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);  // Assuming cv_id is an integer, change the "i" if it's a different type
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if a row was returned
if ($result->num_rows > 0) {
  if ($result->num_rows > 1) {
?>
<script>
for (var i = 0; i < <?php echo $result->num_rows-1;?>; i++) {
  document.getElementById('pinfo-add-phone').click();
}
</script>
<?php
  };
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
?>
<script>
document.getElementsByClassName('pinfo-phone')[<?php echo $i;?>].classList.remove('is-invalid');
document.getElementsByClassName('pinfo-phone')[<?php echo $i;?>].classList.add('is-valid');
document.getElementsByClassName('pinfo-phone')[<?php echo $i;?>].value = '<?php echo $row['phone_number'];?>';
</script>
<?php
}
};
// Close the statement and connection
$stmt->close();

// Media

$sql = "SELECT * FROM socialmedia_link WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$user_id, $CVid);  // Assuming cv_id is an integer, change the "i" if it's a different type
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if a row was returned
if ($result->num_rows > 0) {
?>
<script>
for (var i = 0; i < <?php echo $result->num_rows;?>; i++) {
  document.getElementById('pinfo-add-media').click();
}
</script>
<?php
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
?>
<script>
var commonMedia = ["LinkedIn", "Twitter", "GitHub", "Instagram", "Facebook", "Dribbble", "Stack Overflow",
  "AngelList",
  "Pinterest",
  "TikTok", "GitLab", "Bitbucket"
];
document.getElementsByClassName('pinfo-media-sl')[<?php echo $i;?>].value = '<?php echo $row['socialmedia_name'];?>';
document.getElementsByClassName('pinfo-media-name')[<?php echo $i;?>].value = " ";

if (!commonMedia.includes('<?php echo $row['socialmedia_name'];?>')) {
  document.getElementsByClassName('pinfo-media-sl')[<?php echo $i;?>].value = 'Other';
  document.getElementsByClassName('pinfo-media-name')[<?php echo $i;?>].classList.remove('d-none');
  document.getElementsByClassName('pinfo-media-name')[<?php echo $i;?>].value =
    '<?php echo $row['socialmedia_name'];?>';
  document.getElementsByClassName('pinfo-media')[<?php echo $i;?>].classList.remove('w-75');
  document.getElementsByClassName('pinfo-media')[<?php echo $i;?>].classList.add('w-50');

}
document.getElementsByClassName('pinfo-media')[<?php echo $i;?>].value = '<?php echo $row['socialmedia_link'];?>';
document.getElementsByClassName('mediaVerify')[<?php echo $i;?>].classList.remove('is-invalid');
document.getElementsByClassName('mediaVerify')[<?php echo $i;?>].classList.add('is-valid');
</script>
<?php
}
};
// Close the statement and connection
$stmt->close();
?>

<script>
navLinkA[1].click();
</script>


<?php 
$des_cnt = 0;
$sql = "SELECT * FROM experience WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-job').click();
document.getElementsByClassName('exps-title')[<?php echo $i;?>].value = '<?php echo $row['job_title'];?>'
document.getElementsByClassName('exps-name')[<?php echo $i;?>].value = '<?php echo $row['company_name'];?>'
document.getElementsByClassName('exps-sdate')[<?php echo $i;?>].value = '<?php echo $row['start_date'];?>'
document.getElementsByClassName('exps-edate')[<?php echo $i;?>].value = '<?php echo $row['end_date'];?>'
</script>
<?php
    $sql1 = "SELECT * FROM experience_description WHERE experience_id = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $row['experience_id']);
    $stmt1->execute();

    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
      for ($j = 0; $row1 = $result1->fetch_assoc(); $j++) {
          ?>
<script>
document.getElementsByClassName('add-job-deses')[<?php echo $i;?>].click();
document.getElementsByClassName('exps-des')[<?php echo $des_cnt;?>].value = '<?php echo $row1['description'];?>';
</script>
<?php
        $des_cnt++;
      }
    }

    // Close the statement and connection
    $stmt1->close();
  }
}

// Close the statement and connection
$stmt->close();
?>

<script>
navLinkA[2].click();
</script>


<?php 
$des_cnt = 0;
$sql = "SELECT * FROM education WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-edu').click();
document.getElementsByClassName('edu-des')[<?php echo $i;?>].value = '<?php echo $row['edu_des'];?>'
document.getElementsByClassName('edu-ins-name')[<?php echo $i;?>].value = '<?php echo $row['institution_name'];?>'
document.getElementsByClassName('edu-sdate')[<?php echo $i;?>].value = '<?php echo $row['start_date'];?>'
document.getElementsByClassName('edu-edate')[<?php echo $i;?>].value = '<?php echo $row['end_date'];?>'
</script>
<?php
  }
}

// Close the statement and connection
$stmt->close();
?>


<script>
navLinkA[3].click();
</script>


<?php 
$des_cnt = 0;
$sql = "SELECT * FROM certificate WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-cer').click();
document.getElementsByClassName('cer-name')[<?php echo $i;?>].value = '<?php echo $row['certificate_name'];?>'
document.getElementsByClassName('cer-year')[<?php echo $i;?>].value = '<?php echo $row['certificate_date'];?>'
document.getElementsByClassName('cer-insname')[<?php echo $i;?>].value = '<?php echo $row['certifying_institution'];?>'
document.getElementsByClassName('cer-link')[<?php echo $i;?>].value = '<?php echo $row['certificate_link'];?>'
</script>
<?php
  }
}

// Close the statement and connection
$stmt->close();
?>


<script>
navLinkA[4].click();
</script>


<?php 
$skill_cnt = 0;
$sql = "SELECT * FROM skill WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-skills').click();
document.getElementsByClassName('skills-category')[<?php echo $i;?>].value = '<?php echo $row['skill_type'];?>'
</script>
<?php
    $sql1 = "SELECT * FROM skillname WHERE skill_id = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $row['skill_id']);
    $stmt1->execute();

    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
      for ($j = 0; $row1 = $result1->fetch_assoc(); $j++) {
          ?>
<script>
document.getElementsByClassName('skill-name-inp')[<?php echo $skill_cnt;?>].value = '<?php echo $row1['skill_name'];?>';
</script>
<?php 
if ($j != $result1->num_rows - 1) {
  ?>
<script>
document.getElementsByClassName('skills-add-name')[<?php echo $i;?>].click();
</script>
<?php
}
?>
<?php
        $skill_cnt++;
      }
    }
    // Close the statement and connection
    $stmt1->close();
  }
}

// Close the statement and connection
$stmt->close();
?>


<script>
navLinkA[5].click();
</script>


<?php 
$des_cnt = 0;
$sql = "SELECT * FROM project WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-prj').click();
document.getElementsByClassName('prj-name')[<?php echo $i;?>].value = '<?php echo $row['project_name'];?>'
document.getElementsByClassName('prj-year')[<?php echo $i;?>].value = '<?php echo $row['project_year'];?>'
document.getElementsByClassName('prj-link')[<?php echo $i;?>].value = '<?php echo $row['project_link'];?>'
document.getElementsByClassName('prj-des')[<?php echo $i;?>].value = '<?php echo $row['description'];?>'
</script>
<?php
  }
}

// Close the statement and connection
$stmt->close();
?>

<script>
navLinkA[6].click();
</script>


<?php 
$des_cnt = 0;
$sql = "SELECT * FROM reference WHERE user_id = ? AND cv_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $CVid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  for ($i = 0; $row = $result->fetch_assoc(); $i++) {
      ?>
<script>
document.getElementById('add-ref').click();
document.getElementsByClassName('ref-name')[<?php echo $i;?>].value = '<?php echo $row['reference_name'];?>'
document.getElementsByClassName('ref-ins-name')[<?php echo $i;?>].value = '<?php echo $row['institution_name'];?>'
document.getElementsByClassName('ref-email')[<?php echo $i;?>].value = '<?php echo $row['ref_email'];?>'
document.getElementsByClassName('ref-phone')[<?php echo $i;?>].value = '<?php echo $row['ref_phone'];?>'
document.getElementsByClassName('ref-rel')[<?php echo $i;?>].value = '<?php echo $row['ref_relation'];?>'
</script>
<?php
  }
}

// Close the statement and connection
$stmt->close();
?>



<script>
// What out create CV!!!
const eles = document.getElementsByClassName('is-invalid');
Array.from(eles).forEach((ele) => {
  ele.classList.remove('is-invalid')
  ele.classList.add('is-valid')
})

pillVerify('pinfo', 'pinfo-nav-link')
pillVerify('exp', 'exp-nav-link')
pillVerify('edu', 'edu-nav-link')
pillVerify('cer', 'cer-nav-link')
pillVerify('skills', 'skills-nav-link')
pillVerify('prj', 'prj-nav-link')
pillVerify('ref', 'ref-nav-link')
navLinkA[0].click();
</script>

<?php 
      }
    }
  }
?>