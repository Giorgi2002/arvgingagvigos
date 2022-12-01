"use strict";
const box = document.querySelectorAll(".btn");
const hide = document.querySelector(".btn-alive");
let score = 0;
const txutmet = (document.querySelector(".txutmet").textContent = "/15");

for (let i = 0; i < box.length; i++) {
  if (box[i].textContent == "მკვდარი") {
    box[i].classList.remove("btn-alive");
    box[i].classList.add("btn-dead");
    score++;
    document.querySelector(".zero").textContent = score + txutmet;
  }
}
