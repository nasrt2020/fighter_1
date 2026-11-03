@if($upcomingFight && $upcomingFight->slides->count())
  <div class="container mt-1-9">
    <div class="fight-info-box">
      <span class="info-label">Date:</span>
      <span class="info-value">
        {{ $upcomingFight->fight_date ? \Carbon\Carbon::parse($upcomingFight->fight_date)->format('M d, Y') : '' }}
      </span>

      <span class="divider">|</span>

      <span class="info-label">Venue:</span>
      <span class="info-value">{{ $upcomingFight->venue }}</span>

      <span class="divider">|</span>

      <span class="info-label">Weight Class:</span>
      <span class="info-value">{{ $upcomingFight->weight_class }}</span>
    </div>
  </div>

  <div id="fightCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      @foreach($upcomingFight->slides as $i => $slide)
        <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
          <div class="row fight-card align-items-center text-white gx-2 gy-4">

            <div class="col-6 col-md-2 text-center">
              <div class="fighter-image-wrapper">
                <img src="{{ $slide->fighter1_image ? asset('storage/'.$slide->fighter1_image) : '' }}" class="img-fluid" alt="">
                <div class="fighter-info-overlay">
                  <div>
                    <strong>{{ $slide->fighter1_name }}</strong> |
                    <span>{{ $slide->fighter1_record }}</span><br>
                    @if($slide->fighter1_flag)
                      <img src="https://flagcdn.com/{{ strtolower($slide->fighter1_flag) }}.svg" class="flag" alt="">
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-3 text-center">
              <div class="fighter-stats">
                <p><strong>Age:</strong> {{ $slide->fighter1_age }}</p>
                <p><strong>Height:</strong> {{ $slide->fighter1_height }}</p>
                <p><strong>Weight:</strong> {{ $slide->fighter1_weight }}</p>
                <p><strong>Reach:</strong> {{ $slide->fighter1_reach }}</p>
              </div>
            </div>

            <div class="col-12 col-md-2 text-center">
              <div class="vs-text">VS</div>
            </div>

            <div class="col-6 col-md-3 text-center">
              <div class="fighter-stats">
                <p><strong>Age:</strong> {{ $slide->fighter2_age }}</p>
                <p><strong>Height:</strong> {{ $slide->fighter2_height }}</p>
                <p><strong>Weight:</strong> {{ $slide->fighter2_weight }}</p>
                <p><strong>Reach:</strong> {{ $slide->fighter2_reach }}</p>
              </div>
            </div>

            <div class="col-6 col-md-2 text-center">
              <div class="fighter-image-wrapper">
                <img src="{{ $slide->fighter2_image ? asset('storage/'.$slide->fighter2_image) : '' }}" class="img-fluid" alt="">
                <div class="fighter-info-overlay">
                  <div>
                    <strong>{{ $slide->fighter2_name }}</strong> |
                    <span>{{ $slide->fighter2_record }}</span><br>
                    @if($slide->fighter2_flag)
                      <img src="https://flagcdn.com/{{ strtolower($slide->fighter2_flag) }}.svg" class="flag" alt="">
                    @endif
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#fightCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#fightCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
@endif

      <!-- join our team 
        ================================================== -->
      <section
        class="bg-img cover-background mx-lg-4 mx-xl-6 rounded-lg py-5 mt-3"
        data-overlay-dark="6"
        data-background="Front/img/video/image1.jpg"
        id="joinTeamForm"
      >
        <div class="container text-center text-white">
          <!-- Section Title -->
          <div class="section-heading mb-4">
            <span
              class="d-block text-secondary display-22 display-md-21 display-lg-20 alt-font wow text-animation"
              data-in-effect="fadeInRight"
              data-i18n="join.subtitle"
            >
              Become a part of the team
            </span>
            <h2 class="mb-3 text-white" data-i18n="join.title">
              Join Our Team
            </h2>
            <p class="mb-4" data-i18n="join.description">
              Fill out the form below to apply as a fighter
            </p>
          </div>

          <!-- Fighter Join Form -->
    <form class="row g-3 justify-content-center"
      method="POST"
      action="{{ route('front.apply') }}">
    @csrf
            <div class="col-md-4">
              <input
                type="text"
                class="form-control"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="First Name"
                name="first_name"
                required
                data-i18n-placeholder="join.firstName"
              />
            </div>
            <div class="col-md-4">
              <input
                type="text"
                class="form-control"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="Last Name"
                name="last_name"
                required
                data-i18n-placeholder="join.lastName"
              />
            </div>
            <div class="col-md-4">
              <input
                type="number"
                class="form-control"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="Age"
                name="age"
                required
                data-i18n-placeholder="join.age"
              />
            </div>
            <div class="col-md-4">
              <input
                type="text"
                class="form-control"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="Nationality"
                name="nationality"
                data-i18n-placeholder="join.nationality"
              />
            </div>
            <div class="col-md-4">
              <input
                type="text"
                class="form-control"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="Weight Class"
                name="weight_class"
                data-i18n-placeholder="join.weightClass"
              />
            </div>
            <div class="col-md-8">
              <textarea
                class="form-control"
                rows="4"
                style="
                  background-color: #0b0b0b;
                  color: white;
                  border: 1px solid #cb0404;
                "
                placeholder="Tell us about your fight experience..."
                name="experience"
                data-i18n-placeholder="join.experience"
              ></textarea>
            </div>
            <div class="col-12">
              <button
                type="submit"
                id="applicationbutton"
                class="btn px-5"
                style="background-color: #cb0404; color: white"
                data-i18n="join.submit"
              >
                Submit Application
              </button>
            </div>
          </form>
        </div>
      </section>