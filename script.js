document.body.classList.add("theme-a");
function themeToggle() {
    document.body.classList.toggle("theme-b");
    localStorage.setItem("theme", document.body.className);
}