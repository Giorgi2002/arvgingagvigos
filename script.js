"use strict";
const box = document.querySelectorAll(".btn");
const hide = document.querySelectorAll(".btn-alive");

if (box.textContent == "მკვდარი") {
  box.classList.remove("btn-alive");
  box.classList.add("btn-dead");
}
