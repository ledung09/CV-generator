// Experience tab

const maxJob = 5;
const maxDes = 5;

var idExp = 0;
var idExpDes = 0;

const jobList = document.getElementById("job-list")
const addJob = document.getElementById("add-job")

const delJobs = document.getElementsByClassName('del-job')
const delJobDeses = document.getElementsByClassName('del-job-des')

const jobDesList = document.getElementsByClassName("job-des-list")

const jobCards = document.getElementsByClassName('job-card')
const expTitle = document.getElementsByClassName('exp-title')

const desItems = document.getElementsByClassName('list-group-item');

// Update jobdes-input name when order change
function updateJobInfo() {
  for (var i=0; i<expTitle.length; i++) 
    expTitle[i].innerHTML = `Experience #${i+1}`

  for (var i = 0; i < jobDesList.length; i++) {
    const inputs = jobDesList[i].getElementsByClassName('des-input');
    Array.from(inputs).forEach((input) => {
      input.name = `job-des[${i}][]`
    })
  }
}

// Util function
function addJobDesUtil(i, addBtn) {
  const jobDesLists = document.getElementById(`job-des-list${i}`)
  idExpDes++;

  // Append li-tag (job-des)
  var newListItem = document.createElement('li');
  newListItem.classList.add('list-group-item', 'd-flex', 'align-items-center', 'gap-3', 'job-des-item');
  newListItem.innerHTML = `
    <i class="fa-solid fa-caret-right"></i>
    <div class="d-flex flex-column gap-1 flex-grow-1">
      <input type="text" class="form-control des-input exps-des" name="job-des[${i}][]" placeholder="Enter job description..."
        id="job-des${idExpDes}" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback" id="invalid-feedback${idExpDes}">Please fill out this field.</div>
    </div>
    <button type="button" class="btn-close del-job-des" aria-label="Close" id="del-des-btn${idExpDes}"></button>
  `;
  jobDesLists.appendChild(newListItem);

  // If 5 tag, hide add btn
  if (jobDesLists.getElementsByTagName('li').length === 5) addBtn.style.display = 'none';

  // Validate des-input
  const jobDesInp = document.getElementById(`job-des${idExpDes}`)
  const jobDesFeeds = document.getElementById(`invalid-feedback${idExpDes}`)
  
  function validateExpDesInput() {
    var jobDesInpVal = jobDesInp.value;
    warningExp(jobDesInp, jobDesFeeds, true, "", 'exp', 'exp-nav-link')
    if (jobDesInpVal.length === 0) warningExp(jobDesInp, jobDesFeeds, false, "Do not leave empty!", 'exp', 'exp-nav-link')
    else if (jobDesInpVal.length > 150) warningExp(jobDesInp, jobDesFeeds, false, "Maximum 150 characters!", 'exp', 'exp-nav-link')
    else if (!skillRegex.test(jobDesInpVal.trim())) warningExp(jobDesInp, jobDesFeeds, false, "No special character allow!", 'exp', 'exp-nav-link')
  }

  jobDesInp.addEventListener('keyup', validateExpDesInput)

  validateExpDesInput()

  // Del des
  const delDesBtn = document.getElementById(`del-des-btn${idExpDes}`)
  delDesBtn.addEventListener('click', (e) => {
    // Reshow des-add btn if not maxDes
    if (e.target.parentNode.parentNode.getElementsByTagName('li').length <= maxDes) 
      e.target.parentNode.parentNode.parentNode.getElementsByClassName('add-job-deses')[0].style.display = 'flex';
    e.target.parentNode.parentNode.removeChild(e.target.parentNode)
    pillVerify('exp', 'exp-nav-link')
  })
}


const addJobDeses = document.getElementsByClassName('add-job-deses')

