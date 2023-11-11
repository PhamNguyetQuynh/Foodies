document.addEventListener("DOMContentLoaded", function () {
  const userIcon = document.querySelector("#userIcon");
  userIcon.addEventListener("click", function () {
    const userHoverBox = document.querySelector(".accountHover");
    userHoverBox.classList.toggle("active");
  });

  const toggleBtn = document.querySelector(".toggleBtn");
  toggleBtn.addEventListener("click", function () {
    const sideBar = document.querySelector(".sideBarContent");
    sideBar.classList.toggle("active");
  });
});