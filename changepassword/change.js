function myFunction4() {
  var pass = document.getElementById('pwd').value;

  var passcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,30}$/;
  if (pass == '') {
    document.getElementById('paserror').innerHTML = 'Please enter new password';
    document.getElementById('pwd').style.borderBottomColor = 'red';
    document.getElementById('pwd').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '420px';
    return false;
  } else if (passcheck.test(pass)) {
    document.getElementById('paserror').innerHTML = '';
    document.getElementById('pwd').style.borderBottomColor = 'green';
    document.getElementById('pwd').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '420px';
    return true;
  } else {
    document.getElementById('paserror').innerHTML =
      'Should contain Uppercase, Lowercase, Special & Number';
    document.getElementById('pwd').style.borderBottomColor = 'red';
    document.getElementById('pwd').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '420px';
    return false;
  }
}

function myFunction() {
  var pass = document.getElementById('currpassword').value;

  
  if (pass === '') {
    document.getElementById('cpaserror').innerHTML = 'Please enter current password';
    document.getElementById('currpassword').style.borderBottomColor = 'red';
    document.getElementById('currpassword').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('currpassword').style.backgroundSize = '20px 20px';
    document.getElementById('currpassword').style.backgroundRepeat = 'no-repeat';
    document.getElementById('currpassword').style.backgroundPosition = '420px';
    return false;
  }else {
    document.getElementById('cpaserror').innerHTML ='';
    document.getElementById('currpassword').style.borderBottomColor = 'green';
    document.getElementById('currpassword').style.backgroundImage = "url('correct1.jpg')";
    document.getElementById('currpassword').style.backgroundSize = '20px 20px';
    document.getElementById('currpassword').style.backgroundRepeat = 'no-repeat';
    document.getElementById('currpassword').style.backgroundPosition = '420px';
    return true;
  }
}
function myFunction7() {
  var x = document.getElementById('pwd');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}
function myFunction9() {
  var x = document.getElementById('myDIV');
  if (x.style.display === 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
    document.getElementById('myDIV1').style.display = 'block';
  }
}


function myFunction0() {
  
  var x = document.getElementById('myDIV1');
  if (x.style.display === 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
    document.getElementById('myDIV').style.display = 'block';
  }

}
function myFunction1(){
  if(myFunction() && myFunction4()) {
    document.getElementById('signid').disabled = false;
}
else {
    document.getElementById('signid').disabled = true;
}
}

