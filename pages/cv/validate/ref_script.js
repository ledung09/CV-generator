// Education tab
const maxRef = 5;
var idRef = 0;

const refList = document.getElementById("ref-list")
const addRef = document.getElementById("add-ref")
const delRefs = document.getElementsByClassName('del-ref')

const refCards = document.getElementsByClassName('ref-card')
const refTitle = document.getElementsByClassName('ref-title')

// Update jobdes-input name when order change
function updateRefInfo() {
  for (var i=0; i<refTitle.length; i++) 
    refTitle[i].innerHTML = `Reference #${i+1}`
}

addRef.addEventListener('click', () => {
  idRef++;

  var newRefCard = document.createElement('div');
  newRefCard.className = 'ref-card card mb-4';
  newRefCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title ref-title">Education #1</h4>
        <button type="button" class="btn-close del-ref" id="del-ref${idRef}" aria-label="Close"></button>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="ref-name${idRef}" class="form-label">Referee name</label>
            <input type="text" class="form-control ref-name" id="ref-name${idRef}" placeholder="Enter referee name..." name="ref-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-ref-feedback${idRef}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="ref-ins-name${idRef}" class="form-label">Referee institution name</label>
            <input type="text" class="form-control ref-ins-name" id="ref-ins-name${idRef}" placeholder="Enter referee institution name..." name="ref-ins-name[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-ref-feedback${idRef}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <div class="mb-3">
            <label for="ref-email${idRef}" class="form-label">Referee email</label>
            <input type="email" class="form-control ref-email" id="ref-email${idRef}" placeholder="Enter referee email..." name="ref-email[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-ref-feedback${idRef}">Please fill out this field.</div>
          </div>
        </div>
        <div class="col-md">
          <div class="mb-3">
            <label for="ref-phone${idRef}" class="form-label">Referee phone</label>
            <input type="tel" class="form-control ref-phone" id="ref-phone${idRef}" placeholder="Enter referee phone..." name="ref-phone[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-ref-feedback${idRef}">Please fill out this field.</div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="ref-relation${idRef}" class="form-label">Referee relationship</label>
        <input type="text" class="form-control ref-rel" id="ref-relation${idRef}" placeholder="Enter referee relationship..." name="ref-relation[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-ref-feedback${idRef}">Please fill out this field.</div>
      </div>
    </div>
  `;
  refList.appendChild(newRefCard);

  if (refCards.length === maxRef) addRef.style.display = 'none';

  const inp1 = document.getElementById(`ref-name${idRef}`);
  const inp2 = document.getElementById(`ref-ins-name${idRef}`);
  const inp3 = document.getElementById(`ref-email${idRef}`);
  const inp4 = document.getElementById(`ref-phone${idRef}`);
  const inp5 = document.getElementById(`ref-relation${idRef}`);

  const invalidFeeds = document.getElementsByClassName(`invalid-ref-feedback${idRef}`)

  function validateRefInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;
    var value3 = inp3.value;
    var value4 = inp4.value;
    var value5 = inp5.value;


    warningExp(inp1, invalidFeeds[0], true, '', 'ref', 'ref-nav-link');
    warningExp(inp2, invalidFeeds[1], true, '', 'ref', 'ref-nav-link');
    warningExp(inp3, invalidFeeds[2], true, '', 'ref', 'ref-nav-link');
    warningExp(inp4, invalidFeeds[3], true, '', 'ref', 'ref-nav-link');
    warningExp(inp5, invalidFeeds[4], true, '', 'ref', 'ref-nav-link');

    // Validare text
    if (value1.length === 0) warningExp(inp1, invalidFeeds[0], false, 'Do not leave empty!', 'ref', 'ref-nav-link')
    else if (value1.length > 100) warningExp(inp1, invalidFeeds[0], false, 'Maximum 100 characters!', 'ref', 'ref-nav-link')
    else if (!textRegex.test(value1.trim())) warningExp(inp1, invalidFeeds[0], false, 'No special character allow!', 'ref', 'ref-nav-link')

    if (value2.length === 0) warningExp(inp2, invalidFeeds[1], false, 'Do not leave empty!', 'ref', 'ref-nav-link')
    else if (value2.length > 50) warningExp(inp2, invalidFeeds[1], false, 'Maximum 50 characters!', 'ref', 'ref-nav-link')
    else if (!addressRegex.test(value2.trim())) warningExp(inp2, invalidFeeds[1], false, 'No special character allow!', 'ref', 'ref-nav-link')
  
    if (value3.length === 0) warningExp(inp3, invalidFeeds[2], false, 'Do not leave empty!', 'ref', 'ref-nav-link')
    else if (value3.length > 255) warningExp(inp3, invalidFeeds[2], false, 'Maximum 255 characters!', 'ref', 'ref-nav-link')
    else if (!emailRegex.test(value3.trim())) warningExp(inp3, invalidFeeds[2], false, 'Invalid email format!', 'ref', 'ref-nav-link')

    if (value4.length === 0) warningExp(inp4, invalidFeeds[3], false, 'Do not leave empty!', 'ref', 'ref-nav-link')
    else if (value4.length < 4) warningExp(inp4, invalidFeeds[3], false, 'Minimum 4 characters!', 'ref', 'ref-nav-link')
    else if (value4.length > 20) warningExp(inp4, invalidFeeds[3], false, 'Maximum 20 characters!', 'ref', 'ref-nav-link')
    else if (!phoneRegex.test(value4.trim())) warningExp(inp4, invalidFeeds[3], false, 'Invalid phone format!', 'ref', 'ref-nav-link')
    
    if (value5.length === 0) warningExp(inp5, invalidFeeds[4], false, 'Do not leave empty!', 'ref', 'ref-nav-link')
    else if (value5.length > 200) warningExp(inp5, invalidFeeds[4], false, 'Maximum 200 characters!', 'ref', 'ref-nav-link')
    else if (!addressRegex.test(value5.trim())) warningExp(inp5, invalidFeeds[4], false, 'No special character allow!', 'ref', 'ref-nav-link')
  }
  
  inp1.addEventListener('keyup', validateRefInput)
  inp2.addEventListener('keyup', validateRefInput)
  inp3.addEventListener('keyup', validateRefInput)
  inp4.addEventListener('keyup', validateRefInput)
  inp5.addEventListener('keyup', validateRefInput)


  validateRefInput();
  updateRefInfo();
  finalSubmitCheck();

  const delRefBtn = document.getElementById(`del-ref${idRef}`)

  // Delete job
  delRefBtn.addEventListener('click', (event) => {
    refList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (refCards.length < maxRef) addRef.style.display = 'block';
    updateRefInfo();
    // Verify status when deleting
    pillVerify('ref', 'ref-nav-link');
  })
})
