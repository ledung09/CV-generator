// Project
const maxPrj = 5;
var idPrj = 0;

const prjList = document.getElementById("prj-list")
const addPrj = document.getElementById("add-prj")
const delPrjs = document.getElementsByClassName('del-prj')

const prjCards = document.getElementsByClassName('prj-card')
const prjTitle = document.getElementsByClassName('prj-title')

// Update jobdes-input name when order change
function updatePrjInfo() {
  for (var i=0; i<prjTitle.length; i++) 
    prjTitle[i].innerHTML = `Project #${i+1}`
}

addPrj.addEventListener('click', () => {
  idPrj++;

  var newPrjCard = document.createElement('div');
  newPrjCard.className = 'prj-card card mb-4';
  newPrjCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title prj-title">Education #1</h4>
        <button type="button" class="btn-close del-prj" id="del-prj${idPrj}" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="prj-name${idPrj}" class="form-label">Project name</label>
            <input type="text" class="form-control prj-name" id="prj-name${idPrj}" placeholder="Enter project name..." name="prj-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-prj-feedback${idPrj}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="prj-year${idPrj}" class="form-label">Project year</label>
            <input type="text" class="form-control prj-year" id="prj-year${idPrj}" placeholder="Enter project year..." name="prj-year[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-prj-feedback${idPrj}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="prj-link${idPrj}" class="form-label">Project link</label>
        <input type="text" class="form-control prj-link" id="prj-link${idPrj}" placeholder="Enter project link..." name="prj-link[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-prj-feedback${idPrj}">Please fill out this field.</div>
      </div>
      <div class="mb-3">
        <label for="prj-des${idPrj}" class="form-label">Project description</label>
        <input type="tel" class="form-control prj-des" id="prj-des${idPrj}" placeholder="Enter project description..." name="prj-des[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-prj-feedback${idPrj}">Please fill out this field.</div>
      </div>
    </div>
  `;
  prjList.appendChild(newPrjCard);

  if (prjCards.length === maxPrj) addPrj.style.display = 'none';

  const inp1 = document.getElementById(`prj-name${idPrj}`);
  const inp2 = document.getElementById(`prj-year${idPrj}`);
  const inp3 = document.getElementById(`prj-link${idPrj}`);
  const inp4 = document.getElementById(`prj-des${idPrj}`);

  const invalidFeeds = document.getElementsByClassName(`invalid-prj-feedback${idPrj}`)

  function validatePrjInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;
    var value3 = inp3.value;
    var value4 = inp4.value;

    warningExp(inp1, invalidFeeds[0], true, '', 'prj', 'prj-nav-link');
    warningExp(inp2, invalidFeeds[1], true, '', 'prj', 'prj-nav-link');
    warningExp(inp3, invalidFeeds[2], true, '', 'prj', 'prj-nav-link');
    warningExp(inp4, invalidFeeds[3], true, '', 'prj', 'prj-nav-link');

    // Validare text
    if (value1.length === 0) warningExp(inp1, invalidFeeds[0], false, 'Do not leave empty!', 'prj', 'prj-nav-link')
    else if (value1.length > 50) warningExp(inp1, invalidFeeds[0], false, 'Maximum 50 characters!', 'prj', 'prj-nav-link')
    else if (!addressRegex.test(value1.trim())) warningExp(inp1, invalidFeeds[0], false, 'No special character allow!', 'prj', 'prj-nav-link')

    if (value2.length === 0) warningExp(inp2, invalidFeeds[1], false, 'Do not leave empty!', 'prj', 'prj-nav-link')
    else if (value2.length != 4 || !yearRegex.test(value2.trim())) warningExp(inp2, invalidFeeds[1], false, 'Invalid year!', 'prj', 'prj-nav-link')
    else {
      const currentYear = new Date().getFullYear();
      const minValidYear = currentYear - 100;
      const maxValidYear = currentYear;
      const numericYear = parseInt(value2, 10);
      if (numericYear < minValidYear || numericYear > maxValidYear)
        warningExp(inp2, invalidFeeds[1], false, 'Invalid year!', 'prj', 'prj-nav-link')
    }
  
    if (value3.length === 0) warningExp(inp3, invalidFeeds[2], false, 'Do not leave empty!', 'prj', 'prj-nav-link')
    else if (!linkRegex.test(value3.trim())) warningExp(inp3, invalidFeeds[2], false, 'Invalid link format!', 'prj', 'prj-nav-link')

    if (value4.length === 0) warningExp(inp4, invalidFeeds[3], false, 'Do not leave empty!', 'prj', 'prj-nav-link')
    else if (value4.length > 250) warningExp(inp4, invalidFeeds[3], false, 'Maximum 250 characters!', 'prj', 'prj-nav-link')
    else if (!addressRegex.test(value4.trim())) warningExp(inp4, invalidFeeds[3], false, 'No special character allow!', 'prj', 'prj-nav-link')

  }
  
  inp1.addEventListener('keyup', validatePrjInput)
  inp2.addEventListener('keyup', validatePrjInput)
  inp3.addEventListener('keyup', validatePrjInput)
  inp4.addEventListener('keyup', validatePrjInput)


  validatePrjInput();
  updatePrjInfo();
  finalSubmitCheck();

  const delPrjBtn = document.getElementById(`del-prj${idPrj}`)

  // Delete job
  delPrjBtn.addEventListener('click', (event) => {
    prjList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (prjCards.length < maxPrj) addPrj.style.display = 'block';
    updatePrjInfo();
    // Verify status when deleting
    pillVerify('prj', 'prj-nav-link');
  })
})
