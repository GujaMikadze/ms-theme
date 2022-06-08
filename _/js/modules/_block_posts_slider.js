import Swiper, { Navigation, Pagination, Scrollbar, Autoplay } from "swiper";

document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".posts-category-slider_slide", {
    // Install modules
    slidesPerView: 1.5,
    spaceBetween: 16,
    autoplay: {
      delay: 3000,
    },
    modules: [Navigation, Pagination, Scrollbar, Autoplay],
  });

  const largeSlider = ()=>{
    let largeSliders = document.querySelectorAll('.swiper')
    let prevArrow = document.querySelectorAll('.prev')
    let nextArrow = document.querySelectorAll('.next')
    largeSliders.forEach((slider, index)=>{
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length
      let result = (sliderLength > 1) ? true : false
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
          spaceBetween: 30,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          centerInsufficientSlides: true,
          pagination: {
            el: ".swiper-pagination",
          },
          grabCursor: true,
          // loop: true,
          modules: [Navigation, Pagination, Scrollbar, Autoplay],
          // Responsive breakpoints
        breakpoints: {
          // when window width is >= 320px
          760: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          // when window width is >= 480px
          1000: {
            slidesPerView: 3,
            spaceBetween: 30
          }
        },
        navigation: {
          // the 'index' bit below is just the order of the class in the queryselectorAll array,
          //  so the first one would be NextArrow[0] etc
          nextEl: nextArrow[index],
          prevEl: prevArrow[index],
        },
      });	
    })
  }
  largeSlider();
});