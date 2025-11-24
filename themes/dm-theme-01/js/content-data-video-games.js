document.addEventListener("DOMContentLoaded", function () {
  const list = document.querySelector(".dm-video-games-list");
  if (!list) return; // stop if list does not exist

  // check URL for display=all
  const params = new URLSearchParams(window.location.search);
  if (params.get("display") !== "all") return;

  // get all items
  const items = list.querySelectorAll(".dm-vg-item");

  items.forEach((item) => {
    if (item.getAttribute("display") === "false") {
      item.removeAttribute("display");
    }
  });
});
