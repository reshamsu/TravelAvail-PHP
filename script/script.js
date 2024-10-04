// Get references to the modal and buttons
var loginModal = document.getElementById("loginModal");
var loginButton = document.getElementById("loginButton");
var confirmModal = document.getElementById("confirmModal");
var cancelButton = document.getElementById("cancelButton");
var editprofileModal = document.getElementById("editprofileModal");
var editprofileButton = document.getElementById("editprofileButton");
var edituserModal = document.getElementById("edituserModal");
var edituserButton = document.getElementById("edituserButton");
var addbookingModal = document.getElementById("addbookingModal");
var addbookingButton = document.getElementById("addbookingButton");
var closeButton = document.getElementById("closeButton");

const videoPlayer = document.getElementById("video-player");
const videoSources = [
  "assets/video1.mp4",
  "assets/video2.mp4",
  "assets/video3.mp4",
  "assets/video4.mp4",
  "assets/video5.mp4",
  "assets/video6.mp4",
  "assets/video7.mp4",
  "assets/video8.mp4",
  "assets/video9.mp4",
  "assets/video10.mp4",
  "assets/video11.mp4",
];

let currentVideoIndex = 0;

function playNextVideo() {
  currentVideoIndex++;

  if (currentVideoIndex >= videoSources.length) {
    currentVideoIndex = 0;
  }

  videoPlayer.src = videoSources[currentVideoIndex];
  videoPlayer.play();
}

setInterval(playNextVideo, 11000);

// Show the login modal when the button is clicked
if (loginButton && loginModal) {
  loginButton.addEventListener("click", function () {
    loginModal.style.display = "flex";
  });
}

if (cancelButton && confirmModal) {
  cancelButton.addEventListener("click", function () {
    confirmModal.style.display = "flex";
  });
}

if (editprofileButton && editprofileModal) {
  editprofileButton.addEventListener("click", function () {
    editprofileModal.style.display = "flex";
  });
}

if (edituserButton && edituserModal) {
  edituserButton.addEventListener("click", function () {
    edituserModal.style.display = "flex";
  });
}

if (addbookingButton && addbookingModal) {
  addbookingButton.addEventListener("click", function () {
    addbookingModal.style.display = "flex";
  });
}

// Close the modal when the close button is clicked
if (closeButton && loginModal) {
  closeButton.addEventListener("click", function () {
    loginModal.style.display = "none";
  });
}

if (closeButton && confirmModal) {
  closeButton.addEventListener("click", function () {
    cofirmModal.style.display = "none";
  });
}

if (closeButton && editprofileModal) {
  closeButton.addEventListener("click", function () {
    editprofileModal.style.display = "none";
  });
}

// Close the modal if the user clicks outside of it
window.addEventListener("click", function (event) {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  }
});

window.addEventListener("click", function (event) {
  if (event.target == confirmModal) {
    confirmModal.style.display = "none";
  }
});

window.addEventListener("click", function (event) {
  if (event.target == editprofileModal) {
    editprofileModal.style.display = "none";
  }
});

window.addEventListener("click", function (event) {
  if (event.target == edituserModal) {
    edituserModal.style.display = "none";
  }
});

window.addEventListener("click", function (event) {
  if (event.target == addbookingModal) {
    addbookingModal.style.display = "none";
  }
});

let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");

if (menu && navbar) {
  window.onscroll = () => {
    menu.classList.remove("bi-x-lg");
    navbar.classList.remove("active");
  };
}

if (menu) {
  menu.addEventListener("click", () => {
    menu.classList.toggle("bi-x-lg");
    if (navbar) {
      navbar.classList.toggle("active");
    }
  });
}

// Note: You need to define searchBtn, searchBar, and loginForm for the following code to work
searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  if (searchBar) {
    searchBar.classList.toggle("active");
  }
  // loginForm.classList.toggle("active"); // Uncomment this line if loginForm is defined
});
