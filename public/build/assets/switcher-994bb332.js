jQuery(".demo-icon").click(function () {
    $(".demo_changer").hasClass("active")
        ? $(".demo_changer").animate({ right: "-270px" }, function () {
              $(".demo_changer").toggleClass("active");
          })
        : $(".demo_changer").animate({ right: "0px" }, function () {
              $(".demo_changer").toggleClass("active");
          });
});

// ✅ FIXED: Safe initialization of PerfectScrollbar
if (document.querySelector('.sidebar-right1')) {
    new PerfectScrollbar(".sidebar-right1", {
        useBothWheelAxes: true,
        suppressScrollX: true
    });
}

// Close sidebar if page is clicked
$(document).on("click", ".page", function () {
    if ($(".demo_changer").hasClass("active")) {
        $(".demo_changer").animate({ right: "-270px" }, function () {
            $(".demo_changer").toggleClass("active");
        });
    }
});
