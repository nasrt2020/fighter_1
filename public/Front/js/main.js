/*-----------------------------------------------------------------------------------

    Theme Name: Charity - Nonprofit and Donation Template
    Description: Nonprofit and Donation Template
    Author: Chitrakoot Web
    Version: 1.0

    /* ----------------------------------

    JS Active Code Index
            
        01. Preloader
        02. Scroll To Top
        03. Wow animation - on scroll
        04. Parallax
        05. Video
        06. Tab Effect
        07. Resize function
        08. Progress bar
        09. FullScreenHeight function
        10. ScreenFixedHeight function
        11. FullScreenHeight and screenHeight with resize function
        12. Sliders
        13. Tabs
        14. CountUp
        15. Countdown
        16. Isotop
        
    ---------------------------------- */

/*here is the extra code i should add it for JS  */

//wins counting
// Wins/Losses/Draws Counter Fix

document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");

    counters.forEach((counter) => {
        const target = parseInt(counter.getAttribute("data-count"), 10);
        const addPlus = counter.getAttribute("data-plus") === "true";

        // If 0 wins → show 0 with no animation
        if (!target || target === 0) {
            counter.textContent = "0";
            return;
        }

        let current = 0;
        const duration = 1200;
        const stepTime = 30;
        const increment = Math.max(
            1,
            Math.floor(target / (duration / stepTime)),
        );

        const update = () => {
            current += increment;

            if (current >= target) {
                counter.textContent = addPlus ? `${target}+` : `${target}`;

                // ⭐ Add glow animation on completed
                counter.classList.add("counter-glow");
            } else {
                counter.textContent = current.toString();
                setTimeout(update, stepTime);
            }
        };

        update();
    });
});

/* here is the end  */

/* the Camps fighters */

/* end the Camps fighters */

// Store schedules for morning and night per day
const schedules = {
    mon: {
        morning: { desc: "Striking & Cardio", time: "5:00 AM - 6:30 AM" },
        night: {
            desc: "Striking & Cardio (Evening)",
            time: "5:45 AM - 7:30 PM PM",
        },
    },
    wed: {
        morning: {
            desc: "Wrestling & Conditioning",
            time: "5:00 AM - 6:30 AM",
        },
        night: {
            desc: "Wrestling & Conditioning (Evening)",
            time: "5:30 PM - 6:30 PM",
        },
    },
    fri: {
        morning: {
            desc: "Technique & Sparring",
            time: "5:15 PM - 6:15 AM",
        },
        night: {
            desc: "Technique & Sparring (Evening)",
            time: "5:15 PM - 7:00 PM",
        },
    },
};

// Track current schedule shown (morning or night)
const currentSchedule = {
    mon: "morning",
    wed: "morning",
    fri: "morning",
};

function toggleSchedule(day) {
    const descEl = document.getElementById(`desc-${day}`);
    const timeEl = document.getElementById(`time-${day}`);
    const btnEl = document.getElementById(`btn-${day}`);

    if (currentSchedule[day] === "morning") {
        // Switch to night schedule
        descEl.innerHTML = `${schedules[day].night.desc}<br /><small class=" fw-semibold" id="time-${day}">${schedules[day].night.time}</small>`;
        btnEl.textContent = "Show Morning Schedule";
        currentSchedule[day] = "night";
    } else {
        // Switch back to morning schedule
        descEl.innerHTML = `${schedules[day].morning.desc}<br /><small class=" fw-semibold" id="time-${day}">${schedules[day].morning.time}</small>`;
        btnEl.textContent = "Show Night Schedule";
        currentSchedule[day] = "morning";
    }
}

// the end of schedule

/*------------------------------------
            popup code 
        --------------------------------------*/
