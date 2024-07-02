const ForgetPasswordButton = document.getElementById('ForgetPassWordButton');
const CreateAccountButton = document.getElementById('CreateAccount');
const LoginAccountButton = document.getElementById('LoginAccount');
const LogInPage = document.getElementById('LogInPage');
const RegisterPage = document.getElementById('RegisterPage');
const ForgetPassword = document.getElementById('ForgetPassword');
const GoToLogInPageButton = document.querySelectorAll('.GoToLogInPageButton');
const passwordInput = document.getElementById('exampleInputPassword1');
const toggleButton = document.getElementById('TogglePasswordBtn');
const OTpDivaya = document.getElementById('OtpDiv');
const ConfirmCreation = document.getElementById('ConfirmCreation');
 function PageLoad(){
 let state = localStorage.getItem('Register');
 if (state) {
      LogInPage.style.display = 'none';
      RegisterPage.removeAttribute('hidden');
      localStorage.removeItem('Register');
      
 }

}
PageLoad();
///OtpDiv
ConfirmCreation.addEventListener('click', function (e) {
    e.preventDefault();
    ForgetPassword.style.display = 'none';
    OtpDiv.removeAttribute('hidden');
    });
 //////////////////////////////////////////////////////////////////
///forget password
ForgetPasswordButton.addEventListener('click', function (e) {

LogInPage.style.display = 'none';
ForgetPassword.removeAttribute('hidden');
});
////////////////////////////////////////////////////////////////
//register page


        ////////////////////////////////////////////////////////////////

        ///Toggle Password Btn
        document.querySelectorAll('.TogglePasswordBtns').forEach(function(TogglePasswordBtn) {
            TogglePasswordBtn.addEventListener('click', function(e) {
              e.preventDefault();
              var passwordInput = this.previousElementSibling;
              passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
              var eyeIcon = this.querySelector('i');
              eyeIcon.classList.toggle('fa-eye');
              eyeIcon.classList.toggle('fa-eye-slash');
            });
          });

        ///Otp
        // document.addEventListener('DOMContentLoaded', function() {
        //     const codeInputs = document.querySelectorAll('.code-input');
        
        //     codeInputs.forEach((input, index) => {
        //         input.addEventListener('input', function() {
        //             if (this.value.length === 1) {
        //                 if (index < codeInputs.length - 1) {
        //                     codeInputs[index + 1].focus();
        //                 } 
        //             }
        //         });
         
        //         // Prevent inputs from exceeding 1 character
        //         input.addEventListener('keypress', function(e) {
        //             if (this.value.length >= 1) {
        //                 e.preventDefault();
        //             }
        //         });
        //     });
        // });
        //////////////////////////////////////////////////////
        CreateAccountButton.addEventListener('click', function (e) {

            LogInPage.style.display = 'none';
            RegisterPage.removeAttribute('hidden');
            RegisterPage.style.display="block" ;

            });
            LoginAccountButton.addEventListener('click', function (e) {

                RegisterPage.style.display = 'none';
                LogInPage.style.display="block" ;
                });
            ////////////////////////////////////////////////////////////////
            ///Go to loginPage
       
            document.querySelectorAll(".verify").forEach(function (element,key) {
                element.addEventListener('keyup', function (event) {
                    const key = event.key;
                    if ((key != "Backspace") && (key != "Delete")) {
                        let id = parseInt(this.getAttribute('data-id'));
                        let next = id + 1;
                        if (id < 6) {
                            document.querySelector('input[data-id="' + (next) + '"]').focus();
                        }
                    }
                });
    
                element.addEventListener('keydown', function (event) {
                    const key = event.key;
                    if ((key === "Backspace") || (key === "Delete")) {
                        this.value = '';
                        let id = parseInt(this.getAttribute('data-id'));
                        let previous = id - 1;
                        if (id > 0) {
                            document.querySelector('input[data-id="' + (previous) + '"]').focus();
                        }
                    }
                });
    
                element.addEventListener('paste', function (event) {
                    text = event.clipboardData.getData('text');
                    paste(text);
                });
            });
            function paste(text) {
                if (text) {
                    document.querySelectorAll(".verify").forEach(function (element,key) {
                        element.value = text[key];
                    });
                    document.querySelector('input[data-id="6"]').focus();
                }
            }
            GoToLogInPageButton.forEach(function(GoToLogInPageButton) {
                GoToLogInPageButton.addEventListener('click', function () {
        
                window.location.reload();
                
                })});

        
        
        
