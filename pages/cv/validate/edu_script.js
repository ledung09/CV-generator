// Education tab
const maxEdu = 5;
var idEdu = 0;

const eduList = document.getElementById("edu-list")
const addEdu = document.getElementById("add-edu")
const delEdus = document.getElementsByClassName('del-edu')

const eduCards = document.getElementsByClassName('edu-card')
const eduTitle = document.getElementsByClassName('edu-title')

// Update jobdes-input name when order change
function updateEduInfo() {
  for (var i=0; i<eduTitle.length; i++) 
    eduTitle[i].innerHTML = `Education #${i+1}`
}

addEdu.addEventListener('click', () => {
  idEdu++;
  if (delEdus.length !== 0) delEdus[0].classList.remove('d-none');

  var newEduCard = document.createElement('div');
  newEduCard.className = 'edu-card card mb-4';
  newEduCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title edu-title">Education #1</h4>
        <button type="button" class="btn-close del-edu" id="del-edu${idEdu}" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="edu-des${idEdu}" class="form-label">Education description</label>
            <input type="text" class="form-control edu-des" id="edu-des${idEdu}" placeholder="Enter education description..." name="edu-des[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-edu-feedback${idEdu}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="edu-ins-name${idEdu}" class="form-label">Education institution name</label>
            <input type="text" class="form-control edu-ins-name" id="edu-ins-name${idEdu}" placeholder="Enter education institution name..." name="edu-ins-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-edu-feedback${idEdu}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="edu-start-date${idEdu}" class="form-label">Education start date</label>
            <input type="date" class="form-control edu-sdate" id="edu-start-date${idEdu}" name="edu-start-date[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-edu-feedback${idEdu}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="edu-end-date${idEdu}" class="form-label">Education end date</label>
            <input type="date" class="form-control edu-edate" id="edu-end-date${idEdu}" name="edu-end-date[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-edu-feedback${idEdu}">Please fill out this field.</div>
          </div>
        </div>
      </div>
    </div>
  `;
  eduList.appendChild(newEduCard);

  // X button of first jobCard
  if (delEdus.length === 1) delEdus[0].classList.add('d-none');
  if (eduCards.length === maxEdu) addEdu.style.display = 'none';

  const inp1 = document.getElementById(`edu-des${idEdu}`);
  const inp2 = document.getElementById(`edu-ins-name${idEdu}`);
  const inp3 = document.getElementById(`edu-start-date${idEdu}`);
  const inp4 = document.getElementById(`edu-end-date${idEdu}`);
  const invalidFeeds = document.getElementsByClassName(`invalid-edu-feedback${idEdu}`)

  function validateEduInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;
    var value3 = inp3.value;
    var value4 = inp4.value;

    warningExp(inp1, invalidFeeds[0], true, '', 'edu', 'edu-nav-link');
    warningExp(inp2, invalidFeeds[1], true, '', 'edu', 'edu-nav-link');
    warningExp(inp3, invalidFeeds[2], true, '', 'edu', 'edu-nav-link');
    warningExp(inp4, invalidFeeds[3], true, '', 'edu', 'edu-nav-link');

    // Validare text
    if (value1.length === 0) warningExp(inp1, invalidFeeds[0], false, 'Do not leave empty!', 'edu', 'edu-nav-link')
    else if (value1.length > 100) warningExp(inp1, invalidFeeds[0], false, 'Maximum 100 characters!', 'edu', 'edu-nav-link')
    else if (!addressRegex.test(value1.trim())) warningExp(inp1, invalidFeeds[0], false, 'No special character allow!', 'edu', 'edu-nav-link')

    if (value2.length === 0) warningExp(inp2, invalidFeeds[1], false, 'Do not leave empty!', 'edu', 'edu-nav-link')
    else if (value2.length > 50) warningExp(inp2, invalidFeeds[1], false, 'Maximum 50 characters!', 'edu', 'edu-nav-link')
    else if (!addressRegex.test(value2.trim())) warningExp(inp2, invalidFeeds[1], false, 'No special character allow!', 'edu', 'edu-nav-link')
    
    // Verify date!
    var currentDate = new Date();
    var minDate = new Date(currentDate);
    minDate.setFullYear(currentDate.getFullYear() - 100);
    var maxDate = new Date(currentDate);
    maxDate.setFullYear(currentDate.getFullYear() + 100);

    var startDate = new Date(value3);
    var endDate = new Date(value4);

    

    if (value3 === "") warningExp(inp3, invalidFeeds[2], false, 'Do not leave empty!', 'edu', 'edu-nav-link')
    if (startDate <= minDate || startDate >= maxDate || startDate > currentDate) warningExp(inp3, invalidFeeds[2], false, 'Please input valid date!', 'edu', 'edu-nav-link')

    if (value4 === "") warningExp(inp4, invalidFeeds[3], false, 'Do not leave empty!', 'edu', 'edu-nav-link')
    if (endDate <= minDate || endDate >= maxDate || endDate > currentDate) warningExp(inp4, invalidFeeds[3], false, 'Please input valid date!', 'edu', 'edu-nav-link')
    
    if (endDate < startDate) {
      warningExp(inp3, invalidFeeds[2], false, 'Please input valid date!', 'edu', 'edu-nav-link')
      warningExp(inp4, invalidFeeds[3], false, 'Please input valid date!', 'edu', 'edu-nav-link');
    }
  }
  
  inp1.addEventListener('keyup', validateEduInput)
  inp2.addEventListener('keyup', validateEduInput)
  inp3.addEventListener('change', validateEduInput)
  inp4.addEventListener('change', validateEduInput)

  validateEduInput();
  updateEduInfo();
  finalSubmitCheck();

  const delEduBtn = document.getElementById(`del-edu${idEdu}`)

  // Delete job
  delEduBtn.addEventListener('click', (event) => {
    eduList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (eduCards.length < maxEdu) addEdu.style.display = 'block';
    if (delEdus.length === 1) delEdus[0].classList.add('d-none'); 
    updateEduInfo();
    // Verify status when deleting
    pillVerify('edu', 'edu-nav-link');
  })
})
