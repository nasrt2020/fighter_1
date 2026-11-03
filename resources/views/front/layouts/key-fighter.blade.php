  <section
        class="pt-1-6 pt-lg-14 cover-background" 
        data-background="Front/img/content/map-bg.jpg"
      >
        <div class="container" >
          <div class="section-heading">
            <span
              class="d-block display-22 display-md-21 display-lg-20 alt-font wow text-animation text-uppercase"
              data-in-effect="fadeInRight"
              data-i18n="fighters.sectionLabel"
            >
              our causes
            </span>
            <h2 data-i18n="fighters.sectionTitle">Popular causes</h2>
          </div>

       <div class="row mt-n1-9" >
  @foreach ($fighters as $fighter)
    <div class="col-md-6 col-lg-4 mt-1-9 wow fadeIn" data-wow-delay="200ms" >
      <div class="card card-style1 border-color-extra-light-gray" >
        
      <img
          src="{{ asset('storage/' . $fighter->photo_path) }}"
          class="card-img-top "
          alt="{{ $fighter->name }}"
        />

        <div class="card-body px-1-6 px-sm-1-9 pb-1-9 pt-2-4 position-relative">
          <a href="#!" class="card-btn yellow">
            {{ $fighter->style ?? 'MMA' }}
          </a>

          <p>{{ $fighter->name }}</p>

    

<p class="mb-1-9">
    {{ $fighter->bio ? Str::limit($fighter->bio, 80) : 'EHF fighter' }}
</p>

          <div class="fighter-stats text-white text-center d-flex">
           <div class="flex-fill py-3 border-end border-light">
    <div
        class="stat-number1 counter text-success"
        data-count="{{ $fighter->wins ?? 0 }}"
        data-plus="{{ ($fighter->wins ?? 0) > 0 ? 'true' : 'false' }}"
    >
    {{ ($fighter->wins ?? 0) > 0 ? $fighter->wins.'+' : '0' }}
    </div>

    <div class="stat-label">Wins</div>
</div>

            <div class="flex-fill py-3 border-end border-light">
              <div
                class="stat-number1 counter text-danger"
                data-count="{{ $fighter->losses ?? 0 }}"
              >
                {{ $fighter->losses ?? 0 }}
              </div>
              <div class="stat-label">Losses</div>
            </div>
            <div class="flex-fill py-3">
              <div
                class="stat-number1 counter text-warning"
                data-count="{{ $fighter->draws ?? 0 }}"
              >
                {{ $fighter->draws ?? 0 }}
              </div>
              <div class="stat-label">Draws</div>
            </div>
          </div>

          <a
            href="#!"
            class="butn-read open-fighter"
            data-name="{{ $fighter->name }}"
            data-img="{{ asset('storage/' . $fighter->photo_path) }}"
            data-division="{{ $fighter->division ?? '' }}"
            data-stance="{{ $fighter->stance ?? '' }}"
            data-wins="{{ $fighter->wins ?? 0 }}"
            data-losses="{{ $fighter->losses ?? 0 }}"
            data-draws="{{ $fighter->draws ?? 0 }}"
            data-bio="{{ $fighter->bio ?? '' }}"
          >
            <span>View Profile</span>
          </a>
        </div>

        <div
          class="d-flex justify-content-between py-3 px-1-6 px-sm-1-9 bg-white card-footer"
        >
          <p class="mb-0">
            <label class="mb-0 font-weight-700">Division:</label>
            <span class="font-weight-700">{{ $fighter->division ?? '-' }}</span>
          </p>
          <p class="mb-0">
            <label class="mb-0 font-weight-700">Stance:</label>
            <span class="font-weight-700">{{ $fighter->stance ?? '-' }}</span>
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>

        </div>
      </section>

      <!-- ===== Fighter Modal HTML (paste once) ===== -->
      <div id="fighterModal" class="fighter-modal-overlay" aria-hidden="true">
        <div
          class="fighter-modal"
          role="dialog"
          aria-modal="true"
          aria-labelledby="fighterModalTitle"
        >
          <button class="fighter-modal-close" aria-label="Close">
            &times;
          </button>

          <div class="fighter-modal-content">
            <div class="fighter-modal-media">
              <img id="fm-img" src="" alt="Fighter image" />
            </div>

            <div class="fighter-modal-body">
              <!-- Name is set dynamically, no translation attribute -->
              <h3 id="fighterModalTitle" class="fm-name text-white"></h3>

              <div class="fm-meta">
                <div>
                  <strong data-i18n="modal.divisionLabel">Division:</strong>
                  <span id="fm-division"></span>
                </div>
                <div>
                  <strong data-i18n="modal.stanceLabel">Stance:</strong>
                  <span id="fm-stance"></span>
                </div>
              </div>

              <!-- Bio comes from JS/dataset, leave as-is -->
              <p id="fm-bio" class="fm-bio"></p>

              <div class="fm-stats">
                <div class="fm-stat">
                  <div class="fm-number" id="fm-wins">0</div>
                  <div class="fm-label" data-i18n="stats.wins">Wins</div>
                </div>
                <div class="fm-stat">
                  <div class="fm-number" id="fm-losses">0</div>
                  <div class="fm-label" data-i18n="stats.losses">Losses</div>
                </div>
                <div class="fm-stat">
                  <div class="fm-number" id="fm-draws">0</div>
                  <div class="fm-label" data-i18n="stats.draws">Draws</div>
                </div>
              </div>

              <a
                href="#joinTeamForm"
                class="fm-btn fm-scroll-to-form  "
                data-i18n="modal.trainBtn"
              >
                Train With Us
              </a>
            </div>
          </div>
        </div>
      </div>
