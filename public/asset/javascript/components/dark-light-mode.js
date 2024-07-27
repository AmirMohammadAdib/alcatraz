const checkbox = document.getElementById("checkbox");

// تابع برای ذخیره کردن حالت روز و شب در Local Storage
const saveThemeState = (isChecked) => {
  localStorage.setItem("theme", isChecked ? "dark" : "light");
};

// بررسی حالت ذخیره شده در Local Storage و تنظیم آن
const setInitialTheme = () => {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    document.body.classList.add("dark");
    checkbox.checked = true;
  } else {
    document.body.classList.remove("dark");
    checkbox.checked = false;
  }
};

// بررسی حالت ذخیره شده هنگام بارگذاری صفحه
document.addEventListener("DOMContentLoaded", setInitialTheme);

// اضافه کردن گوش دهنده به تغییرات در checkbox
checkbox.addEventListener("change", () => {
  document.body.classList.toggle("dark");
  saveThemeState(checkbox.checked);
});