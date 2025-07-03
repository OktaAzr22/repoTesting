// JavaScript untuk menampilkan form ketika ikon diklik
const addDataIcon = document.getElementById("addDataIcon");
const formSection = document.getElementById("formSection");

addDataIcon.addEventListener("click", () => {
  // Toggle antara menampilkan atau menyembunyikan form
  if (
    formSection.style.display === "none" ||
    formSection.style.display === ""
  ) {
    formSection.style.display = "flex"; // Menampilkan form
  } else {
    formSection.style.display = "none"; // Menyembunyikan form
  }
});
