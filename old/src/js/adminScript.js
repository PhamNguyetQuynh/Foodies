document.addEventListener("DOMContentLoaded", function () {
  const userIcon = document.querySelector("#userIcon");
  userIcon.addEventListener("click", function () {
    const userHoverBox = document.querySelector(".accountHover");
    userHoverBox.classList.toggle("active");
  });

  const toggleBtn = document.querySelector(".toggleBtn");
  const sideBarContent = document.querySelector(".sideBarContent");

  toggleBtn.addEventListener("click", function () {
    sideBarContent.classList.toggle("active");
  });

  // Add a resize event listener to handle responsiveness
  window.addEventListener("resize", function () {
    if (window.innerWidth > 991) {
      sideBarContent.classList.remove("active");
    }
  });
});
