
function onlyAlphabets(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        }
        else if (e) {
            var charCode = e.which;
        }
        else { return true; }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode==32))
            return true;
        else
            return false;
    }
    catch (err) {
        alert(err.Description);
    }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


function CheckSpace(event)
{
   if(event.which ==32)
   {
      event.preventDefault();
      return false;
   }
}


function InvalidMsg(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Entering an Mobile Number is necessary!');
    } else if (textbox.validity.patternMismatch) {
        textbox.setCustomValidity('Please enter a phone number which is valid!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg1(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Entering an Pin code is necessary!');
    } else if (textbox.validity.patternMismatch) {
        textbox.setCustomValidity('Please enter a pin code which is valid!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg2(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Enter a password is necessaary!');
    } else if (textbox.value.length <= '7') {
        textbox.setCustomValidity('Please enter atleast 8 charcters!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg3(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Enter a adress is necessaary!');
    } else if (textbox.value.length <= '10') {
        textbox.setCustomValidity('Please enter detailed adress!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg4(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Entering an email-id is necessary!');
    } else if (textbox.validity.typeMismatch) {
        textbox.setCustomValidity('Please enter an email address which is valid!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg5(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Enter a state is necessaary!');
    } else if (textbox.value.length <= '2') {
        textbox.setCustomValidity('Please enter a valid state!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}   

function InvalidMsg6(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Enter a Name is necessaary!');
    } else if (textbox.value.length <= '2') {
        textbox.setCustomValidity('Please enter a valid name!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg7(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('This field cannot be empty!');
    } else if (textbox.value.length <= '2') {
        textbox.setCustomValidity('Enter you experience to submit!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg8(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('This field cannot be empty!');
    } else if (textbox.value.length <= '2') {
        textbox.setCustomValidity('Please enter a subject!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg9(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('This field cannot be empty!');
    } else if (textbox.value.length <= '3') {
        textbox.setCustomValidity('Please explain about the subject!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg11(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('This field cannot be empty!');
    } else if (textbox.value.length <= '3') {
        textbox.setCustomValidity('Please enter detail reason why you cancel this order!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg12(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('This field cannot be empty!');
    } else if (textbox.value.length <= '9') {
        textbox.setCustomValidity('Please use atleast 10 characters!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg14(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Select a category!');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg15(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Please enter a Product Id!!');
    } 
     else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg16(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Please Enter Product name!');
    } else if (textbox.value.length <= '2') {
        textbox.setCustomValidity('Please enter a valid name!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg17(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Please Enter Product Details!');
    } else if (textbox.value.length <= '9') {
        textbox.setCustomValidity('Please use atleast 10 characters!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}


function InvalidMsg18(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Please Enter Product price!');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg19(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Please Enter Product offer!');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}

function InvalidMsg20(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Select a Owner type!');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}
function myFunction() {
    document.getElementById("myRadio").required = true;

  }
  function InvalidMsgps(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Entering an user-id is necessary!');
    } else if (textbox.validity.typeMismatch) {
        textbox.setCustomValidity('Please enter a  valid user id!');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}