(function () {
    document.addEventListener("DOMContentLoaded", function () {
        const overlay = document.getElementById("fighterModal");
        if (!overlay) return;

        const modalBox = overlay.querySelector(".fighter-modal");
        const closeBtn = overlay.querySelector(".fighter-modal-close");

        const img = document.getElementById("fm-img");
        const nameEl = document.getElementById("fighterModalTitle");
        const divEl = document.getElementById("fm-division");
        const stanceEl = document.getElementById("fm-stance");
        const bioEl = document.getElementById("fm-bio");
        const winsEl = document.getElementById("fm-wins");
        const lossesEl = document.getElementById("fm-losses");
        const drawsEl = document.getElementById("fm-draws");

        function openModal(d) {
            if (img) {
                img.src = d.img || "";
                img.alt = d.name ? d.name + " photo" : "Fighter photo";
            }
            if (nameEl) nameEl.textContent = d.name || "";
            if (divEl) divEl.textContent = d.division || "-";
            if (stanceEl) stanceEl.textContent = d.stance || "-";

            if (bioEl) {
                const rawBio = d.bio || "";
                bioEl.innerHTML = rawBio.trim()
                    ? rawBio.replace(/\r\n/g, "\n").replace(/\n/g, "<br>")
                    : "EHF fighter";
            }

            if (winsEl) winsEl.textContent = d.wins || "0";
            if (lossesEl) lossesEl.textContent = d.losses || "0";
            if (drawsEl) drawsEl.textContent = d.draws || "0";

            overlay.classList.add("open");
            modalBox?.classList.add("open");
            overlay.setAttribute("aria-hidden", "false");
            document.documentElement.style.overflow = "hidden";
        }

        function closeModal() {
            overlay.classList.remove("open");
            modalBox?.classList.remove("open");
            overlay.setAttribute("aria-hidden", "true");
            document.documentElement.style.overflow = "";
        }

        document.addEventListener("click", function (e) {
            const trigger = e.target.closest(".open-fighter");
            if (!trigger) return;
            e.preventDefault();
            openModal(trigger.dataset);
        });

        closeBtn?.addEventListener("click", closeModal);

        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) closeModal();
        });

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && overlay.classList.contains("open"))
                closeModal();
        });
    });
})();

//the end of popup

