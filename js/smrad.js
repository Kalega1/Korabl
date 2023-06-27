const tooltip = document.querySelector(".tooltip");
const religion = document.querySelectorAll(".religion");
const popupBg = document.querySelector(".info_bg");
const popup = document.querySelector(".info");



religion.forEach((religion) => {
  religion.addEventListener("click", function () {
    popup.querySelector(".info_photo").setAttribute("src", this.dataset.photo);
    popup.querySelector(".info_title").innerText = this.dataset.title;
    popup.querySelector(".info_text").innerText = this.dataset.description;
    if (this.getAttribute("data-has-link") === "true") {
      popup.querySelector(".info_link").setAttribute("href", this.dataset.link);
      popup.querySelector(".info_link").style.display = "block";
    } else {
      popup.querySelector(".info_link").style.display = "none";
    }
    popupBg.classList.add("active");
  });
});


  

document.addEventListener("click", (e) => {
  if (e.target === popupBg) {
    popupBg.classList.remove("active");
  }
});
