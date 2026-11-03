<!DOCTYPE html>
<html lang="en">
 @include('front.layouts.head')
  <body>
    @include('front.layouts.header')

    <!-- ===================== COACHES ===================== -->
    <section class="co-wrap wow fadeInUp" data-wow-delay="100ms">
      <div class="co-container">
        <header class="co-head">
          <h1 class="co-title display-26 display-sm-24">Our Coaches</h1>
          <p class="co-sub">
           
          </p>
        </header>

        <!-- Controls -->
        <div class="co-controls" role="region" aria-label="Coaches controls">
          <label class="co-ctrl" aria-label="Search">
            <svg class="co-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path
                d="M21 21l-4.2-4.2M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
              />
            </svg>
            <input id="q" type="search" placeholder="Search name…" autocomplete="off" />
          </label>

          <label class="co-ctrl" aria-label="Sort">
            <select id="sort">
              <option value="name-asc">Name A–Z</option>
              <option value="name-desc">Name Z–A</option>
              <option value="exp-desc">Experience ↓</option>
              <option value="exp-asc">Experience ↑</option>
            </select>
          </label>

          <label class="co-ctrl" aria-label="Filter by role">
            <select id="role">
              <option value="All">All roles</option>
            </select>
          </label>
        </div>

        <div id="chips" class="chip-row" aria-label="Filter by specialty"></div>
        <div id="grid" class="co-grid" aria-live="polite"></div>
      </div>
    </section>

    @include('front.layouts.footer-js')

    <script>
      // ✅ Coaches from DB (Laravel -> JS)
      const COACHES = @json($coachesForJs);

      const $ = (s) => document.querySelector(s);
      const $$ = (s) => Array.from(document.querySelectorAll(s));
      const esc = (s) =>
        String(s).replace(/[&<>"']/g, (m) => ({ "&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;" }[m]));
      const esca = (s) => esc(s).replace(/`/g, "&#96;");

      function populateFilters() {
        const roles = Array.from(new Set(COACHES.map((c) => c.role || "Unknown"))).sort(
          (a, b) => a.localeCompare(b)
        );

        $("#role").innerHTML =
          `<option value="All">All roles</option>` +
          roles.map((r) => `<option value="${esca(r)}">${esc(r)}</option>`).join("");
      }

      function render() {
        const q = ($("#q").value || "").toLowerCase().trim();
        const role = $("#role").value;
        const sort = $("#sort").value;

        let data = COACHES.filter((c) => {
          const name = (c.name || "").toLowerCase();
          const matchesQ = !q || name.includes(q);
          const matchesRole = role === "All" || (c.role || "Unknown") === role;
          return matchesQ && matchesRole;
        });

        data.sort((a, b) => {
          if (sort === "name-asc") return (a.name || "").localeCompare(b.name || "");
          if (sort === "name-desc") return (b.name || "").localeCompare(a.name || "");
          if (sort === "exp-asc") return (a.experience || 0) - (b.experience || 0);
          if (sort === "exp-desc") return (b.experience || 0) - (a.experience || 0);
          return 0;
        });

        const grid = $("#grid");
        grid.innerHTML =
          data.map((c) => coachCard(c)).join("") ||
          `<p style="grid-column:1/-1; color:#6a7286; text-align:center;">No coaches match the filters.</p>`;

        $$(".js-quick").forEach((btn) => {
          btn.addEventListener("click", () => {
            const id = btn.getAttribute("data-id");
            const coach = COACHES.find((c) => String(c.id) === String(id));
            openModal(coach);
          });
        });
      }

      function coachCard(c) {
        return `
          <div class="co-col">
            <article class="coach" itemscope itemtype="https://schema.org/Person">
              <div class="c-media">
                <img src="${esca(c.img || "")}" alt="${esca(c.name || "")}" itemprop="image" loading="lazy" decoding="async">
                <span class="badge-role" itemprop="jobTitle">${esc(c.role || "Coach")}</span>
              </div>
              <div class="c-body">
                <div>
                  <h3 class="text-white c-name" itemprop="name">${esc(c.name || "")}</h3>
                  <p class="c-sub soft">Experience: <strong>${esc(c.experience || 0)} yrs</strong></p>
                </div>
                <div class="c-actions">
                  <button class="ghost js-quick" data-id="${esca(c.id)}" aria-label="Quick view ${esca(c.name || "")}">Quick View</button>
                  <span class="soft">&nbsp;</span>
                </div>
              </div>
            </article>
          </div>
        `;
      }

    function openModal(coach) {
  if (!coach) return;

  const overlay = document.createElement("div");
  overlay.className = "coach-modal-overlay open";
  overlay.innerHTML = `
    <div class="coach-modal-card" role="dialog" aria-modal="true" aria-label="${esca(coach.name || "")} details">
      <button class="coach-modal-close" type="button" aria-label="Close">&times;</button>

      <div class="coach-modal-content">
        <div class="coach-modal-media">
          <img src="${esca(coach.img || "")}" alt="${esca(coach.name || "")}">
        </div>

        <div class="coach-modal-body">
          <h3 class="coach-modal-title text-white">${esc(coach.name || "")}</h3>
          <div class="coach-modal-role">
            ${esc(coach.role || "Coach")} • ${esc(coach.experience || 0)} yrs experience
          </div>

          <div class="coach-modal-grid">
            <div class="kv">
              <small>Primary Specialty</small>
              <strong>${esc(coach.primary_specialty || "—")}</strong>
            </div>
            <div class="kv">
              <small>Other Specialties</small>
              <strong>${esc(coach.other_specialties || "—")}</strong>
            </div>
          </div>

          <div class="coach-modal-bio">
            ${esc(coach.bio || "")}
          </div>

          <div class="coach-modal-footer">
            <button class="btn btn-secondary coach-close-btn" type="button">Close</button>
            ${
              coach.whatsapp
                ? `<a href="https://wa.me/${esca(coach.whatsapp)}" target="_blank" class="btn btn-primary">Contact</a>`
                : `<span class="text-muted">No WhatsApp</span>`
            }
          </div>
        </div>
      </div>
    </div>
  `;

  document.body.appendChild(overlay);
  document.documentElement.style.overflow = "hidden";

  function close() {
    overlay.remove();
    document.documentElement.style.overflow = "";
    document.removeEventListener("keydown", onEsc);
  }

  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) close();
  });
  overlay.querySelector(".coach-modal-close")?.addEventListener("click", close);
  overlay.querySelector(".coach-close-btn")?.addEventListener("click", close);

  function onEsc(e) {
    if (e.key === "Escape") close();
  }
  document.addEventListener("keydown", onEsc);
}

      populateFilters();
      render();
      $("#q").addEventListener("input", render);
      $("#role").addEventListener("change", render);
      $("#sort").addEventListener("change", render);
    </script>
  </body>
</html>
