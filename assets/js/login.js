const loginBtn = document.getElementById("login-btn");

loginBtn.addEventListener('click', (event) => {

    event.preventDefault();
    // login inputs
    const loginForm = document.getElementById("login-form");
    const spinnerWrapper = document.querySelector(".hourglassBackground"); // Added for the spinner wrapper
    const loginEmail = document.getElementById("loginEmail").value;
    const loginPassword = document.getElementById("loginPassword").value;
    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: {
            req: "login",
            email: loginEmail,
            password: loginPassword
        },
        success: (response) => {
            const data = JSON.parse(response);
            console.log(data);
            if (data.success) {
                console.log(data.success);
                // loginForm.style.display = 'none';
                // spinnerWrapper.style.display = 'block';
                // setTimeout(() => {
                //     window.location.href = 'index.php?page=home&success';
                // }, 3000);
                window.location.href = `index.php?page=${data.success}&success=true`;
            } else if (data.error) {
                console.log(data.error);
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }

        }, error: (error) => {
            console.log(error);

        }
    })
})