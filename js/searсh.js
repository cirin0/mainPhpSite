function searchTitle() {
  const input = document.getElementById("searchInput").value;
  const searchResultsDiv = document.getElementById("searchResults");
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "search.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      let results = JSON.parse(this.responseText);
      searchResultsDiv.innerHTML = "";
      if (results.length > 0) {
        results.forEach(function (item) {
          let link = document.createElement("a");
          link.href = item.url;
          link.target = "_blank";
          link.textContent = item.content + " - " + item.title;
          let div = document.createElement("li");
          div.appendChild(link);
          searchResultsDiv.appendChild(div);
        });
        searchResultsDiv.style.display = "block";
      } else {
        searchResultsDiv.style.display = "none";
      }
      if (input === "") {
        searchResultsDiv.style.display = "none";
      }
    }
  };
  xhr.send("query=" + input);
}

document.addEventListener("click", function (e) {
  if (!document.getElementById("searchResults").contains(e.target)) {
    document.getElementById("searchResults").style.display = "none";
  }
});
