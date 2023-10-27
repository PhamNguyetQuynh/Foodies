document.addEventListener("DOMContentLoaded", function () {
  const userIcon = document.querySelector("#userIcon");
  const userHoverBox = document.querySelector(".accountHover");

  userIcon.addEventListener("click", function () {
    userHoverBox.classList.toggle("active");
  });
});
// document
//   .getElementById("loginForm")
//   .addEventListener("submit", function (event) {
//     event.preventDefault(); // Prevent the default form submission

//     // Perform login validation here (e.g., check username and password)

//     // If login is successful, redirect to the dashboard page
//     if (loginIsSuccessful) {
//       window.location.href = "../adminPanel/adminDashboard/dashboard.php";
//     }
//   });
