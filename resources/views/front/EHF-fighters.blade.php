
<html lang="en">
 @include('front.layouts.head')

  @include('front.layouts.header')
   
      <!-- =================== ROSTER SECTION =================== -->
      <main class="ehf">
        <section class="page-title container">
          <h1 class="text-white">EHF Roster</h1>
          <p>Meet our athletes across all weight classes.</p>
        </section>
 {{-- Success message --}}
@if(session('success_challenge'))
  <div class="container-narrow mt-3">
    <div class="alert alert-success">
      {{ session('success_challenge') }}
    </div>
  </div>
@endif
{{-- Fighter Profile Modal --}}
{{-- Fighter Profile Modal --}}
        <section class="container-narrow wow fadeInUp" data-wow-delay="200ms">
          <!-- Controls -->
          <div class="controls" role="region" aria-label="Roster controls">
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
                placeholder="Search name or nickname…"
                autocomplete="off"
              />
            </label>

            <label class="control" aria-label="Sort fighters">
              <svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path
                  d="M3 7h14M3 12h10M3 17h6"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                />
              </svg>
              <select id="sort">
                <option value="name-asc">Name A–Z</option>
                <option value="name-desc">Name Z–A</option>
                <option value="age-asc">Age ↑</option>
                <option value="age-desc">Age ↓</option>
                <option value="weight-asc">Weight ↑</option>
                <option value="weight-desc">Weight ↓</option>
              </select>
            </label>

            <label
              class="control"
              aria-label="Weight class select (quick jump)"
            >
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

          <!-- Filter pills -->
          <div
            id="filters"
            class="filters"
            role="tablist"
            aria-label="Filter by weight class"
          ></div>
        </section>

        <section class="container-narrow wow fadeInUp" data-wow-delay="200ms">
          <div id="grid" class="fighters-grid" aria-live="polite"></div>
        </section>
      </main>
     
<div id="ehfFighterModal" class="ehf-fighter-overlay" aria-hidden="true">
  <div class="ehf-fighter-dialog" role="dialog" aria-modal="true" aria-labelledby="ehf-title">
    <button type="button" class="ehf-fighter-close" aria-label="Close">×</button>

    <div class="ehf-fighter-body">
      <div class="ehf-fighter-left">
        <img id="ehf-img" src="" alt="Fighter photo" />
      </div>

      <div class="ehf-fighter-right">
        <h2 id="ehf-title" class="mb-2 text-white"></h2>

        <div class="fm-meta mb-3">
          <span class="chip" id="ehf-division"></span>
          <span class="chip" id="ehf-country"></span>
        </div>

        <div class="fm-stats mb-3">
          <div><strong id="ehf-wins">0</strong> Wins</div>
          <div><strong id="ehf-losses">0</strong> Losses</div>
          <div><strong id="ehf-draws">0</strong> Draws</div>
        </div>

        <div class="fm-bio">
          <h5 class="bio-title">Bio</h5>
          <p id="ehf-bio" class="bio-text"></p>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- Challenge / Booking Modal --}}
