document.body.classList.add("theme-a");
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    document.body.classList.remove("theme-a", "theme-b");
    document.body.classList.add(savedTheme);
}
function themeToggle() {
    if (document.body.classList.contains("theme-a")) {
        document.body.classList.remove("theme-a");
        document.body.classList.add("theme-b");
        localStorage.setItem("theme", "theme-b");
    } else {
        document.body.classList.remove("theme-b");
        document.body.classList.add("theme-a");
        localStorage.setItem("theme", "theme-a");
    }}