<!DOCTYPE html>
<html lang="en">
  @include('front.layouts.head')
@include('front.layouts.header')


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <section>
                <div class="container">
                    <div class="section-heading">
                        <span
                            class="d-block text-primary display-22 display-md-21 display-lg-20 alt-font wow text-animation"
                            data-in-effect="fadeInRight"
                            >contact us</span
                        >
                        <h2>Get in touch</h2>
                    </div>
                    <div class="row mb-1-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="col-lg-12">
                            <div
                                class="p-1-6 p-lg-1-9 p-xl-2-5 border border-color-extra-light-gray rounded"
                            >
                                <form
                                
                                    action="{{ route('contact.store') }}"
                                    method="POST"
                                >
                                    @csrf

                                    <div class="quform-elements">
                                        <div class="row">
                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element">
                                                    <label for="name"
                                                        >Your Name
                                                        <span
                                                            class="quform-required"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <div class="quform-input">
                                                        <input
                                                            class="form-control"
                                                            id="name"
                                                            type="text"
                                                            name="name"
                                                            placeholder="Your name here"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element">
                                                    <label for="email"
                                                        >Your Email
                                                        <span
                                                            class="quform-required"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <div class="quform-input">
                                                        <input
                                                            class="form-control"
                                                            id="email"
                                                            type="text"
                                                            name="email"
                                                            placeholder="Your email here"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element">
                                                    <label for="subject"
                                                        >Your Subject
                                                        <span
                                                            class="quform-required"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <div class="quform-input">
                                                        <input
                                                            class="form-control"
                                                            id="subject"
                                                            type="text"
                                                            name="subject"
                                                            placeholder="Your subject here"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element">
                                                    <label for="phone"
                                                        >Contact Number</label
                                                    >
                                                    <div class="quform-input">
                                                        <input
                                                            class="form-control"
                                                            id="phone"
                                                            type="text"
                                                            name="phone"
                                                            placeholder="Your phone here"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Textarea element -->
                                            <div class="col-md-12">
                                                <div class="quform-element">
                                                    <label for="message"
                                                        >Message
                                                        <span
                                                            class="quform-required"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <div class="quform-input">
                                                        <textarea
                                                            class="form-control"
                                                            id="message"
                                                            name="message"
                                                            rows="3"
                                                            placeholder="Tell us a few words"
                                                        ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Textarea element -->

                                            <!-- Begin Captcha element -->
                                            <div class="col-md-12">
                                                <div class="quform-element">
                                                    <div class="form-group">
                                                        <div
                                                            class="quform-input"
                                                        >
                                                         
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <!-- End Captcha element -->

                                            <!-- Begin Submit button -->
                                            <div class="col-md-12">
                                                <div
                                                    class="quform-submit-inner"
                                                >
                                                    <button
                                                        class="butn"
                                                        type="submit"
                                                    >
                                                        Send Message
                                                    </button>
                                                </div>
                                                <div
                                                    class="quform-loading-wrap text-start"
                                                >
                                                    <span
                                                        class="quform-loading"
                                                    ></span>
                                                </div>
                                            </div>
                                            <!-- End Submit button -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-n1-6">
                        <div
                            class="col-md-6 col-lg-4 mt-1-6 wow fadeIn"
                            data-wow-delay="200ms"
                        >
                            <div
                                class="p-1-6 text-center border border-color-extra-light-gray rounded h-100"
                            >
                                <i
                                    class="fas fa-mobile-alt display-18 mb-1-6 text-primary"
                                ></i>
                                <h3 class="h5 mb-3">Call us</h3>
                              <span class="d-block mb-2">{{ $settings->phone_1 ?? '(+93) ...' }}</span>
<span>{{ $settings->phone_2 ?? '' }}</span>

                            </div>
                        </div>
                        <div
                            class="col-md-6 col-lg-4 mt-1-6 wow fadeIn"
                            data-wow-delay="400ms"
                        >
                            <div
                                class="p-1-6 text-center border border-color-extra-light-gray rounded h-100"
                            >
                                <i
                                    class="fas fa-map-marker-alt display-18 mb-1-6 text-primary"
                                ></i>
                                <h3 class="h5 mb-3">Visit us</h3>
                               <span class="d-block mb-2">{{ $settings->address_line_1 ?? '' }}</span>
<span>{{ $settings->address_line_2 ?? '' }}</span>

                            </div>
                        </div>
                        <div
                            class="col-md-6 col-lg-4 mt-1-6 wow fadeIn"
                            data-wow-delay="600ms"
                        >
                            <div
                                class="p-1-6 text-center border border-color-extra-light-gray rounded h-100"
                            >
                                <i
                                    class="far fa-envelope display-18 mb-1-6 text-primary"
                                ></i>
                                <h3 class="h5 mb-3">Mail us</h3>
                            <span class="d-block mb-2">{{ $settings->email_1 ?? '' }}</span>
<span>{{ $settings->email_2 ?? '' }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- IFRAME
        ================================================== -->
            <section class="p-0">
                <div class="row">
                    <div class="col-lg-12">
                       <iframe
  width="100%"
  height="500"
  id="gmap_canvas"
  src="{{ $settings->map_iframe_src ?? '' }}"
></iframe>

                    </div>
                </div>
            </section>


@include('front.layouts.footer-js')