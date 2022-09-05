<template>
  <div >
    <!-- Start Navbar Area -->
    <div class="navbar-area">
      <div class="crimso-responsive-nav">
        <div class="container">
          <div class="crimso-responsive-menu">
            <div class="logo">
              <a href="/">
                <img
                  style="height: 35px"
                  src="/assets/img/logo.png"
                  alt="logo"
                />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="crimso-nav">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="/">
              <img src="/assets/img/logo.png" alt="logo" style="height: 55px" />
            </a>

            <div
              class="collapse navbar-collapse mean-menu"
              id="navbarSupportedContent"
            >
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="/" class="nav-link">Home </a>
                </li>

                <li class="nav-item">
                  <a href="/blog" class="nav-link">Blog </a>
                </li>

                <li class="nav-item">
                  <a href="services" class="nav-link">Services </a>
                </li>

                <li class="nav-item">
                  <a href="/about" class="nav-link">About </a>
                </li>
                <li class="nav-item">
                  <a href="/contact-us" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="/faq" class="nav-link">FAQ </a>
                </li>

                <li class="nav-item">
                  <a href="/register" class="nav-link">Sign Up </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- End Navbar Area -->
    <div style="margin-bottom:8rem">

    </div>
  </div>
</template>

<script>
import axios from "axios";
import "@/css/style.css";
import "@/css/responsive.css";
import "@/css/animate.min.css";
import "@/css/bootstrap.min.css";
import "@/css/meanmenu.css";



// require("@/js/jquery.min.js");
// require("@/js/popper.min.js");
// require("@/js/bootstrap.min.js");
// require("@/js/jquery.meanmenu.js");
// require("@/js/jquery.appear.min.js");
// require("@/js/owl.carousel.min.js");
// require("@/js/main.js");
// require("@/js/jquery.magnific-popup.min.js");
// require("@/js/jquery.nice-select.min.js");
// require("@/js/jquery.mixitup.min.js");
// require("@/js/wow.min.js");
// require("@/js/parallax.min.js");
// require("@/js/jquery.ajaxchimp.min.js");
// require("@/js/form-validator.min.js");
// require("@/js/contact-form-script.js");



export default {
  name: "page-header-component",

  data() {
    return {
      user: CanvasUI.user, // eslint-disable-line no-undef
      canvasPath: CanvasUI.canvasPath, // eslint-disable-line no-undef
    };
  },

  methods: {
    logout() {
      axios.get(`/${this.canvasPath}/logout`).then(() => {
        window.location.href = `/${this.canvasPath}/login`;
      });
    },
  },
};
</script>

