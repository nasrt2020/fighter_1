<!DOCTYPE html>
<html lang="en">
 @include('front.layouts.head')
  <body>
    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">
    @include('front.layouts.header')

    @include('front.layouts.banner-about')
      <!-- key fighters 
        ================================================== -->
    @include('front.layouts.key-fighter')
      <!--upcooimg fight -->
      @include('front.layouts.upcoming-joinus')

      <!-- ===== Training Camps Hero (Pro) ===== -->
      <section class="camp-hero-pro text-center text-white">
        <div class="container position-relative">
          <h2 class="display-3 fw-bold mb-1" data-i18n="training.title">
            Welcome to Our Training Camps
          </h2>
          <hr class="mx-auto hero-line" />
          <p
            class="text-uppercase fw-semibold fs-6 letter-spacing-2 text-brand"
            data-i18n="training.subtitle"
          >
            Camp Season Now Open
          </p>
        </div>
      </section>

      <!-- ============= Benefits (Pro Grid) ============= -->
      <section class="benefits-pro text-white">
        <div class="container text-center">
          <h3 class="benefits-title" data-i18n="benefits.title">
            What You Get at Our Camps
          </h3>

          <div class="benefits-grid">
            <!-- 1 -->
            <article class="benefit-tile">
              <div class="icon">🥋</div>
              <h5 class="benefit-head" data-i18n="benefits.coaches.title">
                Elite Coaches
              </h5>
              <p class="benefit-copy" data-i18n="benefits.coaches.text">
                Train with international-level MMA professionals.
              </p>
            </article>

            <!-- 2 -->
            <article class="benefit-tile">
              <div class="icon">🏋️‍♂️</div>
              <h5 class="benefit-head" data-i18n="benefits.gym.title">
                Full Gym Access
              </h5>
              <p class="benefit-copy" data-i18n="benefits.gym.text">
                World-class gym and strength facilities.
              </p>
            </article>

            <!-- 3 -->
            <article class="benefit-tile">
              <div class="icon">🕋</div>
              <h5 class="benefit-head" data-i18n="benefits.islamic.title">
                Islamic Environment
              </h5>
              <p class="benefit-copy" data-i18n="benefits.islamic.text">
                Dedicated prayer areas and a respectful atmosphere to nurture
                both physical and spiritual growth.
              </p>
            </article>

            <!-- 4 -->
            <article class="benefit-tile">
              <div class="icon">🧠</div>
              <h5 class="benefit-head" data-i18n="benefits.mental.title">
                Mental Coaching
              </h5>
              <p class="benefit-copy" data-i18n="benefits.mental.text">
                Build discipline and mental strength.
              </p>
            </article>

            <!-- 5 -->
            <article class="benefit-tile">
              <div class="icon">🤝</div>
              <h5 class="benefit-head" data-i18n="benefits.team.title">
                Team Environment
              </h5>
              <p class="benefit-copy" data-i18n="benefits.team.text">
                Supportive, motivating training partners.
              </p>
            </article>

            <!-- 6 -->
            <article class="benefit-tile">
              <div class="icon">🏟️</div>
              <h5 class="benefit-head" data-i18n="benefits.simulation.title">
                Fight Simulation
              </h5>
              <p class="benefit-copy" data-i18n="benefits.simulation.text">
                Prepare for real scenarios in the octagon.
              </p>
            </article>
          </div>
        </div>
      </section>

      <!-- ===== Training Schedule (Professional) ===== -->
   <section class="camp-schedule-pro text-white">
    <div class="container">
        <h3 class="text-center mb-5 fw-bold text-white">
            Training Schedule
        </h3>

        <div class="row justify-content-center g-4">
            @foreach ($camps as $dayName => $sessions)
                @php
                    $morning = $sessions->firstWhere('session', 'morning');
                    $evening = $sessions->firstWhere('session', 'evening');
                    $first   = $morning ?? $evening; // what we show initially
                    // key for JS, like "sunday", "tuesday"
                    $dayKey  = strtolower($dayName);
                @endphp

                @if ($first)
                    <div class="col-12 col-md-4">
                        <div class="schedule-card-pro text-center"
                             data-day="{{ $dayKey }}"
                             data-morning-title="{{ $morning->title ?? '' }}"
                             data-morning-time="{{ $morning ? $morning->start_time.' – '.$morning->end_time : '' }}"
                             data-evening-title="{{ $evening->title ?? '' }}"
                             data-evening-time="{{ $evening ? $evening->start_time.' – '.$evening->end_time : '' }}"
                             data-state="morning">

                            <header class="card-head">
                                <span class="dot"></span>
                                <h5 class="day">{{ $dayName }}</h5>
                            </header>

                            <div class="card-body">
                                <p class="schedule-desc mb-3">
                                    <span class="schedule-title">
                                        {{ $first->title }}
                                    </span>
                                    <br />
                                    <small class="fw-semibold schedule-time">
                                        {{ $first->start_time }} – {{ $first->end_time }}
                                    </small>
                                </p>
                            </div>

                            <footer class="card-foot">
                                @if ($morning && $evening)
                                    <button
                                        type="button"
                                        class="btn-ghost js-toggle-schedule"
                                        data-day="{{ $dayKey }}"
                                    >
                                        Show Evening Schedule
                                    </button>
                                @endif
                            </footer>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

      <!-- Count-Up Stats + CTA Section -->
      <section class="py-6 text-white text-center camp-cta">
        <div class="container">
          <p class="lead mb-5" data-i18n="cta.lead">
            Meet the athletes pushing their limits every day. Ready to train
            like a pro?
          </p>

          <div class="row mb-5">
            <div class="col-md-4">
            <h3 class="display-4 fw-bold counter text-brand"
    data-count="{{ $campStats->fighters_trained ?? 0 }}">0</h3>
              <p data-i18n="cta.trained">Fighters Trained</p>
            </div>
            <div class="col-md-4">
             <h3 class="display-4 fw-bold counter text-brand"
    data-count="{{ $campStats->pro_fights_won ?? 0 }}">0</h3>
              <p data-i18n="cta.won">Pro Fights Won</p>
            </div>
            <div class="col-md-4">
              <h3 class="display-4 fw-bold counter text-brand"
    data-count="{{ $campStats->years_of_camps ?? 0 }}">0</h3>
              <p data-i18n="cta.years">Years of Camps</p>
            </div>
          </div>

          <div class="d-flex justify-content-center gap-4 flex-wrap">
            <!-- Apply Now Button -->
            <button
              class="btn btn-brand-fill btn-lg px-5 shadow"
              data-bs-toggle="modal"
              data-bs-target="#consultationModal"
              data-i18n="cta.apply"
            >
              Apply Now
            </button>

            <!-- See Fighters -->
            <a
              href="{{ route('camp.fighters') }}"
              class="btn btn-outline-light btn-lg px-5 shadow"
              data-i18n="cta.fighters"
            >
              See Fighters
            </a>
          </div>
        </div>
      </section>

   
      <div
        class="modal fade"
        id="consultationModal"
        tabindex="-1"
        aria-labelledby="consultationModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header modal-brand-header">
              <h5 class="modal-title text-white" id="consultationModalLabel">
                Fighter Application
              </h5>
              <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
