"use strict";
const box = document.querySelectorAll(".btn");
const hide = document.querySelector(".btn-alive");

for (let i = 0; i < box.length; i++) {
  if (box[i].textContent == "მკვდარი") {
    box[i].classList.remove("btn-alive");
    box[i].classList.add("btn-dead");
  }
}
