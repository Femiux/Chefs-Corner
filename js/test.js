document.querySelectorAll('.eye-icon').forEach(eyeIcon => {
  eyeIcon.addEventListener('click', () => {
      let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll('.password, .cpassword');

      pwFields.forEach(password => {
          if (password.type === 'password') {
              password.type = 'text';
              eyeIcon.classList.replace('bx-hide', 'bx-show');
              return;
          }
          password.type = 'password';
          eyeIcon.classList.replace('bx-show', 'bx-hide');
      });
  });
});





links.forEach(link => {
link.addEventListener("click", e => {
 e.preventDefault(); //preventing form submit
 forms.classList.toggle("show-signup");
})
})

const tabs = document.querySelectorAll('.nav-tabs a');
const tabPanes = document.querySelectorAll('.tab-pane');

tabs.forEach(tab => {
    tab.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = tab.getAttribute('href').substring(1);
        tabs.forEach(t => t.parentElement.classList.remove('active'));
        tab.parentElement.classList.add('active');
        tabPanes.forEach(pane => pane.classList.remove('active'));
        document.getElementById(targetId).classList.add('active');
    });
});



const toggle = document.querySelector(".toggle"),
  input = document.querySelector(".password");
toggle.addEventListener("click", () => {
  if (input.type === "password") {
    input.type = "text";
    toggle.classList.replace("fa-eye-slash", "fa-eye");
  } else {
    input.type = "password";
  }
})
