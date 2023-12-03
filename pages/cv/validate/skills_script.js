// SKills tab
const maxSkills = 5;
var idSkills = 0;
var skillNameID = 0;

const skillList = document.getElementById("skills-list");
const addSkills = document.getElementById("add-skills");
const delSkills = document.getElementsByClassName("del-skills");

const skillsCards = document.getElementsByClassName("skills-card");
const skillsTitle = document.getElementsByClassName("skills-title");

// Update jobdes-input name when order change
function updateSkillInfo() {
  for (var i = 0; i < skillsTitle.length; i++)
    skillsTitle[i].innerHTML = `Skillset #${i + 1}`;

  const skillNameInp = document.getElementsByClassName('skill-name-inp')  
  for (var i=0; i < skillsCards.length; i++) {
    Array.from(skillNameInp).forEach((inp) => {
      inp.name = `skills-name[${i}][]`
    })
  }
  // Update when add/ delete
  // Skill name list update!
}

addSkills.addEventListener("click", () => {
  idSkills++;
  if (delSkills.length !== 0) delSkills[0].classList.remove("d-none");

  var newSkillsCard = document.createElement("div");
  newSkillsCard.className = "skills-card card mb-4";
  newSkillsCard.innerHTML = `
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title skills-title">Skillset #1</h4>
        <button type="button" class="btn-close del-skills" id="del-skills${idSkills}" aria-label="Close"></button>
      </div>
      <div class="mb-3">
        <label for="skills-category${idSkills}" class="form-label">Skills category</label>
        <input type="text" class="form-control skills-category" id="skills-category${idSkills}" placeholder="Enter skills category..." name="skills-category[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-skills-feedback${idSkills}">Please fill out this field.</div>
      </div>
      <div className="mb-3">
        <div id="skills-name-list${idSkills}">
          <div class="mb-3">
            <label for="skills-name${idSkills}" class="form-label">Skills name</label>
            <input type="text" class="form-control skill-name-inp" id="skills-name${idSkills}" placeholder="Enter skill name..." name="skills-name[][]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback invalid-skills-feedback${idSkills}">Please fill out this field.</div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary btn-sm skills-add-name" id="skills-add-name${idSkills}">
          <div class="btn-additem d-flex gap-1 align-items-center">
            <p>Add</p>
            <i class="fa-solid fa-plus"></i>
          </div>
        </button>
      </div>
    </div>
  `;
  skillList.appendChild(newSkillsCard);

  if (delSkills.length === 1) delSkills[0].classList.add("d-none");
  if (skillsCards.length === maxSkills) addSkills.style.display = "none";

  const inp1 = document.getElementById(`skills-category${idSkills}`);
  const inp2 = document.getElementById(`skills-name${idSkills}`);

  const invalidFeeds = document.getElementsByClassName(
    `invalid-skills-feedback${idSkills}`
  );

  function validateSkillsInput() {
    var value1 = inp1.value;
    var value2 = inp2.value;

    warningExp(inp1, invalidFeeds[0], true, "", "skills", "skills-nav-link");
    warningExp(inp2, invalidFeeds[1], true, "", "skills", "skills-nav-link");

    // Validare text
    if (value1.length === 0)
      warningExp(
        inp1,
        invalidFeeds[0],
        false,
        "Do not leave empty!",
        "skills",
        "skills-nav-link"
      );
    else if (value1.length > 100)
      warningExp(
        inp1,
        invalidFeeds[0],
        false,
        "Maximum 100 characters!",
        "skills",
        "skills-nav-link"
      );
    else if (!addressRegex.test(value1.trim()))
      warningExp(
        inp1,
        invalidFeeds[0],
        false,
        "No special character allow!",
        "skills",
        "skills-nav-link"
      );

    if (value2.length === 0)
      warningExp(
        inp2,
        invalidFeeds[1],
        false,
        "Do not leave empty!",
        "skills",
        "skills-nav-link"
      );
    else if (value2.length > 100)
      warningExp(
        inp2,
        invalidFeeds[1],
        false,
        "Maximum 100 characters!",
        "skills",
        "skills-nav-link"
      );
    else if (!skillRegex.test(value2.trim()))
      warningExp(
        inp2,
        invalidFeeds[1],
        false,
        "No special character allow!",
        "skills",
        "skills-nav-link"
      );
  }

  inp1.addEventListener("keyup", validateSkillsInput);
  inp2.addEventListener("keyup", validateSkillsInput);

  validateSkillsInput();
  updateSkillInfo();
  finalSubmitCheck();

  const delSkillsBtn = document.getElementById(`del-skills${idSkills}`);

  // Delete job
  delSkillsBtn.addEventListener("click", (event) => {
    skillList.removeChild(event.target.parentNode.parentNode.parentNode);
    // Add job btn display, X button first job
    if (skillsCards.length < maxSkills) addSkills.style.display = "block";
    if (delSkills.length === 1) delSkills[0].classList.add("d-none");
    updateSkillInfo();
    // Verify status when deleting
    pillVerify("skills", "skills-nav-link");
  });

  const addSkillNameBtn = document.getElementById(`skills-add-name${idSkills}`)
  const skillNameList = document.getElementById(`skills-name-list${idSkills}`)

  addSkillNameBtn.addEventListener('click', () => {
    skillNameID++;
    var newSkillNameItem = document.createElement('div');
    newSkillNameItem.className = `d-flex mb-3 align-items-start gap-2 skill-name-card${skillNameID}`; // Set the desired class name
    newSkillNameItem.innerHTML = `
      <div class="flex-grow-1">
        <input type="text" class="form-control skill-name-inp" id="skill-namess${skillNameID}" placeholder="Enter skill name..." name="skills-name[][]" required />
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback" id="skill-namess-feed${skillNameID}">Please fill out this field.</div>
      </div>
      <button type="button" class="btn-close mt-2" aria-label="Close" id="del-skillNamess${skillNameID}"></button>
    `;

    // Append the newSkillNameItem to the skillNameList
    skillNameList.appendChild(newSkillNameItem);
    const skillNameCard = document.getElementsByClassName(`skill-name-card${skillNameID}`)
    if (skillNameCard.length === 4) addSkillNameBtn.style.display = 'none'
    
    const skillNamesInput = document.getElementById(`skill-namess${skillNameID}`)
    const skillNamesFeeed = document.getElementById(`skill-namess-feed${skillNameID}`)

    function validateSkillNamesInput() {
      var skillsnamesVal = skillNamesInput.value;

      if (skillsnamesVal.length === 0) warningExp(skillNamesInput, skillNamesFeeed, false, 'Do not leave any field empty!', "skills", "skills-nav-link")
      else if (skillsnamesVal.length > 100) warningExp(skillNamesInput, skillNamesFeeed, false, 'Maximum 100 characters!', "skills", "skills-nav-link")
      else if (!skillRegex.test(skillsnamesVal.trim())) warningExp(skillNamesInput, skillNamesFeeed, false, 'Invalid email format!', "skills", "skills-nav-link")
      else warningExp(skillNamesInput, skillNamesFeeed, true, '', "skills", "skills-nav-link")
      validateSkillsInput();
    }
    
    skillNamesInput.addEventListener('keyup', validateSkillNamesInput)
    validateSkillNamesInput()

    const delSkillsNamesBtn = document.getElementById(`del-skillNamess${skillNameID}`)
    delSkillsNamesBtn.addEventListener('click', (e) => {
      e.target.parentNode.parentNode.removeChild(e.target.parentNode)
      if (skillNameCard.length < 4) addSkillNameBtn.style.display = 'flex'
      validateSkillsInput();
    })
    updateSkillInfo();
  })
});


// Add skills
