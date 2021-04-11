$(document).ready(function() {
  $("#flip").hover(
      function() {
          $('#panel').stop(true, true).slideDown('medium');
          var x = document.getElementById('ba');
          var y = document.getElementById('ab')
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            y.style.display='none';
          } else {
          x.style.display = 'none';
          document.getElementById('ab').style.display = 'inline';
          document.getElementById('flip').style.color='blue';
          }
      },
      function() {
          $('#panel').stop(true, true).slideUp('medium');
          var x = document.getElementById('ba');
          var y = document.getElementById('ab');
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            x.style.color='black';
            y.style.display = 'none';
            document.getElementById('flip').style.color='black';
          } else {
          x.style.display = 'none';
          document.getElementById('ba').style.display = 'inline';
          }
      }
  );
});
$(document).ready(function() {
  $("#flip1").hover(
      function() {
          $('#panel1').stop(true, true).slideDown('medium');
          var x = document.getElementById('ba1');
          var y = document.getElementById('ab1')
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            y.style.display='none';
          } else {
          x.style.display = 'none';
          document.getElementById('ab1').style.display = 'inline';
          document.getElementById('flip1').style.color='blue';
          }
      },
      function() {
          $('#panel1').stop(true, true).slideUp('medium');
          var x = document.getElementById('ba1');
          var y = document.getElementById('ab1');
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            x.style.color='black';
            y.style.display = 'none';
            document.getElementById('flip1').style.color='black';
          } else {
          x.style.display = 'none';
          document.getElementById('ba1').style.display = 'inline';
          }
      }
  );
});
$(document).ready(function() {
  $("#flip2").hover(
      function() {
          $('#panel2').stop(true, true).slideDown('medium');
          var x = document.getElementById('ba2');
          var y = document.getElementById('ab2')
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            y.style.display='none';
          } else {
          x.style.display = 'none';
          document.getElementById('ab2').style.display = 'inline';
          document.getElementById('flip2').style.color='blue';
          }
      },
      function() {
          $('#panel2').stop(true, true).slideUp('medium');
          var x = document.getElementById('ba2');
          var y = document.getElementById('ab2');
          if (x.style.display === 'none') {
            x.style.display = 'inline';
            x.style.color='#black';
            y.style.display = 'none';
            document.getElementById('flip2').style.color='black';
          } else {
          x.style.display = 'none';
          document.getElementById('ba2').style.display = 'inline';
          }
      }
  );
});

