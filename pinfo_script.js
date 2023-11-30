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

  if (country.length === 0) warningExp(pInfoCountry, invalidPinfoFeeds[4], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (!countryData.includes(country)) warningExp(pInfoCountry, invalidPinfoFeeds[4], false, 'Type/Select data from the list!', 'pinfo', 'pinfo-nav-link')

  if (countryData.includes(country)) {
    const allCity = findObjectByName(allData, country).states
    cities.innerHTML = ""
    allCity.forEach((city) => {
      cities.innerHTML += `<option value='${city.name}'>`
      cityData.push(city.name)
    })
  }

  if (city.length === 0) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (cities.getElementsByTagName('option').length === 0) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Type/Select country first!', 'pinfo', 'pinfo-nav-link')
  else if (!cityData.includes(city)) warningExp(pInfoCity, invalidPinfoFeeds[5], false, 'Type/Select data from the list!', 'pinfo', 'pinfo-nav-link')

  if (addr.length === 0) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'Do not leave empty!', 'pinfo', 'pinfo-nav-link')
  else if (addr.length > 150) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'Maximum 150 characters!', 'pinfo', 'pinfo-nav-link')
  else if (!addressRegex.test(addr.trim())) warningExp(pInfoAddress, invalidPinfoFeeds[6], false, 'No special character/number allow!', 'pinfo', 'pinfo-nav-link')

  if (profileImg.length === 0) warningExp(pInfoProfileImg, invalidPinfoFeeds[7], false, 'Select a file!', 'pinfo', 'pinfo-nav-link')
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
    console.log('there')
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



// Test on open
finalSubmitCheck();
// validatePinfoInput();