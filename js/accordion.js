document.querySelectorAll(".animated-block").forEach((block) => {
  const hiddenEls = block.querySelectorAll(
    ".hidden-txt-subtitle, .hidden-list",
  );
  const title = block.querySelector(":scope > p");

  block.addEventListener("mouseover", () => {
    block.style.height = "230px";
    block.classList.add("is-expanded");
    title.style.transform = "scale(1.2)";
    hiddenEls.forEach((el) => {
      el.style.display = "block";
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          el.style.opacity = "1";
        });
      });
    });
  });

  block.addEventListener("mouseout", () => {
    block.style.height = "80px";
    block.classList.remove("is-expanded");
    title.style.transform = "scale(1)";
    hiddenEls.forEach((el) => {
      el.style.opacity = "0";
      el.style.display = "none";
    });
  });
});