// 1. Define translations (fill as needed)
const translations = {
    en: {
        "nav.home": "Home",
        "nav.about": "About Us",
        "nav.fighter": "Fighters",
        "nav.eagle-fighters": "EHF fighters ",
        "nav.traning-fighters": "Campus fighters",
        "nav.coaches": "coaches",
        "nav.news": "News ",
        "nav.contact": "Contact Us",
        "nav.language": "Language",
        "hero.slide1.subtitle": "Eagle High Flyer",
        "hero.slide1.title": "Where Warriors Rise",

        "hero.slide2.subtitle": "Discipline. Power. Legacy",
        "hero.slide2.title": "Built in the cage, respected worldwide.",

        "hero.slide3.subtitle": "The Cage Awaits",
        "hero.slide3.title": "Get Ready for the Next Battle",

        "hero.cta": "Train With Us",
        // ...add all keys used with data-i18n
        // About section
        "about.title": "About Us",
        "about.text":
            "Welcome to Eagle High Flyer, a premier platform dedicated to promoting mixed martial arts (MMA) and combat sports across the region. Founded with a mission to discover, train, and showcase the next generation of fighting talent, we stand at the forefront of athlete development, fight events, and martial arts education.",
        "about.readMore": "Read More",
        //key fighters.
        "fighters.sectionLabel": "Our Fighters",
        "fighters.sectionTitle": "Key Fighters",
        "fighters.viewProfile": "View Profile",
        "fighters.divisionLabel": "Division:",
        "fighters.stanceLabel": "Stance:",
        "fighters.1.styles": "Muay Thai, BJJ",
        "fighters.1.name": "Eagle Khan",
        "fighters.1.desc":
            "Top contender known for explosive knockouts and unmatched agility in the cage.",
        "fighters.1.division": "Featherweight",
        "fighters.1.stance": "Orthodox",
        "fighters.2.styles": "Muay Thai, BJJ",
        "fighters.2.name": "Eagle Khan",
        "fighters.2.desc":
            "Top contender known for explosive knockouts and unmatched agility in the cage.",
        "fighters.2.division": "Featherweight",
        "fighters.2.stance": "Orthodox",
        "fighters.3.styles": "Muay Thai, BJJ",
        "fighters.3.name": "Eagle Khan",
        "fighters.3.desc":
            "Top contender known for explosive knockouts and unmatched agility in the cage.",
        "fighters.3.division": "Featherweight",
        "fighters.3.stance": "Orthodox",
        "stats.wins": "Wins",
        "stats.losses": "Losses",
        "stats.draws": "Draws",
        "modal.divisionLabel": "Division:",
        "modal.stanceLabel": "Stance:",
        "modal.trainBtn": "Train With Us",

        "stats.wins": "Wins",
        "stats.losses": "Losses",
        "stats.draws": "Draws",
        // Upcoming Fight Info
        "fight.dateLabel": "Date:",
        "fight.dateValue": "Aug 20, 2025",
        "fight.venueLabel": "Venue:",
        "fight.venueValue": "Amsterdam Arena",
        "fight.weightLabel": "Weight Class:",
        "fight.weightValue": "Welterweight",
        // Fights
        "fight.vs": "VS",

        "fight.1.name": "John Eagle",
        "fight.1.record": "15-2-0",
        "fight.2.name": "Ali Hammer",
        "fight.2.record": "18-3-0",
        "fight.3.name": "Bruce Falcon",
        "fight.3.record": "12-1-0",
        "fight.4.name": "Marco Storm",
        "fight.4.record": "14-4-0",

        "stats.age": "Age:",
        "stats.height": "Height:",
        "stats.weight": "Weight:",
        "stats.reach": "Reach:",
        "join.subtitle": "Become a part of the team",
        "join.title": "Join Our Team",
        "join.description": "Fill out the form below to apply as a fighter",
        "join.firstName": "First Name",
        "join.lastName": "Last Name",
        "join.age": "Age",
        "join.nationality": "Nationality",
        "join.weightClass": "Weight Class",
        "join.experience": "Tell us about your fight experience...",
        "join.submit": "Submit Application",
        "training.title": "Welcome to Our Training Camps",
        "training.subtitle": "Camp Season Now Open",
        //benifits.
        "benefits.title": "What You Get at Our Camps",
        "benefits.coaches.title": "Elite Coaches",
        "benefits.coaches.text":
            "Train with international-level MMA professionals.",
        "benefits.gym.title": "Full Gym Access",
        "benefits.gym.text": "World-class gym and strength facilities.",
        "benefits.islamic.title": "Islamic Environment",
        "benefits.islamic.text":
            "Dedicated prayer areas and a respectful atmosphere to nurture both physical and spiritual growth.",
        "benefits.mental.title": "Mental Coaching",
        "benefits.mental.text": "Build discipline and mental strength.",
        "benefits.team.title": "Team Environment",
        "benefits.team.text": "Supportive, motivating training partners.",
        "benefits.simulation.title": "Fight Simulation",
        "benefits.simulation.text":
            "Prepare for real scenarios in the octagon.",
        "schedule.title": "Training Schedule",
        "schedule.button": "Show Evening Schedule",

        "schedule.sun.day": "Sunday",
        "schedule.sun.desc": "Striking & Cardio",
        "schedule.sun.time": "5:00 AM – 6:30 AM",

        "schedule.tue.day": "Tuesday",
        "schedule.tue.desc": "Wrestling & Conditioning",
        "schedule.tue.time": "5:00 AM – 6:30 AM",

        "schedule.thu.day": "Thursday",
        "schedule.thu.desc": "Technique & Sparring",
        "schedule.thu.time": "5:15 AM – 6:15 AM",

        "cta.lead":
            "Meet the athletes pushing their limits every day. Ready to train like a pro?",
        "cta.trained": "Fighters Trained",
        "cta.won": "Pro Fights Won",
        "cta.years": "Years of Camps",
        "cta.apply": "Apply Now",
        "cta.fighters": "See Fighters",
        // ...
        "footer.aboutText":
            "Eagle High Flyer develops, supports and showcases elite MMA fighters with discipline, faith and professionalism.",
        "footer.quickLinks": "Quick Links",
        "footer.ehfFighters": "EHF Fighters",
        "footer.campFighters": "Camps Fighters",
        "footer.coaches": "Coaches Detail",
        "footer.news": "News ",
        "footer.contactTitle": "Contact Us",
        "footer.address": "500 Family, behind Sultan Hall, Kabul, Afghanistan",
        "footer.email": "info@ehf.com",
        "footer.website": "www.ehf.com",
        "footer.phone": "+93 79 175 3511",
        "footer.copy": "© 2024 Eagle High Flyer. All rights reserved.",
    },

    prs: {
        "nav.home": "صفحه اصلی",
        "nav.about": "در باره ما",
        "nav.eagle-fighters": " فایترهاسازمان",
        "nav.traning-fighters": "  فایترها کلپ",
        "nav.coaches": "مربی",
        "nav.fighter": "فایترها",
        "nav.news": "خبر ",
        "nav.contact": "ارتباط با ما",
        "nav.language": "زبان ",
        "hero.slide1.subtitle": "ایگل های فلایر",
        "hero.slide1.title": "جاییکه جنگجویان بلند می‌شوند",

        "hero.slide2.subtitle": "انضباط. قوت. میراث",
        "hero.slide2.title":
            "در قفس ساخته می‌شوی، در سراسر جهان احترام می‌گیری.",

        "hero.slide3.subtitle": "قفس در انتظار است",
        "hero.slide3.title": "خودت را برای نبرد بعدی آماده بساز",

        "hero.cta": "با ما تمرین کن",
        // add more Dari text here
        // About section
        "about.title": "درباره ما",
        "about.text":
            "به ایگل های فلایر خوش آمدید، یک پلتفرم پیشرو که به ترویج هنرهای رزمی ترکیبی (MMA) و ورزش‌های رزمی در سراسر منطقه اختصاص دارد. این مجموعه با هدف شناسایی، آموزش و معرفی نسل جدید استعدادهای مبارزه، در خط مقدم رشد ورزشکاران، رویدادهای مبارزه و آموزش هنرهای رزمی قرار دارد.",
        "about.readMore": "ادامه مطلب",
        //key fighters
        "fighters.sectionLabel": "فایترهای ما",
        "fighters.sectionTitle": "برجسته‌ترین فایترها",
        "fighters.viewProfile": "مشاهده پروفایل",
        "fighters.divisionLabel": "دسته وزنی:",
        "fighters.stanceLabel": "استایل:",
        "fighters.1.styles": "موی‌تای، جیو جیتسو برزیلی",
        "fighters.1.name": "ایگل خان",
        "fighters.1.desc":
            "مدعی برتر با ناک‌اوت‌های انفجاری و چابکی بی‌نظیر در قفس.",
        "fighters.1.division": "فیدرویت",
        "fighters.1.stance": "اورتودوکس",
        "fighters.2.styles": "موی‌تای، جیو جیتسو برزیلی",
        "fighters.2.name": "ایگل خان",
        "fighters.2.desc": "مدعی سطح بالا با تمرکز بر قدرت و تکنیک دقیق.",
        "fighters.2.division": "فیدرویت",
        "fighters.2.stance": "اورتودوکس",
        "fighters.3.styles": "موی‌تای، جیو جیتسو برزیلی",
        "fighters.3.name": "ایگل خان",
        "fighters.3.desc":
            "جنگجویی با تجربه بالا و عملکرد پایدار در سطح حرفه‌ای.",
        "fighters.3.division": "فیدرویت",
        "fighters.3.stance": "اورتودوکس",
        "stats.wins": "برد",
        "stats.losses": "باخت",
        "stats.draws": "مساوی",
        "modal.divisionLabel": "دسته وزنی:",
        "modal.stanceLabel": "استایل:",
        "modal.trainBtn": "با ما تمرین کن",

        "stats.wins": "برد",
        "stats.losses": "باخت",
        "stats.draws": "مساوی",
        // Upcoming Fight Info (Dari/Persian)
        "fight.dateLabel": "تاریخ:",
        "fight.dateValue": "۲۰ آگست ۲۰۲۵",
        "fight.venueLabel": "محل:",
        "fight.venueValue": "آرینای آمستردام",
        "fight.weightLabel": "دسته وزنی:",
        "fight.weightValue": "ولتروییت",
        "fight.vs": "در برابر",

        "fight.1.name": "جان ایگل",
        "fight.1.record": "۱۵-۲-۰",
        "fight.2.name": "علی هامر",
        "fight.2.record": "۱۸-۳-۰",
        "fight.3.name": "بروس فالکن",
        "fight.3.record": "۱۲-۱-۰",
        "fight.4.name": "مارکو استورم",
        "fight.4.record": "۱۴-۴-۰",

        "stats.age": "سن:",
        "stats.height": "قد:",
        "stats.weight": "وزن:",
        "stats.reach": "دست‌رسی:",
        "join.subtitle": "عضو تیم شوید",
        "join.title": "به تیم ما بپیوندید",
        "join.description": "فرم زیر را برای درخواست به عنوان مبارز پر کنید",
        "join.firstName": "نام",
        "join.lastName": "تخلص",
        "join.age": "سن",
        "join.nationality": "ملیت",
        "join.weightClass": "دسته وزنی",
        "join.experience": "در مورد تجربه مبارزه خود بنویسید...",
        "join.submit": "ارسال درخواست",
        "training.title": "به کمپ‌های آموزشی ما خوش آمدید",
        "training.subtitle": "فصل کمپ‌ها اکنون باز است",
        //benefits
        "benefits.title": "آنچه در کمپ‌های ما به دست می‌آورید",
        "benefits.coaches.title": "مربیان حرفه‌ای",
        "benefits.coaches.text":
            "با مربیان حرفه‌ای MMA در سطح بین‌المللی تمرین کنید.",
        "benefits.gym.title": "دسترسی کامل به جم",
        "benefits.gym.text": "جم مدرن و تجهیزات قدرتی در سطح جهانی.",
        "benefits.islamic.title": "محیط اسلامی",
        "benefits.islamic.text":
            "محل‌های مخصوص نماز و فضای محترمانه برای پرورش رشد جسمی و روحی.",
        "benefits.mental.title": "مربیگری ذهنی",
        "benefits.mental.text": "انضباط و استحکام ذهنی خود را بسازید.",
        "benefits.team.title": "محیط تیمی",
        "benefits.team.text": "هم‌تیمی‌های حمایت‌کننده و انگیزه‌دهنده.",
        "benefits.simulation.title": "شبیه‌سازی مبارزه",
        "benefits.simulation.text": "برای سناریوهای واقعی در قفس آماده شوید.",
        "schedule.title": "برنامه آموزشی",
        "schedule.button": "نمایش برنامه عصر",

        "schedule.sun.day": "یک‌شنبه",
        "schedule.sun.desc": "تمرین ضربه و کاردیو",
        "schedule.sun.time": "۵:۰۰ صبح – ۶:۳۰ صبح",

        "schedule.tue.day": "سه‌شنبه",
        "schedule.tue.desc": "کُشتی و تمرین قدرتی",
        "schedule.tue.time": "۵:۰۰ صبح – ۶:۳۰ صبح",

        "schedule.thu.day": "پنج‌شنبه",
        "schedule.thu.desc": "تکنیک و اسپارینگ",
        "schedule.thu.time": "۵:۱۵ صبح – ۶:۱۵ صبح",
        "cta.lead":
            "با ورزشکارانی آشنا شوید که هر روز مرزهای توانایی خود را می‌شکنند. آماده‌اید مانند یک حرفه‌ای تمرین کنید؟",
        "cta.trained": "رزمی‌کاران آموزش‌دیده",
        "cta.won": "پیروزی‌های حرفه‌ای",
        "cta.years": "سال‌های برگزاری کمپ‌ها",
        "cta.apply": "درخواست دهید",
        "cta.fighters": "دیدن مبارزان",
        // ...
        "footer.aboutText":
            "ایگل های فلایر با انضباط، ایمان و حرفه‌ای‌گری، مبارزان نخبه MMA را تربیت، حمایت و معرفی می‌کند.",
        "footer.quickLinks": "لینک‌های مهم",
        "footer.ehfFighters": "فایترهای EHF",
        "footer.campFighters": "فایترهای کمپ",
        "footer.coaches": "جزییات مربیان",
        "footer.news": "خبر ",
        "footer.contactTitle": "تماس با ما",
        "footer.address": "۵۰۰ فامیلی، عقب سالون سلطان، کابل، افغانستان",
        "footer.email": "info@ehf.com",
        "footer.website": "www.ehf.com",
        "footer.phone": "+۹۳ ۷۹ ۱۷۵ ۳۵۱۱",
        "footer.copy": "© ۲۰۲۴ ایگل های فلایر. تمامی حقوق محفوظ است.",
    },
};

