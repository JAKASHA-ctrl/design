// ----SCROLL----

$('document').ready(function() {
  $('a.link').click(function() {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top + 'px'
    }, {
      duration: 1000,
      easing: 'swing'
    });
    return false;
  });
});

// ----MENU----

let menuButton = document.getElementById("nav"),
    menu = document.getElementById("menu");
let menuActive = false;

function menuClick () {
  if (menuActive === false) {
    menu.style = "display: flex;"
    menuActive = true;
  } else if (menuActive === true) {
    menu.style = "display: none;"
    menuActive = false;
  }
}

menuButton.addEventListener("click", menuClick);





// ----MAIL----

const form = document.getElementById("form");
form.addEventListener("submit", formSend);

async function formSend(e) {
  e.preventDefault();

  let error = formValidate(form);

  let formData = new FormData(form);

  if (error === 0) {
    form.classList.add('_sending');
    let response = await fetch('sendmail.php', {
      method: 'POST',
      body: JSON.stringify(formData)
    });
    if (response.ok) {
      let result = await response.json();
      alert(result[0]);
      form.reset();
      form.classList.remove('_sending');
    } else {
      alert("ERROR!")
      form.classList.remove('_sending');
    }
  }
}


function formValidate (form) {
  let error = 0;
  let formReq = document.querySelectorAll("._req");

  for (let i = 0; i < formReq.length; i++) {
    const input = formReq[i];
    formRemoveError(input);

    if (input.classList.contains('_email')) {
      if (testEmail(input)) {
        formAddError(input);
        error++;
      } 
    } else {
      if (input.value === '') {
        formAddError(input);
        error++;
      }
    }
  }
  return error;
} 

function formAddError (input) {
  input.classList.add("_error");
}
function formRemoveError (input) {
  input.classList.remove("_error");
}

// email test function

function testEmail (input) {
  return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
}