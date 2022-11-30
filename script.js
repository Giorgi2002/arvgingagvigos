"use strict";
const box = document.querySelector(".btn");
const hide = document.querySelector(".btn-alive");

if (box.textContent == "მკვდარი") {
  box.classList.remove("btn-alive");
  box.classList.add("btn-dead");
}
