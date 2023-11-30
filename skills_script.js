// SKills tab
const maxSkills = 5;
var idSkills = 0;

const skillList = document.getElementById("skills-list");
const addSkills = document.getElementById("add-skills");
const delSkills = document.getElementsByClassName("del-skills");

const skillsCards = document.getElementsByClassName("skills-card");
const skillsTitle = document.getElementsByClassName("skills-title");

// Update jobdes-input name when order change
function updateSkillInfo() {
  for (var i = 0; i < skillsTitle.length; i++)
    skillsTitle[i].innerHTML = `Skillset #${i + 1}`;
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
        <input type="text" class="form-control" id="skills-category${idSkills}" placeholder="Enter skills category..." name="skills-category[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-skills-feedback${idSkills}">Please fill out this field.</div>
      </div>
      <div class="mb-3">
        <label for="skills-name${idSkills}" class="form-label">Skills name (seperate by ,)</label>
        <input type="text" class="form-control" id="skills-name${idSkills}" placeholder="Enter skills name..." name="skills-name[]" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback invalid-skills-feedback${idSkills}">Please fill out this field.</div>
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
    else if (value2.length > 250)
      warningExp(
        inp2,
        invalidFeeds[1],
        false,
        "Maximum 250 characters!",
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
});
