function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
function add() {
  let product = document.getElementById("product-form");
  product.style.display = "block"; // Add the list item to the "product" element
}

let p = document.getElementById("name").textContent;
var modal = document.getElementById("myModal");

var btn = document.getElementById("btn");

// When the user clicks the button, open the modal
btn.onclick = function () {
  modal.style.display = "flex";
  let product = document.getElementById("product-form");
  product.style.display = "none"; // Add the list item to the "product" element
  setTimeout(function () {
    modal.style.display = "none";
  }, 1000);
};
// Get the button that opens the modal

//  document.addEventListener("DOMContentLoaded", function () {
//    const loader = document.getElementById("loader");
//    const content = document.querySelector(".content");

//    // Show the loader
//    content.style.visibility = "hidden";
//    loader.style.visibility = "vsiible";

//    // Set a timeout to hide the loader and show the content after 10 seconds
//    setTimeout(function () {
//      loader.style.display = "none";
//      content.style.visibility = "visible";
//    }, 5000); // 10 seconds in milliseconds
//  });