<div id="challengeModal" class="ehf-modal" aria-hidden="true">
  <div class="ehf-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="challengeModalTitle">
    <button type="button" class="ehf-modal-close" data-close-modal aria-label="Close">×</button>

    <h4 id="challengeModalTitle" class="ehf-modal-title mb-2">Request a Fight</h4>
    <p class="ehf-modal-sub mb-3">
      You are requesting: <strong id="cm-fighter-name">EHF Fighter</strong>
    </p>

    <form id="challengeForm" method="POST" action="{{ route('challenge-requests.store') }}" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="ehf_fighter_id" id="cm-fighter-id">
      <input type="hidden" name="type" id="cm-type" value="challenge">

      <div class="ehf-modal-grid">
        <div class="form-group">
          <label class="form-label">Request Type</label>
          <select class="form-control" id="cm-type-select">
            <option value="challenge">Challenge</option>
            <option value="sparring">Sparring</option>
            <option value="booking">Booking</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Organization (optional)</label>
          <input class="form-control" type="text" name="org_name" placeholder="Gym / Promotion name">
        </div>

        <div class="form-group">
          <label class="form-label">Challenger Fighter Name *</label>
          <input class="form-control" type="text" name="challenger_name" required>
        </div>
        <div class="form-group">
          <label class="form-label">Challenger Age *</label>
          <input class="form-control" type="text" name="challenger_age" required>
        </div>

        <div class="form-group">
          <label class="form-label">Weight (kg)</label>
          <input class="form-control" type="number" name="challenger_weight_kg" min="0" max="500">
        </div>

        <div class="form-group">
          <label class="form-label">Weight Class</label>
          <input class="form-control" type="text" name="challenger_weight_class" placeholder="Lightweight">
        </div>

        <div class="form-group">
          <label class="form-label">Record (W-L-D)</label>
          <div class="ehf-record">
            <input class="form-control" type="number" name="record_wins" min="0" placeholder="W">
            <input class="form-control" type="number" name="record_losses" min="0" placeholder="L">
            <input class="form-control" type="number" name="record_draws" min="0" placeholder="D">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Contact Name *</label>
          <input class="form-control" type="text" name="contact_name" required>
        </div>

        <div class="form-group">
          <label class="form-label">Email *</label>
          <input class="form-control" type="email" name="email" required>
        </div>

        <div class="form-group">
          <label class="form-label">Phone</label>
          <input class="form-control" type="text" name="phone">
        </div>

        <div class="form-group">
          <label class="form-label">Country</label>
          <input class="form-control" type="text" name="country">
        </div>

        <div class="form-group">
          <label class="form-label">City</label>
          <input class="form-control" type="text" name="city">
        </div>

        <div class="form-group">
          <label class="form-label">Preferred Date From</label>
          <input class="form-control" type="date" name="preferred_date_from">
        </div>

        <div class="form-group">
          <label class="form-label">Preferred Date To</label>
          <input class="form-control" type="date" name="preferred_date_to">
        </div>

        <div class="form-group">
          <label class="form-label">Location Preference</label>
          <input class="form-control" type="text" name="location_preference" placeholder="Kabul / Dubai / ...">
        </div>

        <div class="form-group">
          <label class="form-label">Profile Link (optional)</label>
          <input class="form-control" type="url" name="profile_link" placeholder="https://instagram.com/...">
        </div>

        <div class="form-group">
          <label class="form-label">Challenger Photo (optional)</label>
          <input class="form-control" type="file" name="photo" accept="image/*">
        </div>

        <div class="form-group ehf-full">
          <label class="form-label">Message *</label>
          <textarea class="form-control" name="message" rows="4" required placeholder="Tell us about the matchup, rules, event idea..."></textarea>
        </div>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary flex-fill">Send Request</button>
        <button type="button" class="btn btn-light flex-fill" data-close-modal>Cancel</button>
      </div>
    </form>
  </div>