// 2. Apply language
function applyLanguage(lang) {
    const dict = translations[lang];
    if (!dict) return;

    document.querySelectorAll("[data-i18n]").forEach((el) => {
        const key = el.getAttribute("data-i18n");
        if (dict[key]) {
            el.textContent = dict[key];
        }
    });

    // remember choice
    localStorage.setItem("ehf_lang", lang);
}

// 3. Init on load
document.addEventListener("DOMContentLoaded", () => {
    // attach click handlers
    document.querySelectorAll(".language-nav .dropdown-item").forEach((btn) => {
        btn.addEventListener("click", () => {
            const lang = btn.dataset.lang;
            applyLanguage(lang);
        });
    });

    // load saved language or default to English
    const saved = localStorage.getItem("ehf_lang") || "en";
    applyLanguage(saved);
});
/*here is the extra code i should add it for JS  */

window.addEventListener("scroll", function () {
    const header = document.querySelector(".navbar-default");
    const placeholder = document.querySelector(".navbar-placeholder");
    const scrollY = window.scrollY;

    if (scrollY > 100) {
        header.classList.add("navbar-fixed");
        placeholder.style.display = "block";
    } else {
        header.classList.remove("navbar-fixed");
        placeholder.style.display = "none";
    }
});

(function ($) {
    "use strict";

    var $window = $(window);

    /*------------------------------------
            01. Preloader
        --------------------------------------*/

    $("#preloader").fadeOut("normall", function () {
        $(this).remove();
    });

    /*------------------------------------
            02. Scroll To Top
        --------------------------------------*/

    $window.on("scroll", function () {
        if ($(this).scrollTop() > 500) {
            $(".scroll-to-top").fadeIn(400);
        } else {
            $(".scroll-to-top").fadeOut(400);
        }
    });

    $(".scroll-to-top").on("click", function (event) {
        event.preventDefault();
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            600,
        );
    });

    /*------------------------------------
            03. Wow animation - on scroll
        --------------------------------------*/

    var wow = new WOW({
        boxClass: "wow", // default
        animateClass: "animated", // default
        offset: 0, // default
        mobile: false, // default
        live: true, // default
    });
    wow.init();

    $(".text-animation").waypoint(
        function () {
            $(".text-animation.animated").textillate();
        },
        { offset: "100%" },
    );

    $(".page-title-section .text-animation").textillate();

    if ($(".tilt").length !== 0) {
        $(".tilt").tilt({
            maxTilt: 9,
            perspective: 1000, // Transform perspective, the lower the more extreme the tilt gets.
            scale: 1, // 2 = 200%, 1.5 = 150%, etc..
            speed: 300, // Speed of the enter/exit transition.
            reset: true, // If the tilt effect has to be reset on exit.
        });
    }

    /*------------------------------------
            04. Parallax
        --------------------------------------*/

    // sections background image from data background
    var pageSection = $(".parallax,.bg-img");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css(
                "background-image",
                "url(" + $(this).data("background") + ")",
            );
        }
    });

    /*------------------------------------
            05. Video
        --------------------------------------*/

    $(".popup-social-video").magnificPopup({
        disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

    /*------------------------------------
            06. Tab Effect
        --------------------------------------*/

    //Click on first li element
    $(".tab1").click(function () {
        $(".second, .third, .four").fadeOut();
        $(".first").fadeIn(1000);
    });

    //Click on second li element
    $(".tab2").click(function () {
        $(".first, .third, .four").fadeOut();
        $(".second").fadeIn(1000);
    });

    //Click on third li element
    $(".tab3").click(function () {
        $(".second, .first, .four").fadeOut();
        $(".third").fadeIn(1000);
    });

    /*------------------------------------
            07. Resize function
        --------------------------------------*/

    $window.resize(function (event) {
        setTimeout(function () {
            SetResizeContent();
        }, 500);
        event.preventDefault();
    });

    /*------------------------------------
            08. Progress bar
        --------------------------------------*/

    $window.on("scroll", function () {
        $(".skills-progress span").each(function () {
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            var myVal = $(this).attr("data-value");
            if (bottom_of_window > bottom_of_object) {
                $(this).css({
                    width: myVal,
                });
            }
        });
    });

    /*------------------------------------
            09. FullScreenHeight function
        --------------------------------------*/

    function fullScreenHeight() {
        var element = $(".full-screen");
        var $minheight = $window.height();
        element.css("min-height", $minheight);
    }

    /*------------------------------------
            10. ScreenFixedHeight function
        --------------------------------------*/

    function ScreenFixedHeight() {
        var $headerHeight = $("header").height();
        var element = $(".screen-height");
        var $screenheight = $window.height() - $headerHeight;
        element.css("height", $screenheight);
    }

    /*------------------------------------
            11. FullScreenHeight and screenHeight with resize function
        --------------------------------------*/

    function SetResizeContent() {
        fullScreenHeight();
        ScreenFixedHeight();
    }

    SetResizeContent();

    // === when document ready === //
    $(document).ready(function () {
        /*------------------------------------
            12. Sliders
        --------------------------------------*/

        // Clients carousel
        $(".client-style1").owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            smartSpeed: 800,
            autoplayTimeout: 3000,
            responsiveClass: true,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    margin: 30,
                },
                481: {
                    items: 2,
                    margin: 15,
                },
                576: {
                    items: 3,
                    margin: 30,
                },
                992: {
                    items: 4,
                    margin: 40,
                },
                1200: {
                    items: 5,
                    margin: 60,
                },
                1600: {
                    items: 7,
                    margin: 80,
                },
            },
        });

        // testmonial-carousel
        $(".testimonial-carousel").owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: false,
            smartSpeed: 1500,
            nav: false,
            dots: true,
            center: false,
            margin: 30,
            items: 1,
        });

        // Sliderfade
        $(".slider-fade").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            margin: 0,
            nav: false,
            autoplay: true,
            smartSpeed: 900,
            mouseDrag: false,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
            dotsEach: true,
        });

        // Default owlCarousel
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            margin: 0,
            autoplay: true,
            smartSpeed: 500,
        });

        // Slider text animation
        var owl = $(".slider-fade");
        owl.on("changed.owl.carousel", function (event) {
            var item = event.item.index - 2; // Position of the current item
            $(".text-animations").removeClass("animated");
            $("h1").removeClass("animated fadeInRight");
            $(".butn").removeClass("animated fadeInRight");
            $(".owl-item")
                .not(".cloned")
                .eq(item)
                .find(".text-animations")
                .addClass("animated");
            $(".owl-item")
                .not(".cloned")
                .eq(item)
                .find("h1")
                .addClass("animated fadeInRight");
            $(".text-animations").textillate("in");
            $(".owl-item")
                .not(".cloned")
                .eq(item)
                .find(".butn")
                .addClass("animated fadeInRight");
        });

        /*------------------------------------
            13. Tabs
        --------------------------------------*/

        //Horizontal Tab
        if ($(".horizontaltab").length !== 0) {
            $(".horizontaltab").easyResponsiveTabs({
                type: "default", //Types: default, vertical, accordion
                width: "auto", //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: "hor_1", // The tab groups identifier
                activate: function (event) {
                    // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $("#nested-tabInfo");
                    var $name = $("span", $info);
                    $name.text($tab.text());
                    $info.show();
                },
            });
        }

        /*------------------------------------
            14. CountUp
        --------------------------------------*/

        $(".countup").counterUp({
            delay: 25,
            time: 2000,
        });

        /*------------------------------------
            15. Countdown
        --------------------------------------*/

        // CountDown for coming soon page
        $(".countdown").countdown({
            date: "01 Jan 2024 00:01:00", //set your date and time. EX: 15 May 2014 12:00:00
            format: "on",
        });
    });

    // === when window loading === //
    $window.on("load", function () {
        /*------------------------------------
            16. Isotop
        --------------------------------------*/

        var $PortfolioGallery = $(".portfolio-gallery-isotope").isotope({
            // options
        });

        // filter items on button click
        $(".filtering").on("click", "span", function () {
            var filterValue = $(this).attr("data-filter");
            $PortfolioGallery.isotope({
                filter: filterValue,
            });
        });

        $(".filtering").on("click", "span", function () {
            $(this).addClass("active").siblings().removeClass("active");
        });

        $(".portfolio-gallery").lightGallery();
        $(".portfolio-gallery-isotope").lightGallery();

        // stellar
        $window.stellar();
    });
})(jQuery);

