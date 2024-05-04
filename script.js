function loadPage() {
  var selectedOption = document.getElementById("Exam").value;

  var contentSection = document.getElementById("form");
  // contentSection.innerHTML = "Loading...";

  // Fetch the selected page
  fetch(selectedOption)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      contentSection.innerHTML = data;
    });
  // .catch((error) => {
  //   console.error("Error loading page:", error);
  //   contentSection.innerHTML = "Error loading page. Please try again.";
  // });

  // Initial page load
  loadPage();
}

const handleClick = () => {
  let value = document.getElementById("post");
  value.classList.remove("hidden");
};

const handleLogout = () => {
  window.location.href = "top.html";
};
