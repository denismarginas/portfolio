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

document.addEventListener("DOMContentLoaded", function () {
  const list = document.querySelector("#dm-video-games-list");
  list.querySelectorAll(".dm-vg-item").forEach((i) => {
    i.dataset.originalDisplay = i.getAttribute("display") || "";
  });

  if (!list) return;
  const jsonTag = document.querySelector("#dm-video-games-data");
  if (!jsonTag) return;
  let src = jsonTag.getAttribute("src");
  if (!src) return;

  const origin = window.location.origin;
  const path = window.location.pathname;
  const basePath = path.substring(0, path.lastIndexOf("/") + 1);

  if (!src.startsWith("http")) {
    src = origin + basePath + src.replace(/^\/+/, "");
  }

  console.log(src);
  fetch(src)
    .then((r) => r.json())
    .then((data) => {
      const container = document.createElement("div");
      container.id = "dm-video-games-filters";
      list.parentNode.insertBefore(container, list);

      const nameSort = document.createElement("select");
      nameSort.innerHTML = `<option value="">Name Sort</option><option value="az">A → Z</option><option value="za">Z → A</option>`;
      const rank = document.createElement("select");
      rank.innerHTML = `<option value="">Rank</option>${Array.from(
        { length: 10 },
        (_, i) => `<option value="${i + 1}">${i + 1}</option>`
      ).join("")}`;
      const tagsSet = new Set();
      data.forEach((x) =>
        x.tags.split(",").forEach((t) => tagsSet.add(t.trim()))
      );
      const tags = document.createElement("select");
      tags.innerHTML =
        `<option value="">Tags</option>` +
        [...tagsSet].map((t) => `<option value="${t}">${t}</option>`).join("");
      const play = document.createElement("select");
      play.innerHTML = `<option value="">Playtime</option><option value="2">2h+</option><option value="10">10h+</option><option value="50">50h+</option><option value="100">100h+</option><option value="500">500h+</option>`;
      const display = document.createElement("select");
      display.innerHTML = `<option value="">Display</option><option value="default">Default</option><option value="all">All</option>`;
      container.append(nameSort, rank, tags, play, display);

      const applyDisplay = () => {
        const items = list.querySelectorAll(".dm-vg-item");
        if (display.value === "all") {
          items.forEach((i) => {
            if (i.getAttribute("display") === "false")
              i.removeAttribute("display");
          });
        } else if (display.value === "default") {
          items.forEach((i) => {
            if (i.dataset.originalDisplay === "false")
              i.setAttribute("display", "false");
          });
        } else {
          // no action needed for empty/default selection
        }
      };

      const filter = () => {
        const items = [...list.querySelectorAll(".dm-vg-item")];
        items.forEach((i) => (i.style.display = ""));
        const ns = nameSort.value;
        const rk = rank.value;
        const tg = tags.value;
        const pt = play.value;

        let arr = [...items];

        if (ns === "az")
          arr.sort((a, b) =>
            a
              .querySelector(".name")
              .textContent.trim()
              .localeCompare(b.querySelector(".name").textContent.trim())
          );
        if (ns === "za")
          arr.sort((a, b) =>
            b
              .querySelector(".name")
              .textContent.trim()
              .localeCompare(a.querySelector(".name").textContent.trim())
          );

        if (rk)
          arr = arr.filter(
            (i) => i.querySelector(".rank span").textContent.trim() === rk
          );

        if (tg)
          arr = arr.filter((i) => {
            const ul = i.querySelector(".tags");
            if (!ul) return false;
            return [...ul.querySelectorAll("li")].some(
              (x) => x.textContent.trim() === tg
            );
          });

        if (pt)
          arr = arr.filter((i) => {
            const txt = i.querySelector(".playtime span");
            if (!txt) return false;
            const val = parseInt(txt.textContent);
            return val >= parseInt(pt);
          });

        arr.forEach((i) => {
          list.appendChild(i);
          i.style.display = "";
        });
        items.forEach((i) => {
          if (!arr.includes(i)) i.style.display = "none";
        });

        applyDisplay();
      };

      nameSort.onchange = filter;
      rank.onchange = filter;
      tags.onchange = filter;
      play.onchange = filter;
      display.onchange = filter;
    })
    .catch((e) => console.log("JSON Error:", e));
});
