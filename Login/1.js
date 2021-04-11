function myFunction() {
  var email1 = document.getElementById('email').value;

  var emcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
  if (email1 === '') {
    document.getElementById('emailerror').innerHTML = 'Please enter email';
    document.getElementById('email').style.borderBottomColor = 'red';
    document.getElementById('email').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('email').style.backgroundSize = '20px 20px';
    document.getElementById('email').style.backgroundRepeat = 'no-repeat';
    document.getElementById('email').style.backgroundPosition = '320px';
    return false;
  } else if (emcheck.test(email1)) {
    document.getElementById('emailerror').innerHTML = '';
    document.getElementById('email').style.borderBottomColor = 'green';
    document.getElementById('email').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('email').style.backgroundSize = '20px 20px';
    document.getElementById('email').style.backgroundRepeat = 'no-repeat';
    document.getElementById('email').style.backgroundPosition = '320px';
    return true;
  } else {
    document.getElementById('emailerror').innerHTML = 'Invalid email';
    document.getElementById('email').style.borderBottomColor = 'red';
    document.getElementById('email').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('email').style.backgroundSize = '20px 20px';
    document.getElementById('email').style.backgroundRepeat = 'no-repeat';
    document.getElementById('email').style.backgroundPosition = '320px';
    return false;
  }
}
function myFunction2() {
  var firstname = document.getElementById('fname').value;

  var fncheck = /^[A-Za-z.]{3,30}$/;
  if (firstname == '') {
    document.getElementById('fnerror').innerHTML = 'Please enter first name';
    document.getElementById('fname').style.borderBottomColor = 'red';
    document.getElementById('fname').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('fname').style.backgroundSize = '20px 20px';
    document.getElementById('fname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('fname').style.backgroundPosition = '149px';
    return false;
  } else if (fncheck.test(firstname)) {
    document.getElementById('fnerror').innerHTML = '';
    document.getElementById('fname').style.borderBottomColor = 'green';
    document.getElementById('fname').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('fname').style.backgroundSize = '20px 20px';
    document.getElementById('fname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('fname').style.backgroundPosition = '149px';
    return true;
  } else {
    document.getElementById('fnerror').innerHTML = 'Only alphabets allowed';
    document.getElementById('fname').style.borderBottomColor = 'red';
    document.getElementById('fname').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('fname').style.backgroundSize = '20px 20px';
    document.getElementById('fname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('fname').style.backgroundPosition = '149px';
    return false;
  }
}
function myFunction3() {
  var lastname = document.getElementById('lname').value;

  var lncheck = /^[A-Za-z.]{3,30}$/;
  if (lastname == '') {
    document.getElementById('lnerror').innerHTML = 'Please enter last name';
    document.getElementById('lname').style.borderBottomColor = 'red';
    document.getElementById('lname').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('lname').style.backgroundSize = '20px 20px';
    document.getElementById('lname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('lname').style.backgroundPosition = '149px';
    return false;
  } else if (lncheck.test(lastname)) {
    document.getElementById('lnerror').innerHTML = '';
    document.getElementById('lname').style.borderBottomColor = 'green';
    document.getElementById('lname').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('lname').style.backgroundSize = '20px 20px';
    document.getElementById('lname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('lname').style.backgroundPosition = '149px';
    return true;
  } else {
    document.getElementById('lnerror').innerHTML = 'Only alphabets allowed';
    document.getElementById('lname').style.borderBottomColor = 'red';
    document.getElementById('lname').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('lname').style.backgroundSize = '20px 20px';
    document.getElementById('lname').style.backgroundRepeat = 'no-repeat';
    document.getElementById('lname').style.backgroundPosition = '149px';
    return false;
  }
}
function myFunction4() {
  var pass = document.getElementById('pwd').value;

  var passcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
  if (pass == '') {
    document.getElementById('paserror').innerHTML = 'Please enter password';
    document.getElementById('pwd').style.borderBottomColor = 'red';
    document.getElementById('pwd').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '320px';
    return false;
  } else if (passcheck.test(pass)) {
    document.getElementById('paserror').innerHTML = '';
    document.getElementById('pwd').style.borderBottomColor = 'green';
    document.getElementById('pwd').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '320px';
    return true;
  } else {
    document.getElementById('paserror').innerHTML =
      'Should contain Uppercase, Lowercase, Special & Number';
    document.getElementById('pwd').style.borderBottomColor = 'red';
    document.getElementById('pwd').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('pwd').style.backgroundSize = '20px 20px';
    document.getElementById('pwd').style.backgroundRepeat = 'no-repeat';
    document.getElementById('pwd').style.backgroundPosition = '320px';
    return false;
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
function myFunction10() {
  var x = document.getElementById('pwd1');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}
function myFunction5() {
  var conta = document.getElementById('phone').value;

  var contacheck = /^[789][0-9]{9}$/;
  if (conta == '') {
    document.getElementById('numerror').innerHTML =
      'Please enter contact number';
    document.getElementById('phone').style.borderBottomColor = 'red';
    document.getElementById('phone').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('phone').style.backgroundSize = '20px 20px';
    document.getElementById('phone').style.backgroundRepeat = 'no-repeat';
    document.getElementById('phone').style.backgroundPosition = '320px';
    document.getElementById('phone').style.background;
    return false;
  } else if (contacheck.test(conta)) {
    document.getElementById('numerror').innerHTML = '';
    document.getElementById('phone').style.borderBottomColor = 'green';
    document.getElementById('phone').style.backgroundImage =
      "url('correct1.jpg')";
    document.getElementById('phone').style.backgroundSize = '20px 20px';
    document.getElementById('phone').style.backgroundRepeat = 'no-repeat';
    document.getElementById('phone').style.backgroundPosition = '320px';
    return true;
  } else {
    document.getElementById('numerror').innerHTML = 'Invalid number';
    document.getElementById('phone').style.borderBottomColor = 'red';
    document.getElementById('phone').style.backgroundImage = "url('cau.jpg')";
    document.getElementById('phone').style.backgroundSize = '20px 20px';
    document.getElementById('phone').style.backgroundRepeat = 'no-repeat';

    document.getElementById('phone').style.backgroundPosition = '320px';
    return false;
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
  if(myFunction() && myFunction2() && myFunction3() && myFunction4() && myFunction5()) {
    document.getElementById('signid').disabled = false;
}
else {
    document.getElementById('signid').disabled = true;
}
}

