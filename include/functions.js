function check_passwords () {
    const password = document.getElementById("password");
    const confirmed = document.getElementById("confirm-password");
    const submitButton = document.getElementById("register");
    const unmatched = document.getElementById("matching-password");
    const pattern = document.getElementById("password-pattern");
    const upperRegex = /[A-Z]/;
    const lowerRegex = /[a-z]/;
    const specialRegex = /[^\w\s]/;
    const numberRegex = /\d/;
    const lengthRegex = /^.{8,}$/;


    password.addEventListener("input", function () {
        document.getElementById("upper").checked = upperRegex.test(password.value);
        document.getElementById("lower").checked = lowerRegex.test(password.value);
        document.getElementById("special-character").checked = specialRegex.test(password.value);
        document.getElementById("number").checked = numberRegex.test(password.value);
        document.getElementById("length").checked = lengthRegex.test(password.value);
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        let allChecked = true;
        checkboxes.forEach(function(checkbox) {
            if (!checkbox.checked) {
                allChecked = false;
            }
        });
        confirmed.disabled = !allChecked;
    });


    //listen to changes in the inputs
    password.addEventListener('input', checkValues);
    confirmed.addEventListener('input', checkValues);

    function checkValues() {
        const primaryValue = password.value;
        const secondaryValue = confirmed.value;
        pattern.hidden = false;
        if (primaryValue === secondaryValue){
            confirmed.style.borderColor = 'green';
            unmatched.hidden = true;
            submitButton.disabled = false;
        } else {
            confirmed.style.borderColor = 'red';
            unmatched.hidden = false;
            submitButton.disabled = true;
        }
    }
}


// function to clear all sessions
function logout() {
    document.getElementById("logout").addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "signout.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
          window.location.href = "login.php";
          }
        };
        xhr.send();
    });
}


// function to set active link on sidebar
function setActive() {
aObj = document.getElementById('sidebar').getElementsByTagName('a');
for(i=0;i<aObj.length;i++) {
    if(document.location.href.indexOf(aObj[i].href)>=0) {
    aObj[i].className='active';
    }
}
}


  // function to send data between pages
function fillClientForm() {
    // Get the values from the first page
    const housetype = document.getElementById('housetype').value;
    const housename = document.getElementById('housename').value;
    const monthlyrent = document.getElementById('monthlyrent').value;

    // Set the values in the URL of the second page
    const url = 'addclient.php?housetype=' + encodeURIComponent(housetype) + '&housename=' + encodeURIComponent(housename) + '&monthlyrent=' + encodeURIComponent(monthlyrent);

    // Navigate to the second page
    window.location.href = url;
}


function confirm() {
    const confirmBox = document.createElement("div");
    confirmBox.id = "confirm-box";
    confirmBox.innerHTML = "Are you sure you want to vacate the tenant?<button id='confirm-yes'>Yes</button><button id='confirm-no'>No</button>";
    document.body.appendChild(confirmBox);
    const confirmYes = document.getElementById("confirm-yes");
    const confirmNo = document.getElementById("confirm-no");
    confirmYes.addEventListener("click", function() {
        document.body.removeChild(confirmBox);});
    confirmNo.addEventListener("click", function() {
        document.body.removeChild(confirmBox);
    });
}

function alert() {
    const alertBox = document.createElement("div");
    alertBox.setAttribute("class", "custom-alert");

    // add a message to the alert box
    const message = document.createElement("p");
    message.textContent = "Tenant vacated from house";
    alertBox.appendChild(message);

    // add a close button to the alert box
    const closeButton = document.createElement("button");
    closeButton.setAttribute("class", "close-button");
    closeButton.textContent = "OK";
    closeButton.addEventListener("click", function() {
      alertBox.style.display = "none";
    });
    alertBox.appendChild(closeButton);

    // add the alert box to the body of the page
    document.body.appendChild(alertBox);
}


function confBox(event) {
    const confirmBox = document.createElement("div");
    confirmBox.id = "confirm-box";
    const message = document.createElement("p");
    message.textContent = "Are you sure you want to vacate the tenant from house";
    const accept = document.createElement("button");
    accept.id = "confirm-yes";
    const deny = document.createElement("button");
    deny.id = "confirm-no";
    accept.textContent = "Confirm";
    deny.textContent = "Exit";
    confirmBox.appendChild(message);
    confirmBox.appendChild(accept);
    confirmBox.appendChild(deny);
    document.body.appendChild(confirmBox);
    const confirmYes = document.getElementById("confirm-yes");
    const confirmNo = document.getElementById("confirm-no");
    confirmYes.addEventListener("click", function() {
    document.body.removeChild(confirmBox);
    const form = event.target.closest("form");
    form.submit();
    });
    confirmNo.addEventListener("click", function() {
        document.body.removeChild(confirmBox);
    });
    return false;
}