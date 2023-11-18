// Function to scroll to the latest message

function scrollToLatestMessage() {
  var msgContainer = document.getElementById("msg");
  msgContainer.scrollTop = msgContainer.scrollHeight;

  // Hide the scroll button after scrolling to the latest message
  toggleScrollButton(false);
}
function toggleScrollButton(visible) {
  var scrollButton = document.getElementById("scrollButton");
  if (visible) {
    scrollButton.style.display = "block";
  } else {
    scrollButton.style.display = "none";
  }
}

// Function to send a message
function send() {
  var val = document.querySelector(".text").value;
  if (val.trim() === "") {
    return; // Don't send empty messages
  }
  var elementToRemove = document.getElementById("scrollButton");
  elementToRemove.remove();
  var msgContainer = document.getElementById("msg");
  msgContainer.innerHTML +=
    '<div class="message" id="m"><span class="message-text">' +
    val +
    "</span></div>" +
    '<button onclick="scrollToLatestMessage()" class="scroll-button" id="scrollButton"><ion-icon name="arrow-down-outline"></ion-icon></button>';

  // Clear the input field
  document.querySelector(".text").value = "";

  // Scroll to the latest message
  scrollToLatestMessage();
}

// Attach the send function to the button click event
var sendButton = document.querySelector("button");
sendButton.addEventListener("click", send);

// Attach the send function to the Enter key press event in the input field
var inputField = document.querySelector(".text");
inputField.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    send();
    event.preventDefault();
  }
});
var msgContainer = document.getElementById("msg");
msgContainer.addEventListener("scroll", handleScroll);

function handleScroll() {
  // Calculate how far the user has scrolled from the bottom of the container
  var scrollPosition =
    msgContainer.scrollHeight -
    msgContainer.clientHeight -
    msgContainer.scrollTop;

  // Display the scroll button if the user has scrolled away from the latest message
  toggleScrollButton(scrollPosition > 10); // Adjust 10 to a suitable threshold
}
// Optionally, you can also scroll to the latest message when the page loads
window.onload = scrollToLatestMessage;





// Variables to store the context menu and the message being clicked
var contextMenu = document.getElementById('context-menu');
var clickedMessage = null;

// Function to handle the right-click event
function handleContextMenu(event) {
    event.preventDefault();

    // Find the closest parent message element
    clickedMessage = event.target.closest('.message');

    if (clickedMessage) {
        // Show the custom context menu
        contextMenu.style.display = 'block';

        // Position the context menu at the mouse cursor
        contextMenu.style.left = event.clientX + 'px';
        contextMenu.style.top = event.clientY + 'px';
    } else {
        // If right-clicked outside a message, show the default context menu
        contextMenu.style.display = 'none';
    }
}

// Function to remove the message when the "Remove" option is clicked
document.getElementById('remove-message').addEventListener('click', function () {
    if (clickedMessage) {
        clickedMessage.remove();
    }

    // Hide the context menu
    contextMenu.style.display = 'none';
});

// Event listener to trigger the custom context menu on right-click
document.addEventListener('contextmenu', handleContextMenu);

// Event listener to close the context menu when clicking anywhere else in the document
document.addEventListener('click', function () {
    if (contextMenu.style.display === 'block') {
        contextMenu.style.display = 'none';
    }
});
