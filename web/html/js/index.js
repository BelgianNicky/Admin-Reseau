"use strict";

function selected(el) {
  $("#dropdownMenu2").text(el.innerText);
  $("#fieldName").attr("value", el.innerText);
}