//====== this code belong to the view profile of key fighters when click on the veiw profiel then
//  train with us button take it join our team. this code clse the page only
document.addEventListener("click", function (e) {
    const link = e.target.closest(".fm-scroll-to-form");
    if (!link) return;

    e.preventDefault();

    // Close modal
    const overlay = document.getElementById("fighterModal");
    if (overlay) {
        overlay.classList.remove("open");
        overlay.setAttribute("aria-hidden", "true");
        document.documentElement.style.overflow = "";
    }

    // Scroll to form
    const targetSelector = link.getAttribute("href");
    const target = document.querySelector(targetSelector);
    if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });
    }
});
// the blow code is for about us page when click on start your journy with us take it to join our team
document.addEventListener("DOMContentLoaded", () => {
    if (window.location.hash === "#joinTeamForm") {
        const target = document.querySelector("#joinTeamForm");
        if (target) {
            setTimeout(() => {
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }, 300);
        }
    }
});

/*-----------------------------
news js 
------------------------------ */
/*-----------------------------
schedule  js after laravel 
---- -------------------------- */
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".js-toggle-schedule").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const dayKey = btn.getAttribute("data-day");
            const card = document.querySelector(
                '.schedule-card-pro[data-day="' + dayKey + '"]',
            );

            if (!card) return;

            const titleEl = card.querySelector(".schedule-title");
            const timeEl = card.querySelector(".schedule-time");
            const state = card.getAttribute("data-state") || "morning";

            if (state === "morning") {
                // Switch to evening
                titleEl.textContent = card.getAttribute("data-evening-title");
                timeEl.textContent = card.getAttribute("data-evening-time");
                btn.textContent = "Show Morning Schedule";
                card.setAttribute("data-state", "evening");
            } else {
                // Switch back to morning
                titleEl.textContent = card.getAttribute("data-morning-title");
                timeEl.textContent = card.getAttribute("data-morning-time");
                btn.textContent = "Show Evening Schedule";
                card.setAttribute("data-state", "morning");
            }
        });
    });
});
