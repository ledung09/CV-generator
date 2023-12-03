// Cerification tab
const maxCer = 5;
var idCer = 0;

const cerList = document.getElementById("cer-list")
const addCer = document.getElementById("add-cer")
const delCers = document.getElementsByClassName('del-cer')

const cerCards = document.getElementsByClassName('cer-card')
const cerTitle = document.getElementsByClassName('cer-title')

// Update jobdes-input name when order change
function updateCerInfo() {
  for (var i=0; i<cerTitle.length; i++) 
    cerTitle[i].innerHTML = `Certificate #${i+1}`
}

addCer.addEventListener('click', () => {
  idCer++;
  if (delCers.length !== 0) delCers[0].classList.remove('d-none');

  var newCerCard = document.createElement('div');
  newCerCard.className = 'cer-card card mb-4';
  newCerCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title cer-title">Education #1</h4>
        <button type="button" class="btn-close del-cer" id="del-cer${idCer}" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="cer-name${idCer}" class="form-label">Certificate name</label>
            <input type="text" class="form-control cer-name" id="cer-name${idCer}" placeholder="Enter certificate name..." name="cer-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-cer-feedback${idCer}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="cer-year${idCer}" class="form-label">Year of certification</label>
            <input type="text" class="form-control cer-year" id="cer-year${idCer}" placeholder="Enter year of certification..." name="cer-year[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-cer-feedback${idCer}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="cer-ins-name${idCer}" class="form-label">Certifying institution name</label>
        <input type="text" class="form-control cer-insname" id="cer-ins-name${idCer}" placeholder="Enter certifying institution name..." name="cer-ins-name[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-cer-feedback${idCer}">Please fill out this field.</div>
      </div>
      <div class="mb-3">
        <label for="cer-link${idCer}" class="form-label">Certificate link</label>
        <input type="text" class="form-control cer-link" id="cer-link${idCer}" placeholder="Enter certificate link..." name="cer-link[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-cer-feedback${idCer}">Please fill out this field.</div>
      </div>
    </div>
  `;
  cerList.appendChild(newCerCard);

  if (delCers.length === 1) delCers[0].classList.add('d-none');
  if (cerCards.length === maxCer) addCer.style.display = 'none';

  const inp1 = document.getElementById(`cer-name${idCer}`);
  const inp2 = document.getElementById(`cer-year${idCer}`);
  const inp3 = document.getElementById(`cer-ins-name${idCer}`);
  const inp4 = document.getElementById(`cer-link${idCer}`);

  const invalidFeeds = document.getElementsByClassName(`invalid-cer-feedback${idCer}`)

  function validatePrjInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;
    var value3 = inp3.value;
    var value4 = inp4.value;

    warningExp(inp1, invalidFeeds[0], true, '', 'cer', 'cer-nav-link');
    warningExp(inp2, invalidFeeds[1], true, '', 'cer', 'cer-nav-link');
    warningExp(inp3, invalidFeeds[2], true, '', 'cer', 'cer-nav-link');
    warningExp(inp4, invalidFeeds[3], true, '', 'cer', 'cer-nav-link');

    // Validare text
    if (value1.length === 0) warningExp(inp1, invalidFeeds[0], false, 'Do not leave empty!', 'cer', 'cer-nav-link')
    else if (value1.length > 100) warningExp(inp1, invalidFeeds[0], false, 'Maximum 100 characters!', 'cer', 'cer-nav-link')
    else if (!addressRegex.test(value1.trim())) warningExp(inp1, invalidFeeds[0], false, 'No special character allow!', 'cer', 'cer-nav-link')

    if (value2.length === 0) warningExp(inp2, invalidFeeds[1], false, 'Do not leave empty!', 'cer', 'cer-nav-link')
    else if (value2.length != 4 || !yearRegex.test(value2.trim())) warningExp(inp2, invalidFeeds[1], false, 'Invalid year!', 'cer', 'cer-nav-link')
    else {
      const currentYear = new Date().getFullYear();
      const minValidYear = currentYear - 100;
      const maxValidYear = currentYear;
      const numericYear = parseInt(value2, 10);
      if (numericYear < minValidYear || numericYear > maxValidYear)
        warningExp(inp2, invalidFeeds[1], false, 'Invalid year!', 'cer', 'cer-nav-link')
    }
  
    if (value3.length === 0) warningExp(inp3, invalidFeeds[2], false, 'Do not leave empty!', 'cer', 'cer-nav-link')
    else if (value3.length > 100) warningExp(inp3, invalidFeeds[2], false, 'Maximum 100 characters!', 'cer', 'cer-nav-link')
    else if (!addressRegex.test(value3.trim())) warningExp(inp3, invalidFeeds[2], false, 'No special character allow!', 'cer', 'cer-nav-link')

    if (value4.length === 0) warningExp(inp4, invalidFeeds[3], false, 'Do not leave empty!', 'cer', 'cer-nav-link')
    else if (!linkRegex.test(value4.trim())) warningExp(inp4, invalidFeeds[3], false, 'Invalid link format!', 'cer', 'cer-nav-link')

  }
  
  inp1.addEventListener('keyup', validatePrjInput)
  inp2.addEventListener('keyup', validatePrjInput)
  inp3.addEventListener('keyup', validatePrjInput)
  inp4.addEventListener('keyup', validatePrjInput)

  validatePrjInput();
  updateCerInfo();
  finalSubmitCheck();

  const delCerBtn = document.getElementById(`del-cer${idCer}`)

  // Delete job
  delCerBtn.addEventListener('click', (event) => {
    cerList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (cerCards.length < maxCer) addCer.style.display = 'block';
    if (delCers.length === 1) delCers[0].classList.add('d-none'); 
    updateCerInfo();
    // Verify status when deleting
    pillVerify('cer', 'cer-nav-link');
  })
})
