<link rel="stylesheet" href="./pages/cv/style.css" />
<main class="my-4">
  <!-- Default -->
  <!-- 
  <div class="process-icon bg-white border-primary">
  </div>

  <div class="process-icon icon-success border-primary bg-primary d-flex justify-content-center align-items-center">
    <i class="fa-solid fa-check text-white"></i>
  </div>

  <div
    class="process-icon bg-white icon-danger border-danger bg-white d-flex justify-content-center align-items-center">
    <i class="fa-solid fa-exclamation text-danger"></i>
  </div> -->

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

    <form action="action.php" method="post" class=""enctype="multipart/form-data">
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
                  <input type="email" class="form-control" id="pinfo-email" placeholder="Enter email..." name="email[]"
                    required />
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
                  <input type="tel" class="form-control" id="pinfo-phone" placeholder="Enter phone number..."
                    name="phone[]" required />
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
      <div class="w-100 d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary btn-sm w-100 disabled" id="final-submit">
          Submit
        </button>
      </div>
    </form>

    <!-- Tab panes -->
  </div>

  <!-- <script>
  const bar = document.getElementById("pwd")
  bar.classList.add("is-invalid")
  bar.classList.remove("is-valid")
  </script>   -->

  <script src="./pages/cv/validate/tab_script.js"></script>
  <script src="./pages/cv/validate/pinfo_script.js"></script>
  <script src="./pages/cv/validate/exp_script.js"></script>
  <script src="./pages/cv/validate/edu_script.js"></script>
  <script src="./pages/cv/validate/cer_script.js"></script>
  <script src="./pages/cv/validate/skills_script.js"></script>
  <script src="./pages/cv/validate/prj_script.js"></script>
  <script src="./pages/cv/validate/ref_script.js"></script>
</main>