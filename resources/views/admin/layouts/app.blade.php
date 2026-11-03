<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.layouts.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @yield('content')
          
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        @include('admin.layouts.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{asset('assets/admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{asset('assets/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{asset('assets/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{asset('assets/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{asset('assets/admin/assets/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{asset('assets/admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{asset('assets/admin/assets/js/misc.js') }}"></script>
    <script src="{{asset('assets/admin/assets/js/settings.js') }}"></script>
    <script src="{{asset('assets/admin/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/admin/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
     <script>
  async function loadAdminNotifCounts() {
    try {
      const res = await fetch("{{ route('admin.notif.counts') }}", {
        headers: { "X-Requested-With": "XMLHttpRequest" }
      });
      const data = await res.json();

      // Update dropdown numbers
      const setText = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.textContent = val;
      };

      setText("navUnreadMessages", data.unread_messages ?? 0);
      setText("navPendingChallenges", data.pending_challenges ?? 0);
      setText("navPendingCampApps", data.pending_camp_apps ?? 0);
      setText("navPendingEhfApps", data.pending_ehf_apps ?? 0);

      // Update bell badge total
      const badge = document.getElementById("navNotifBadge");
      if (badge) {
        const total = data.total ?? 0;
        if (total > 0) {
          badge.style.display = "inline-block";
          badge.textContent = total;
        } else {
          badge.style.display = "none";
          badge.textContent = "";
        }
      }

    } catch (e) {
      console.log("Notif counts failed:", e);
    }
  }

  // Load once on every page
  document.addEventListener("DOMContentLoaded", loadAdminNotifCounts);

  // Optional: auto refresh every 20 seconds
  setInterval(loadAdminNotifCounts, 20000);
</script>

  </body>
</html>