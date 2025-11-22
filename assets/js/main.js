document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".mm-burger");
  const nav = document.querySelector(".mm-main-nav");

  if (!burger || !nav) return;

  // === BURGER - DESCHIDE / ÎNCHIDE MENIUL PRINCIPAL ===
  burger.addEventListener("click", function () {
    const isOpen = nav.classList.toggle("is-open");
    burger.classList.toggle("is-active", isOpen);
    burger.setAttribute("aria-expanded", isOpen ? "true" : "false");
    document.body.classList.toggle("mm-menu-open", isOpen);
  });

  // === SUBMENIURI - BUTON CU SĂGEATĂ (DOAR PE MOBIL) ===
  const itemsWithChildren = nav.querySelectorAll(".menu-item-has-children");

  itemsWithChildren.forEach(function (item) {
    const link = item.querySelector("a");
    const submenu = item.querySelector(".sub-menu");

    if (!link || !submenu) return;

    // Cream butonul de toggling (săgeata)
    const toggleBtn = document.createElement("button");
    toggleBtn.type = "button";
    toggleBtn.className = "mm-sub-toggle";
    toggleBtn.setAttribute("aria-expanded", "false");
    toggleBtn.innerHTML = "&#8250;"; // > stilizat

    // Îl punem după link
    link.after(toggleBtn);

    // La click pe săgeată, deschidem / închidem submeniul
    toggleBtn.addEventListener("click", function (e) {
      e.preventDefault();
      const isOpen = item.classList.toggle("is-open");
      toggleBtn.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
  });
});
