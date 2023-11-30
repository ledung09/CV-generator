const textRegex = /^[A-Za-z\s]+$/
const textnumRegex = /^[a-zA-Z0-9\s]+$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const phoneRegex = /^[+0-9\s.-]+$/;
const addressRegex = /^[A-Za-z0-9,.\/_\-\s]+$/;
const yearRegex = /^\d{4}$/;
const linkRegex = /^(?:(?:https?|ftp):\/\/)?(?:www\.)?[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})+(?:\/\S*)?$/;
const skillRegex = /^[A-Za-z0-9 !@#$%^&*()_+{}\[\]:;<>,.?/~`|-]+$/;

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

function findObjectByName(arr, targetName) {
  return arr.find(function(obj) {
    return obj.name === targetName;
  });
}

// Check stat of pill: 1 - done ; -1 - error
function pillStat(tabID) {
  const tab = document.getElementById(tabID) 
  const inputs = tab.getElementsByTagName('input');
  for (var i=0; i<inputs.length; i++) if (inputs[i].classList.contains('is-invalid')) return -1;
  return 1; 
}

// Display proper pill stat text/image
function pillVerify(tabID, navlinkID) {
  // Remove all child
  var tabName = tabID == 'pinfo' ? "Information": tabID == 'exp' ? "Experience" :  tabID == 'edu' ? "Education" : tabID == 'ref' ? "Reference" : tabID == 'prj' ? "Project" :  tabID == 'cer' ? "Certificate" :  tabID == 'skills' ? "Skills" : "";
  const parentElement = document.getElementById(navlinkID);
  while (parentElement.firstChild) parentElement.removeChild(parentElement.firstChild);

  if (pillStat(tabID) === 1) {
    var firstChild = document.createElement('div');
    firstChild.className = 'mb-2 text-center text-primary';
    firstChild.textContent = tabName;
    parentElement.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.className = 'process-icon icon-success border-primary bg-primary d-flex justify-content-center align-items-center';
    secondChild.innerHTML = '<i class="fa-solid fa-check text-white"></i>';
    parentElement.appendChild(secondChild);
  } else {
    var firstChild = document.createElement('div');
    firstChild.className = 'mb-2 text-center text-danger';
    firstChild.textContent = tabName;
    parentElement.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.className = 'process-icon bg-white icon-danger border-danger bg-white d-flex justify-content-center align-items-center';
    secondChild.innerHTML = '<i class="fa-solid fa-exclamation text-danger"></i>';
    parentElement.appendChild(secondChild);
  }
}

function warningExp(inputitem, textitem, valid, text, tabID, tabLinkID) {
  if (valid) {
    inputitem.classList.remove("is-invalid")
    inputitem.classList.add("is-valid")
  } else {
    textitem.textContent = text;
    inputitem.classList.add("is-invalid")
    inputitem.classList.remove("is-valid")
  }
  pillVerify(tabID, tabLinkID)
}

function validatePinfoInput(event = null) {
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
  var profileImg =  pInfoProfileImg.value;

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


  if (event === null) {
    warningExp(pInfoProfileImg, invalidPinfoFeeds[7], false, 'Select a file!', 'pinfo', 'pinfo-nav-link')
    return;
  };

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





validatePinfoInput();


{/* <script>
const provinceSelect = document.getElementById("province");
const districtSelect = document.getElementById("district");
const wardSelect = document.getElementById("ward");
var data = [];
var iddd = 0;

const xhttp = new XMLHttpRequest();
// xhttp.open("GET", "https://provinces.open-api.vn/api/?depth=3", true);
xhttp.open("GET", "/data/VietNam.json", true);

xhttp.onload = function() {
  if (xhttp.status === 200) {
    data = JSON.parse(xhttp.response);
    data.forEach((prv, idx) => {
      provinceSelect.innerHTML += `<option value="${idx}_${prv.name}">${prv.name}</option>`
      iddd = idx;
    })
  } else {
    console.error("Request fail. Status: " + xhttp.status);
  }
};
xhttp.send();

function updateDistrict() {
  const prvChoice = parseInt(provinceSelect.value.split('_')[0]);
  districtSelect.innerHTML = '<option value="" disabled selected>--Select your province--</option>';
  wardSelect.innerHTML = '<option value="" disabled selected>--Select your ward--</option>';
  data[prvChoice].districts.forEach((dst, idx) => {
    districtSelect.innerHTML += `<option value="${idx}_${dst.name}">${dst.name}</option>`
  })
}

function updateWard() {
  const prvChoice = parseInt(provinceSelect.value.split('_')[0]);
  const dstChoice = parseInt(districtSelect.value.split('_')[0]);
  wardSelect.innerHTML = '<option value="" disabled selected>--Select your ward--</option>';
  data[prvChoice].districts[dstChoice].wards.forEach((wrd, idx) => {
    wardSelect.innerHTML += `<option value="${idx}_${wrd.name}">${wrd.name}</option>`
  })
}

provinceSelect.addEventListener("change", updateDistrict);
districtSelect.addEventListener("change", updateWard);
</script> */}