<form action="{{ route('camp.apply') }}" method="POST" enctype="multipart/form-data" id="fighterApplicationForm">
  @csrf

              <div class="modal-body">
                <div class="mb-3">
                  <label for="nameInput" class="form-label">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nameInput"
                    name="name"
                    placeholder="Enter first name"
                    required
                  />
                </div>

                <div class="mb-3">
                  <label for="surnameInput" class="form-label">Surname</label>
                  <input
                    type="text"
                    class="form-control"
                    id="surnameInput"
                    name="surname"
                    placeholder="Enter surname"
                    required
                  />
                </div>

                <div class="mb-3">
                  <label for="fatherNameInput" class="form-label"
                    >Father Name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="fatherNameInput"
                    name="father_name"
                    placeholder="Enter father's name"
                    required
                  />
                </div>

                <div class="mb-3">
                  <label for="ageInput" class="form-label">Age</label>
                  <input
                    type="number"
                    class="form-control"
                    id="ageInput"
                    name="age"
                    placeholder="Enter age"
                    min="10"
                    required
                  />
                </div>
<div class="mb-3">
  <label class="form-label">Phone</label>
  <input type="text" class="form-control" name="phone" placeholder="+93..." required>
</div>

<div class="mb-3">
  <label class="form-label">Email (optional)</label>
  <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
</div>

<div class="mb-3">
  <label class="form-label">Current Address</label>
  <input type="text" class="form-control" name="location" placeholder="Kabul..." required>
</div>
<div class="mb-3">
  <label class="form-label">National ID Number</label>
  <input
    type="text"
    class="form-control"
    name="id_number"
    placeholder="1398-1100-55555"
    maxlength="20"
    required
  />
  <small class="text-muted">Format: 1398-1100-55555</small>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Weight (kg)</label>
    <input type="number" class="form-control" name="weight_kg" min="30" max="250" required>
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Preferred Session</label>
    <select class="form-control" name="preferred_session" required>
      <option value="morning">Morning</option>
      <option value="evening">Evening</option>
      <option value="both">Both</option>
    </select>
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Discipline</label>
    <select class="form-control" name="discipline" required>
      <option value="MMA">MMA</option>
      <option value="Boxing">Boxing</option>
      <option value="Muay Thai">Muay Thai</option>
      <option value="Wrestling">Wrestling</option>
      <option value="BJJ">BJJ</option>
      <option value="Kickboxing">Kickboxing</option>
      <option value="Other">Other</option>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Experience Level</label>
    <select class="form-control" name="experience_level" required>
      <option value="beginner">Beginner</option>
      <option value="intermediate">Intermediate</option>
      <option value="pro">Pro</option>
    </select>
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Years of Experience</label>
  <input type="number" class="form-control" name="experience_years" min="0" max="50" required>
</div>

<div class="mb-3">
  <label class="form-label">Why do you want to join?</label>
  <textarea class="form-control" name="message" rows="3" required></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Instagram / Facebook (optional)</label>
  <input type="text" class="form-control" name="social_link" placeholder="https://...">
</div>

                <div class="mb-3">
                  <label for="photoInput" class="form-label"
                    >Upload Photo</label
                  >
                  <input
                    type="file"
                    class="form-control"
                    id="photoInput"
                    name="photo"
                    accept="image/*"
                    required
                  />
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-brand">Submit</button>
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- SERVICES
        ================================================== -->

      <!-- EVENT
        ================================================== -->

      <!-- CLIENTS
        ================================================== -->

      <!-- TESTIMONIAL
        ================================================== -->

      <!-- VOLUNTEERS
        ================================================== -->

      <!-- CALL TO ACTION
        ================================================== -->

      <!-- BLOG
        ================================================== -->

      <!-- FOOTER
        ================================================== -->
   @include('front.layouts.footer-js')
    </div>

    
  </body>
</html>
