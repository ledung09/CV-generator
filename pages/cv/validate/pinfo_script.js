const pInfoFname = document.getElementById('pinfo-fname')
const pInfoProfess = document.getElementById('pinfo-profess')
const pInfoEmail = document.getElementById('pinfo-email')
const pInfoPhone = document.getElementById('pinfo-phone')
// Select
const pInfoCountry = document.getElementById('pinfo-country')
const pInfoCity = document.getElementById('pinfo-city')
const pInfoAddress = document.getElementById('pinfo-address')
// Img
const pInfoProfileImg = document.getElementById('pinfo-image')
const invalidPinfoFeeds = document.getElementsByClassName('invalid-pinfo')

// Country select box
var allData = []
var countryData = []
var cityData = []

const countries = document.getElementById('countries')
const cities = document.getElementById('cities')
const citiesInput = document.getElementById('pinfo-city')

const countryXhttp = new XMLHttpRequest();
countryXhttp.open("GET", "./data/countries.json", true);
countryXhttp.onload = function() {
  if (countryXhttp.status === 200) {
    allData = JSON.parse(countryXhttp.response);
    
    allData.forEach((country, idx) => {
      countries.innerHTML += `<option value='${country.name}'>`
      countryData.push(country.name)
    })
  } else {
    console.error("Request fail. Status: " + countryXhttp.status);
  }
};
countryXhttp.send();

