$(".slide-show").slick({
  prevArrow: `<button type='button' class='btn btn-success prev slide-arrow'><i class="bi bi-arrow-bar-left" aria-hidden='true'></i></button>`,
  nextArrow: `<button type='button' class='btn btn-success next slide-arrow'><i class="bi bi-arrow-bar-right" aria-hidden='true'></i></button>`,
  dots: true,
  appendDots: $(".slick-slider-dots"),
  focusOnSelect: true,
});

// $(".slide-book-list").slick({
//   infinite: true,
//   slidesToShow: 3,
//   slidesToScroll: 3,
// });

// Khởi tạo Slick Carousel
$(".slide-book").slick({
  infinite: false, // Chỉ hiển thị số lượng slide thực tế, không lặp lại
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow: `<button type='button' class='btn btn-success prev slide-arrow'><i class="bi bi-arrow-bar-left" aria-hidden='true'></i></button>`,
  nextArrow: `<button type='button' class='btn btn-success next slide-arrow'><i class="bi bi-arrow-bar-right" aria-hidden='true'></i></button>`,
  // dots: true,
});

$(".thuonghieu-slide").slick({
  infinite: false, // Chỉ hiển thị số lượng slide thực tế, không lặp lại
  speed: 300,
  slidesToShow: 9,
  slidesToScroll: 6,
  prevArrow: `<button type='button' class='btn btn-success w-auto prev slide-arrow'><i class="bi bi-arrow-bar-left" aria-hidden='true'></i></button>`,
  nextArrow: `<button type='button' class='btn btn-success w-auto next slide-arrow'><i class="bi bi-arrow-bar-right" aria-hidden='true'></i></button>`,
  // dots: true,
});

//   .find(".slick-track ")
//   .addClass("your-custom-class");

// Bắt sự kiện trước khi chuyển slide
// $(".slide-book-list").on(
//   "beforeChange",
//   function (event, slick, currentSlide, nextSlide) {
//     //
//     console.log(">>> Check current: ", currentSlide);
//     // Ẩn/hiển thị nút Prev khi ở trang đầu tiên
//     if (nextSlide === 0) {
//       $(".slick-prev").css("display", "none");
//       $(".slick-prev").addClass("prev slide-arrow");
//     } else {
//       $(".slick-prev").css("display", "block");
//     }

//     // Ẩn/hiển thị nút Next khi ở trang cuối cùng
//     if (nextSlide === slick.slideCount - 1) {
//       $(".slick-next").css("display", "none");
//     } else {
//       $(".slick-next").css("display", "block");
//     }
//   }
// );
