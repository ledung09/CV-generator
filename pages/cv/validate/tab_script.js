const textRegex = /^[A-Za-z\s]+$/
const textnumRegex = /^[a-zA-Z0-9\s]+$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const phoneRegex = /^[+0-9\s.-]+$/;
const addressRegex = /^[A-Za-z0-9,.\/_\-\s]+$/;
const yearRegex = /^\d{4}$/;
const linkRegex = /^(?:(?:https?|ftp):\/\/)?(?:www\.)?[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})+(?:\/\S*)?$/;
const skillRegex = /^[A-Za-z0-9 !@#$%^&*()_+{}\[\]:;<>,.?/~`|-]+$/;

function finalSubmitCheck() {
  const iconSuccess = document.getElementsByClassName('icon-success');
  const iconDanger = document.getElementsByClassName('icon-danger');
  const finalSubmit = document.getElementById("final-submit")
  if (iconSuccess && iconSuccess.length > 0 && iconDanger && iconDanger.length === 0) {
    finalSubmit.classList.remove('disabled')
  } else {
    finalSubmit.classList.add('disabled')
  }
}

function findObjectByName(arr, targetName) {
  // Create a shallow copy of the array using slice
  const arrCopy = arr.slice();

  // Use find on the copied array
  return arrCopy.find(function(obj) {
    return obj.name === targetName;
  });
}


// Check stat of pill: 1 - done ; -1 - error
function pillStat(tabID) {
  const tab = document.getElementById(tabID) 
  const inputs = tab.getElementsByTagName('input');
  for (var i=0; i<inputs.length; i++) if (inputs[i].classList.contains('is-invalid')) return -1;
  
  const validContainer = tab.getElementsByClassName('valid-container');
  for (var i=0; i<validContainer.length; i++) if (validContainer[i].classList.contains('is-invalid')) return -1;
  
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
  finalSubmitCheck()
  
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

var firstClickFlag = [0, 0, 0, 0, 0, 0, 0]
const addBtnList = ['job', 'edu', 'cer', 'skills', 'prj', 'ref']
const navLinkA = document.getElementsByClassName('nav-link-tab')
