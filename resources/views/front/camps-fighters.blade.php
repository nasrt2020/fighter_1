<!DOCTYPE html>
<html lang="en">
 @include('front.layouts.head')
@include('front.layouts.header')

 <!-- =================== CAMP ROSTER (no camp names shown) =================== -->
      <main class="camp">
        <section class="page-title container">
          <h1 class="text-white">Training Camp Fighters</h1>
          <p>Only image, first name, surname, age, and weight.</p>
        </section>

        <!-- Controls -->
        <section class="container-narrow wow fadeInDown" data-wow-delay="200ms">
          <div
            class="controls"
            role="region"
            aria-label="Camp fighters controls"
          >
            <label class="control" aria-label="Search fighters">
              <svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path
                  d="M21 21l-4.2-4.2M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
              <input
                id="q"
                type="search"
                placeholder="Search name…"
                autocomplete="off"
              />
            </label>

           <label class="control" aria-label="Sort fighters">
  <svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true">
    <path d="M3 7h14M3 12h10M3 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
  </svg>
  <select id="sort">
    <option value="name-asc">First name A–Z</option>
    <option value="name-desc">First name Z–A</option>
    <option value="age-asc">Age ↑</option>
    <option value="age-desc">Age ↓</option>
    <option value="weight-asc">Weight ↑</option>
    <option value="weight-desc">Weight ↓</option>
  </select>
</label>


            <label class="control" aria-label="Weight class quick jump">
              <svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path
                  d="M4 7h16M7 7v10m10-10v10M4 17h16"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
              <select id="classJump">
                <option value="All">All classes</option>
              </select>
            </label>
          </div>
        </section>

        <!-- Grid -->
        <section class="container-narrow wow fadeInUp" data-wow-delay="200ms">
          <div id="grid" class="grid" aria-live="polite"></div>
        </section>
      </main>


@include('front.layouts.footer-js')
<script>
  const FIGHTERS = @json($fightersForJs);

  const $ = (s) => document.querySelector(s);
  const byText = (v) => (v || "").toLowerCase().trim();
  const esc = (s) =>
    String(s).replace(/[&<>"']/g, (m) => ({ "&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;" }[m]));
  const esca = (s) => esc(s).replace(/`/g, "&#96;");

  function splitName(full) {
    const parts = String(full).trim().split(/\s+/);
    if (parts.length === 1) return { first: parts[0], last: "" };
    return { first: parts.slice(0, -1).join(" "), last: parts.slice(-1)[0] };
  }

  function sortData(list, mode) {
    const c = list.slice();
    switch (mode) {
      case "name-asc":
        return c.sort((a, b) => splitName(a.name).first.localeCompare(splitName(b.name).first));
      case "name-desc":
        return c.sort((a, b) => splitName(b.name).first.localeCompare(splitName(a.name).first));
      case "age-asc":
        return c.sort((a, b) => (a.age || 0) - (b.age || 0));
      case "age-desc":
        return c.sort((a, b) => (b.age || 0) - (a.age || 0));
      case "weight-asc":
        return c.sort((a, b) => (a.weightKg || 0) - (b.weightKg || 0));
      case "weight-desc":
        return c.sort((a, b) => (b.weightKg || 0) - (a.weightKg || 0));
      default:
        return c;
    }
  }

  function card(f) {
    const { first, last } = splitName(f.name);
    return `
      <article class="card">
        <div class="media">
          <img src="${esca(f.img)}" alt="${esca(f.name)}" loading="lazy" decoding="async">
        </div>
        <div class="overlay">
          <h3 class="name">${esc(first)}</h3>
          <div class="surname">${esc(last)}</div>
          <div class="meta">
            <span class="chip" title="Age">${esc(f.age)} yrs</span>
            <span class="chip" title="Weight">${esc(f.weightKg)} kg</span>
          </div>
        </div>
      </article>
    `;
  }

  const state = { q: "", sort: "name-asc" };

  function applyFilters(list) {
    const q = byText(state.q);
    let out = list.filter((f) => !q || byText(f.name).includes(q));
    return sortData(out, state.sort);
  }

  function renderGrid() {
    const grid = $("#grid");
    grid.innerHTML = "";
    const data = applyFilters(FIGHTERS);

    if (data.length === 0) {
      grid.innerHTML = `<p style="grid-column:1/-1;color:#9aa0aa">No fighters found.</p>`;
      return;
    }

    const frag = document.createDocumentFragment();
    data.forEach((f) => {
      const col = document.createElement("div");
      col.className = "col";
      col.innerHTML = card(f);
      frag.appendChild(col);
    });
    grid.appendChild(frag);
  }

  (function init() {
    renderGrid();

    $("#q").addEventListener("input", (e) => {
      state.q = e.target.value;
      renderGrid();
    });

   
  })();
</script>