</div>


      <!-- FOOTER
        ================================================== -->
  @include('front.layouts.footer-js')
    <script>
      // Fighters sample data – replace with your real data or server output
       // ✅ Fighters from DB (Laravel -> JS)
  // ✅ Fighters from DB (Laravel -> JS)
  const fighters = @json($fightersForJs);

      // Helpers (scoped selectors)
      const $ehf = (sel) => document.querySelector(".ehf " + sel);
      const $$ehf = (sel) =>
        Array.from(document.querySelectorAll(".ehf " + sel));
      const byText = (v) => (v || "").toLowerCase().trim();
      const unique = (list) => Array.from(new Set(list));

      function classesFromData(d) {
        return unique(d.map((f) => f.weightClass)).sort((a, b) =>
          a.localeCompare(b)
        );
      }
      function sortData(list, mode) {
        const c = list.slice();
        switch (mode) {
          case "name-asc":
            return c.sort((a, b) => a.name.localeCompare(b.name));
          case "name-desc":
            return c.sort((a, b) => b.name.localeCompare(a.name));
          case "age-asc":
            return c.sort((a, b) => a.age - b.age);
          case "age-desc":
            return c.sort((a, b) => b.age - a.age);
          case "weight-asc":
            return c.sort((a, b) => a.weightKg - b.weightKg);
          case "weight-desc":
            return c.sort((a, b) => b.weightKg - a.weightKg);
          default:
            return c;
        }
      }
      function countryEmoji(iso2) {
        if (!iso2) return "";
        const cc = iso2.toUpperCase();
        if (!/^[A-Z]{2}$/.test(cc)) return "";
        const cps = [...cc].map((c) => 0x1f1e6 + (c.charCodeAt(0) - 65));
        return String.fromCodePoint(...cps);
      }
      function escapeHtml(s) {
        return String(s).replace(
          /[&<>"']/g,
          (m) =>
            ({
              "&": "&amp;",
              "<": "&lt;",
              ">": "&gt;",
              '"': "&quot;",
              "'": "&#39;",
            }[m])
        );
      }
      function escapeAttr(s) {
        return escapeHtml(s).replace(/`/g, "&#96;");
      }

      function iconUser() {
        return `<svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.418 0-8 2.239-8 5v1h16v-1c0-2.761-3.582-5-8-5Z" fill="currentColor"/></svg>`;
      }
      function iconTrophy() {
        return `<svg class="i" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 4h10v2a3 3 0 0 0 3 3h0a5 5 0 0 1-5 5H9A5 5 0 0 1 4 9h0a3 3 0 0 0 3-3V4Zm3 10v3H8a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2h-2v-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>`;
      }

      function fighterCard(f) {
        const emoji = countryEmoji(f.country);
        const nick = f.nickname
          ? `<p class="fighter-nick" itemprop="additionalName">${escapeHtml(
              f.nickname
            )}</p>`
          : "";
        return `
          <article class="fighter-card" itemscope itemtype="https://schema.org/Person">
            <div class="fighter-media">
              <img src="${escapeAttr(f.img)}" alt="${escapeAttr(
          f.name
        )} — ${escapeAttr(
          f.weightClass
        )}" loading="lazy" decoding="async" itemprop="image">
            </div>
            <div class="fighter-overlay">
              <h3 class="fighter-name" itemprop="name">${escapeHtml(
                f.name
              )}</h3>
              ${nick}
              <div class="fighter-meta">
                <span class="chip" title="Age">${iconUser()} ${f.age}</span>
                <span class="chip" title="Weight">${f.weightKg} kg</span>
                <span class="chip" title="Class">${escapeHtml(
                  f.weightClass
                )}</span>
                <span class="chip" title="Record">${iconTrophy()} ${escapeHtml(
          f.record
        )}</span>
                ${
                  f.country
                    ? `<span class="chip" title="Country">${emoji} ${escapeHtml(
                        f.country
                      )}</span>`
                    : ""
                }
              </div>
              <div class="fighter-actions">
              <button
  class="btn-roster btn-ghost open-fighter"
  type="button"
  data-name="${escapeAttr(f.name)}"
  data-nickname="${escapeAttr(f.nickname || "")}"
  data-weightclass="${escapeAttr(f.weightClass || "")}"
  data-weightkg="${escapeAttr(String(f.weightKg ?? ""))}"
  data-country="${escapeAttr(f.country || "")}"
  data-img="${escapeAttr(f.img || "")}"
  data-wins="${escapeAttr(String(f.wins ?? 0))}"
  data-losses="${escapeAttr(String(f.losses ?? 0))}"
  data-draws="${escapeAttr(String(f.draws ?? 0))}"
  data-bio="${escapeAttr(f.fullBio || f.shortBio || "")}"
>
  Profile
</button>


                <a class="btn-roster btn-solid open-challenge"
   href="#"
   data-id="${escapeAttr(f.id)}"
   data-name="${escapeAttr(f.name)}"
   data-type="challenge">
   Challenge
</a>

              </div>
              <meta itemprop="weight" content="${f.weightKg}">
              <meta itemprop="memberOf" content="EHF">
              <time datetime="${escapeAttr(
                f.joined
              )}" class="visually-hidden" itemprop="startDate">${escapeHtml(
          f.joined
        )}</time>
            </div>
          </article>
        `;
      }

document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.getElementById("ehfFighterModal");
  if (!overlay) return;

  const closeBtn = overlay.querySelector(".ehf-fighter-close");

  const img = overlay.querySelector("#ehf-img");
  const title = overlay.querySelector("#ehf-title");
  const division = overlay.querySelector("#ehf-division");
  const country = overlay.querySelector("#ehf-country");
  const bio = overlay.querySelector("#ehf-bio");
  const wins = overlay.querySelector("#ehf-wins");
  const losses = overlay.querySelector("#ehf-losses");
  const draws = overlay.querySelector("#ehf-draws");

  function openModal(data) {
    img.src = data.img || "";
    title.textContent = data.name || "";
    division.textContent = data.weightclass
      ? `${data.weightclass} • ${data.weightkg || ""} kg`
      : "";
    country.textContent = data.country || "";
    bio.textContent = data.bio || "";

    wins.textContent = data.wins || 0;
    losses.textContent = data.losses || 0;
    draws.textContent = data.draws || 0;

    overlay.classList.add("open");
    overlay.setAttribute("aria-hidden", "false");
    document.documentElement.style.overflow = "hidden";
  }

  function closeModal() {
    overlay.classList.remove("open");
    overlay.setAttribute("aria-hidden", "true");
    document.documentElement.style.overflow = "";
  }

  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".open-fighter");
    if (!btn) return;
    if (!btn.closest(".ehf")) return; // only EHF page buttons
    e.preventDefault();
    openModal(btn.dataset);
  });

  closeBtn.addEventListener("click", closeModal);
  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && overlay.classList.contains("open")) closeModal();
  });
});



      function renderGrid(list) {
        const grid = $ehf("#grid");
        grid.innerHTML = "";
        const frag = document.createDocumentFragment();
        list.forEach((f) => {
          const col = document.createElement("div");
          col.className = "fighter-col";
          col.innerHTML = fighterCard(f);
          frag.appendChild(col);
        });
        grid.appendChild(frag);
        if (list.length === 0) {
          grid.innerHTML = `<p style="grid-column:1/-1;color:var(--muted);">No fighters match your filters.</p>`;
        }
      }

      function mkFilterBtn(label) {
        const btn = document.createElement("button");
        btn.className = "filter-btn";
        btn.type = "button";
        btn.textContent = label;
        btn.dataset.class = label;
        btn.addEventListener("click", () => {
          $$ehf("#filters .filter-btn").forEach((b) =>
            b.classList.remove("active")
          );
          btn.classList.add("active");
          state.classFilter = label;
          update();
        });
        return btn;
      }

      function renderFilters(weightClasses) {
        const filters = $ehf("#filters");
        filters.innerHTML = "";
        const allBtn = mkFilterBtn("All");
        allBtn.classList.add("active");
        filters.appendChild(allBtn);
        weightClasses.forEach((c) => filters.appendChild(mkFilterBtn(c)));
      }

      function populateClassJump(weightClasses) {
        const sel = $ehf("#classJump");
        sel.innerHTML =
          `<option value="All">All classes</option>` +
          weightClasses
            .map(
              (c) =>
                `<option value="${escapeAttr(c)}">${escapeHtml(c)}</option>`
            )
            .join("");
      }

      // State & update
      const state = { q: "", classFilter: "All", sort: "name-asc" };

      function sortFilter(data) {
        const q = byText(state.q);
        let out = data.filter((f) => {
          const inClass =
            state.classFilter === "All" || f.weightClass === state.classFilter;
          const inSearch =
            !q || byText(f.name).includes(q) || byText(f.nickname).includes(q);
          return inClass && inSearch;
        });
        out = sortData(out, state.sort);
        return out;
      }
      function update() {
        renderGrid(sortFilter(fighters));
      }

      // Init
      (function init() {
        const weightClasses = classesFromData(fighters);
        renderFilters(weightClasses);
        populateClassJump(weightClasses);
        renderGrid(sortData(fighters, state.sort));

        $ehf("#q").addEventListener("input", (e) => {
          state.q = e.target.value;
          update();
        });
        $ehf("#sort").addEventListener("change", (e) => {
          state.sort = e.target.value;
          update();
        });
        $ehf("#classJump").addEventListener("change", (e) => {
          state.classFilter = e.target.value;
          $$ehf("#filters .filter-btn").forEach((b) =>
            b.classList.toggle("active", b.dataset.class === state.classFilter)
          );
          update();
          $ehf("#grid").scrollIntoView({ behavior: "smooth", block: "start" });
        });
      })();
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("challengeModal");
  if (!modal) return;

  const dialog = modal.querySelector(".ehf-modal-dialog");
  const closeBtns = modal.querySelectorAll("[data-close-modal]");

  const fighterNameEl = document.getElementById("cm-fighter-name");
  const fighterIdEl   = document.getElementById("cm-fighter-id");

  const typeHidden    = document.getElementById("cm-type");
  const typeSelect    = document.getElementById("cm-type-select");

  function openModal({ id, name, type }) {
    fighterNameEl.textContent = name || "EHF Fighter";
    fighterIdEl.value = id || "";
    typeHidden.value = type || "challenge";
    typeSelect.value = type || "challenge";

    modal.classList.add("open");
    modal.setAttribute("aria-hidden", "false");
    document.documentElement.style.overflow = "hidden";
  }

  function closeModal() {
    modal.classList.remove("open");
    modal.setAttribute("aria-hidden", "true");
    document.documentElement.style.overflow = "";
  }

  // open from card
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".open-challenge");
    if (!btn) return;
    e.preventDefault();
    openModal({
      id: btn.dataset.id,
      name: btn.dataset.name,
      type: btn.dataset.type || "challenge",
    });
  });

  // sync select -> hidden input
  typeSelect.addEventListener("change", function () {
    typeHidden.value = this.value;
  });

  // close buttons
  closeBtns.forEach(btn => btn.addEventListener("click", closeModal));

  // click outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) closeModal();
  });

  // esc
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.classList.contains("open")) closeModal();
  });
});
</script>

    <!-- all js include end -->
  </body>
</html>
