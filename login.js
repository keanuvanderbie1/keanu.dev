  // Client-side validation and handling form submission
  document.getElementById("loginform").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Replace with your server-side validation logic
    if (username === "your_username" && password === "your_password") {
        document.getElementById("message").textContent = "Login successful!";
        window.location.href = "https://billing.stripe.com/p/login/4gw4jr3kwg6Seze000"; // Replace with your actual URL
    } else {
        document.getElementById("message").textContent = "Invalid username or password. Please try again.";
    }
});