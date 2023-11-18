// GET request
fetch("http://192.168.0.111/TBS/api/api.php") // Replace with correct URL
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.text();
  })
  .then((data) => {
    console.log("GET request:", data); // Output: Hello, World
  })
  .catch((error) => {
    console.error(
      "There has been a problem with your GET fetch operation:",
      error
    );
  });

// POST request
const dataToSend = {
  message: "Hello, PHP! This is a POST request.",
};

fetch("http://192.168.0.111/TBS/api/api.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json", // Specifying the content type
  },
  body: JSON.stringify(dataToSend), // Sending data as JSON
})
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.text();
  })
  .then((data) => {
    console.log("POST request:", data); // Output: Received: Hello, PHP! This is a POST request.
  })
  .catch((error) => {
    console.error(
      "There has been a problem with your POST fetch operation:",
      error
    );
  });