function validatePinfoInput() {
  var fname = pInfoFname.value;
  var profess = pInfoProfess.value;
  var profess = pInfoProfess.value;
  var email =  pInfoEmail.value;
  var phone =  pInfoPhone.value;
// Select
  var country =  pInfoCountry.value;
  var city = pInfoCity.value;
  var addr = pInfoAddress.value;
// Img
  var profileImg =  pInfoProfileImg.files;

  warningExp(pInfoFname, invalidPinfoFeeds[0], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoProfess, invalidPinfoFeeds[1], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoEmail, invalidPinfoFeeds[2], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoPhone, invalidPinfoFeeds[3], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoCountry, invalidPinfoFeeds[4], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoCity, invalidPinfoFeeds[5], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoAddress, invalidPinfoFeeds[6], true, '', 'pinfo', 'pinfo-nav-link');
  warningExp(pInfoProfileImg, invalidPinfoFeeds[7], true, '', 'pinfo', 'pinfo-nav-link');


  if (fname.length === 0) warningExp(pInfoFname, invalidPinfoFeeds[0], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (fname.length > 50) warningExp(pInfoFname, invalidPinfoFeeds[0], false, 'Maximum 50 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!textRegex.test(fname.trim())) warningExp(pInfoFname, invalidPinfoFeeds[0], false, 'No special character/number allow!', 'pinfo', 'pinfo-nav-link')

  if (profess.length === 0) warningExp(pInfoProfess, invalidPinfoFeeds[1], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (profess.length > 50) warningExp(pInfoProfess, invalidPinfoFeeds[1], false, 'Maximum 50 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!textnumRegex.test(profess.trim())) warningExp(pInfoProfess, invalidPinfoFeeds[1], false, 'No special character allow!', 'pinfo', 'pinfo-nav-link')

  if (email.length === 0) warningExp(pInfoEmail, invalidPinfoFeeds[2], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (email.length > 255) warningExp(pInfoEmail, invalidPinfoFeeds[2], false, 'Maximum 255 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!emailRegex.test(email.trim())) warningExp(pInfoEmail, invalidPinfoFeeds[2], false, 'Invalid email format!', 'pinfo', 'pinfo-nav-link')

  if (phone.length === 0) warningExp(pInfoPhone, invalidPinfoFeeds[3], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (phone.length < 4) warningExp(pInfoPhone, invalidPinfoFeeds[3], false, 'Minimum 4 characters!', 'pinfo', 'pinfo-nav-link')
  else if (phone.length > 20) warningExp(pInfoPhone, invalidPinfoFeeds[3], false, 'Maximum 20 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!phoneRegex.test(phone.trim())) warningExp(pInfoPhone, invalidPinfoFeeds[3], false, 'Invalid phone format!', 'pinfo', 'pinfo-nav-link')

  citiesInput.removeAttribute('disabled');

  if (country.length === 0) warningExp(pInfoCountry, invalidPinfoFeeds[4], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (!countryData.includes(country)) warningExp(pInfoCountry, invalidPinfoFeeds[4], false, 'Type/Select data from the list!', 'pinfo', 'pinfo-nav-link')


  if (countryData.includes(country)) {
    var allCity = findObjectByName(allData, country).states.slice()    
    cities.innerHTML = ""
    

    if (allCity.length === 0) {
      allCity.push({name: " " })

      citiesInput.setAttribute('disabled', 'true');
      citiesInput.value = ""
      city = " "
    } else {
      citiesInput.removeAttribute('disabled');
    }
  
    cityData.length = 0
    allCity.forEach((city) => {
      cities.innerHTML += `<option value='${city.name}'>`
      cityData.push(city.name)
    })


  } else {
    cities.innerHTML = ""
  }



  if (city.length === 0) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (cities.getElementsByTagName('option').length === 0) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Type/Select country first!', 'pinfo', 'pinfo-nav-link')
  else if (!cityData.includes(city)) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Type/Select data from the list!', 'pinfo', 'pinfo-nav-link')


  if (addr.length === 0) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (addr.length > 150) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'Maximum 150 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!addressRegex.test(addr.trim())) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'No special character/number allow!', 'pinfo', 'pinfo-nav-link')

  // image bypass
  // if (profileImg.length === 0) warningExp(pInfoProfileImg, invalidPinfoFeeds[7], false, 'Select a file!', 'pinfo', 'pinfo-nav-link')
}



function validatePinfoFileInput(event) {
// Img
  var profileImg =  pInfoProfileImg.value;
  warningExp(pInfoProfileImg, invalidPinfoFeeds[7], true, '', 'pinfo', 'pinfo-nav-link');
  const fileInput = event.target;
  const uploadedImage = document.getElementById('pinfo-uploadedImage');
  if (fileInput.files && fileInput.files.length > 0) {
    const selectedFile = fileInput.files[0];
    const validExtensions = ['jpg', 'jpeg', 'png'];
    const fileExtension = selectedFile.name.split('.').pop().toLowerCase();

    if (validExtensions.includes(fileExtension)) {
      const reader = new FileReader();
      reader.onload = function (e) {
          uploadedImage.src = e.target.result;
          uploadedImage.style.display = 'block';
      };
      reader.readAsDataURL(selectedFile);
    } else {
      warningExp(pInfoProfileImg, invalidPinfoFeeds[7], false, 'Invalid image file extension!', 'pinfo', 'pinfo-nav-link')
      fileInput.value = ''; // Clear the file input
    }
  } else {
    warningExp(pInfoProfileImg, invalidPinfoFeeds[7], false, 'Select a file!', 'pinfo', 'pinfo-nav-link')
  }
}

pInfoFname.addEventListener('keyup', validatePinfoInput)
pInfoProfess.addEventListener('keyup', validatePinfoInput)
pInfoEmail.addEventListener('keyup', validatePinfoInput)
pInfoPhone.addEventListener('keyup', validatePinfoInput)
pInfoCountry.addEventListener('keyup', validatePinfoInput)
pInfoCity.addEventListener('keyup', validatePinfoInput)
pInfoAddress.addEventListener('keyup', validatePinfoInput)
pInfoProfileImg.addEventListener('change', validatePinfoInput)
pInfoProfileImg.addEventListener('change', validatePinfoFileInput)




// Add media

const addMedia = document.getElementById('pinfo-add-media');
const mediaList = document.getElementById('pinfo-media-list');
const delMediaBtns = document.getElementsByClassName('del-media')

var mediaID = 0;

addMedia.addEventListener('click', () => {
  mediaID++;
  var newSocialMediaDiv = document.createElement('div');
  newSocialMediaDiv.classList.add('mb-3', 'media-card')
  newSocialMediaDiv.innerHTML = `
    <div class="d-flex gap-2 align-items-center valid-container mediaVerify" id="mediaVerify${mediaID}">
      <div class="input-group">
        <select class="form-select w-25 pinfo-media-sl" id="mediaSelect${mediaID}">
          <option value="" selected disabled>Select social media</option>
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
          <option value="Other">Other</option>
        </select>
        <input type="text" class="pinfo-media-name form-control w-25 d-none" placeholder="Enter social media name..." name="media-name[]" required id="mediaName${mediaID}">
        <input type="text" class="pinfo-media form-control w-75" placeholder="Enter social media link..." name="media-link[]" required id="mediaLink${mediaID}">
      </div>
      <button type="button" class="btn-close del-media" aria-label="Close" id="del-media${mediaID}"></button> 
    </div>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback" id="invalid-media${mediaID}">Please fill out this field.</div>
  `;
  mediaList.appendChild(newSocialMediaDiv);

  const mediaCard = document.getElementsByClassName('media-card')
  if (mediaCard.length === 5) addMedia.style.display = 'none'
  // if (mediaCard.length === 1) delMediaBtns[0].style.display = 'none'
  // else delMediaBtns[0].style.display = 'flex';  
  validatePinfoInput()

  const mediaSelect = document.getElementById(`mediaSelect${mediaID}`)
  const mediaName = document.getElementById(`mediaName${mediaID}`)
  const mediaLink = document.getElementById(`mediaLink${mediaID}`)
  
  

  const delMediaBtn = document.getElementById(`del-media${mediaID}`)
  delMediaBtn.addEventListener('click', (e) => {
    e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);
    if (mediaCard.length < 5) addMedia.style.display = 'flex'
    // if (mediaCard.length === 1) delMediaBtns[0].style.display = 'none'
    // else delMediaBtns[0].style.display = 'flex';
    validatePinfoInput()
  })


  const mediaValid = document.getElementById(`mediaVerify${mediaID}`)
  const invalidMediaFeed = document.getElementById(`invalid-media${mediaID}`)

  function validateMediaInput() {
    if (mediaSelect.value === "" || mediaName.value === "" || mediaLink.value === "") warningExp(mediaValid, invalidMediaFeed, false, 'Do not leave any field empty!', 'pinfo', 'pinfo-nav-link')
    else if (!linkRegex.test(mediaLink.value)) warningExp(mediaValid, invalidMediaFeed, false, 'Invalid link format!', 'pinfo', 'pinfo-nav-link')
    else warningExp(mediaValid, invalidMediaFeed, true, '', 'pinfo', 'pinfo-nav-link')
    validatePinfoInput()
  }

  validateMediaInput()

  mediaSelect.addEventListener('change', (e) => {
    var slValue = e.target.value
    if (slValue !== 'Other') {
      mediaName.value = slValue
      mediaName.classList.add('d-none')
      mediaLink.classList.add('w-75')
      mediaLink.classList.remove('w-50')
    } else {
      mediaName.value = ""
      mediaName.classList.remove('d-none')
      mediaLink.classList.remove('w-75')
      mediaLink.classList.add('w-50')
    }
    validateMediaInput();
  })

  mediaName.addEventListener('keyup', validateMediaInput)
  mediaLink.addEventListener('keyup', validateMediaInput)

  validatePinfoInput();
})

// Verify media inputs

// Addp phone number

var phoneID = 0;
const addPhoneBtn = document.getElementById('pinfo-add-phone')
const phoneList = document.getElementById('pinfo-phone-list')
addPhoneBtn.addEventListener('click', () => {
  phoneID++;
  var newPhoneItem = document.createElement('div');
  newPhoneItem.className = 'd-flex mb-3 align-items-start gap-2 phone-card'; // Set the desired class name
  newPhoneItem.innerHTML = `
    <div class="flex-grow-1">
      <input type="tel" class="form-control pinfo-phone" id="pinfo-phone${phoneID}" placeholder="Enter phone number..." name="phone[]" required />
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback" id="pinfo-phone-feed${phoneID}">Please fill out this field.</div>
    </div>
    <button type="button" class="btn-close mt-2" aria-label="Close" id="del-phone${phoneID}"></button>
  `;

  // Append the newPhoneItem to the phoneList
  phoneList.appendChild(newPhoneItem);
  const phoneCard = document.getElementsByClassName('phone-card')
  if (phoneCard.length === 4) addPhoneBtn.style.display = 'none'

  const phoneInput = document.getElementById(`pinfo-phone${phoneID}`)
  const phoneFeeed = document.getElementById(`pinfo-phone-feed${phoneID}`)

  function validatePhoneInput() {
    var phoneInputVal = phoneInput.value;

    if (phoneInputVal.length === 0) warningExp(phoneInput, phoneFeeed, false, 'Do not leave any field empty!', 'pinfo', 'pinfo-nav-link')
    else if (phoneInputVal.length < 4) warningExp(phoneInput, phoneFeeed, false, 'Minimum 4 characters!', 'pinfo', 'pinfo-nav-link')
    else if (phoneInputVal.length > 20) warningExp(phoneInput, phoneFeeed, false, 'Maximum 20 characters!', 'pinfo', 'pinfo-nav-link')
    else if (!phoneRegex.test(phoneInputVal.trim())) warningExp(phoneInput, phoneFeeed, false, 'Invalid phone number format!', 'pinfo', 'pinfo-nav-link')
    else warningExp(phoneInput, phoneFeeed, true, '', 'pinfo', 'pinfo-nav-link')
    validatePinfoInput();
  }
  
  phoneInput.addEventListener('keyup', validatePhoneInput)
  validatePhoneInput()

  const delPhoneBtn = document.getElementById(`del-phone${phoneID}`)
  delPhoneBtn.addEventListener('click', (e) => {
    e.target.parentNode.parentNode.removeChild(e.target.parentNode)
    if (phoneCard.length < 4) addPhoneBtn.style.display = 'flex'
    validatePinfoInput();
  })
  validatePinfoInput();
})


// Add email
var emailID = 0;
const addEmailBtn = document.getElementById('pinfo-add-email')
const emailList = document.getElementById('pinfo-email-list')
addEmailBtn.addEventListener('click', () => {
  emailID++;
  var newEmailItem = document.createElement('div');
  newEmailItem.className = 'd-flex mb-3 align-items-start gap-2 email-card'; // Set the desired class name
  newEmailItem.innerHTML = `
    <div class="flex-grow-1">
      <input type="email" class="form-control pinfo-email" id="pinfo-email${emailID}" placeholder="Enter email..." name="email[]" required />
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback" id="pinfo-email-feed${emailID}">Please fill out this field.</div>
    </div>
    <button type="button" class="btn-close mt-2" aria-label="Close" id="del-email${emailID}"></button>
  `;

  // Append the newEmailItem to the emailList
  emailList.appendChild(newEmailItem);
  const emailCard = document.getElementsByClassName('email-card')
  if (emailCard.length === 4) addEmailBtn.style.display = 'none'
  
  const emailInput = document.getElementById(`pinfo-email${emailID}`)
  const emailFeeed = document.getElementById(`pinfo-email-feed${emailID}`)

  function validateEmailInput() {
    var phoneEmailVal = emailInput.value;

    if (phoneEmailVal.length === 0) warningExp(emailInput, emailFeeed, false, 'Do not leave any field empty!', 'pinfo', 'pinfo-nav-link')
    else if (phoneEmailVal.length > 255) warningExp(emailInput, emailFeeed, false, 'Maximum 255 characters!', 'pinfo', 'pinfo-nav-link')
    else if (!emailRegex.test(phoneEmailVal.trim())) warningExp(emailInput, emailFeeed, false, 'Invalid email format!', 'pinfo', 'pinfo-nav-link')
    else warningExp(emailInput, emailFeeed, true, '', 'pinfo', 'pinfo-nav-link')
    validatePinfoInput();
  }
  
  emailInput.addEventListener('keyup', validateEmailInput)
  validateEmailInput()

  const delEmailBtn = document.getElementById(`del-email${emailID}`)
  delEmailBtn.addEventListener('click', (e) => {
    e.target.parentNode.parentNode.removeChild(e.target.parentNode)
    if (emailCard.length < 4) addEmailBtn.style.display = 'flex'
    validatePinfoInput();
  })
  validatePinfoInput();
})


// Test on open
finalSubmitCheck();
// validatePinfoInput();