addJob.addEventListener('click', () => {
  idExp++;
  if (delJobs.length !== 0) delJobs[0].classList.remove('d-none');

  var newJobCard = document.createElement('div');
  newJobCard.className = 'job-card card mb-4';
  newJobCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title exp-title">Experience #1</h4>
        <button type="button" class="btn-close del-job" id="del-job${idExp}" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="job-title${idExp}" class="form-label">Job title</label>
            <input type="text" class="form-control exps-title" id="job-title${idExp}" placeholder="Enter job title..." name="job-title[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-feedback${idExp}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="company-name${idExp}" class="form-label">Company name</label>
            <input type="text" class="form-control exps-name" id="company-name${idExp}" placeholder="Enter company name..." name="company-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-feedback${idExp}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="job-start-date${idExp}" class="form-label">Job start date</label>
            <input type="date" class="form-control exps-sdate" id="job-start-date${idExp}" name="job-start-date[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-feedback${idExp}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="job-end-date${idExp}" class="form-label">Job end date</label>
            <input type="date" class="form-control exps-edate" id="job-end-date${idExp}" name="job-end-date[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-feedback${idExp}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="mb-3 d-flex gap-2 align-items-center">
        <label for="" class="form-label mb-0">Job description (maximum 5)</label>
        <button type="button" class="btn-addminus btn btn-outline-secondary flex-center mt-1 add-job-deses" id="add-job-des${idExp}">
          <i class="fa-solid fa-plus"></i>
        </button>
      </div>
      <ul class="list-group job-des-list" id="job-des-list${idExp}">
      </ul>
    </div>
  `;
  jobList.appendChild(newJobCard);

  // X button of first jobCard
  if (delJobs.length === 1) delJobs[0].classList.add('d-none');
  if (jobCards.length === maxJob) addJob.style.display = 'none';

  const inp1 = document.getElementById(`job-title${idExp}`);
  const inp2 = document.getElementById(`company-name${idExp}`);
  const inp3 = document.getElementById(`job-start-date${idExp}`);
  const inp4 = document.getElementById(`job-end-date${idExp}`);
  const invalidFeeds = document.getElementsByClassName(`invalid-feedback${idExp}`)

  function validateExpInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;
    var value3 = inp3.value;
    var value4 = inp4.value;

    warningExp(inp1, invalidFeeds[0], true, '', 'exp', 'exp-nav-link');
    warningExp(inp2, invalidFeeds[1], true, '', 'exp', 'exp-nav-link');
    warningExp(inp3, invalidFeeds[2], true, '', 'exp', 'exp-nav-link');
    warningExp(inp4, invalidFeeds[3], true, '', 'exp', 'exp-nav-link');

    // Validare text
    if (value1.length === 0) warningExp(inp1, invalidFeeds[0], false, 'Do not leave empty!', 'exp', 'exp-nav-link')
    else if (value1.length > 50) warningExp(inp1, invalidFeeds[0], false, 'Maximum 50 characters!', 'exp', 'exp-nav-link')
    else if (!skillRegex.test(value1.trim())) warningExp(inp1, invalidFeeds[0], false, 'No special character allow!', 'exp', 'exp-nav-link')

    if (value2.length === 0) warningExp(inp2, invalidFeeds[1], false, 'Do not leave empty!', 'exp', 'exp-nav-link')
    else if (value2.length > 100) warningExp(inp2, invalidFeeds[1], false, 'Maximum 100 characters!', 'exp', 'exp-nav-link')
    else if (!addressRegex.test(value2.trim())) warningExp(inp2, invalidFeeds[1], false, 'No special character allow!', 'exp', 'exp-nav-link')
    
    // Verify date!
    var currentDate = new Date();
    var minDate = new Date(currentDate);
    minDate.setFullYear(currentDate.getFullYear() - 100);
    var maxDate = new Date(currentDate);
    maxDate.setFullYear(currentDate.getFullYear() + 100);

    var startDate = new Date(value3);
    var endDate = new Date(value4);
      
    if (value3 === "") warningExp(inp3, invalidFeeds[2], false, 'Do not leave empty!', 'exp', 'exp-nav-link')
    if (startDate <= minDate || startDate >= maxDate || startDate > currentDate) warningExp(inp3, invalidFeeds[2], false, 'Please input valid date!', 'exp', 'exp-nav-link')

    if (value4 === "") warningExp(inp4, invalidFeeds[3], false, 'Do not leave empty!', 'exp', 'exp-nav-link')
    if (endDate <= minDate || endDate >= maxDate || endDate > currentDate) warningExp(inp4, invalidFeeds[3], false, 'Please input valid date!', 'exp', 'exp-nav-link')
    
    if (endDate < startDate) {
      warningExp(inp3, invalidFeeds[2], false, 'Please input valid date!', 'exp', 'exp-nav-link')
      warningExp(inp4, invalidFeeds[3], false, 'Please input valid date!', 'exp', 'exp-nav-link')
    }
  }
  
  inp1.addEventListener('keyup', validateExpInput)
  inp2.addEventListener('keyup', validateExpInput)
  inp3.addEventListener('change', validateExpInput)
  inp4.addEventListener('change', validateExpInput)

  validateExpInput();
  finalSubmitCheck();

  updateJobInfo();

  const delJobBtn = document.getElementById(`del-job${idExp}`)

  // Delete job
  delJobBtn.addEventListener('click', (event) => {
    jobList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (jobCards.length < maxJob) addJob.style.display = 'block';
    if (delJobs.length === 1) delJobs[0].classList.add('d-none'); 
    updateJobInfo();
    // Verify status when deleting
    pillVerify('exp', 'exp-nav-link');
  })

  const addJobDesBtn = document.getElementById(`add-job-des${idExp}`);
  // Add job des-btn
  addJobDesBtn.addEventListener('click', () => {
    addJobDesUtil(parseInt(addJobDesBtn.id.replace("add-job-des", "")), addJobDesBtn);
    updateJobInfo();
  })
})