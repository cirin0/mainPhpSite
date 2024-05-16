function sortProducts() {
   const sortBy = document.getElementById("sort").value;
   const products = document.querySelector(".product");
   fetch("sort_products.php", {
      method: "POST",
      headers: {
         "Content-type": "application/x-www-form-urlencoded",
      },
      body: "sortBy=" + sortBy,
   })
      .then((response) => response.text())
      .then((data) => {
         products.innerHTML = data;
      })
      .catch((error) => console.error("Помилка:", error));
}
