(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[9],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/BlogDetail.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
var axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'DetailMedium',
  data: function data() {
    return {
      medium: {},
      dark_mode: ''
    };
  },
  methods: {
    getKonten: function getKonten() {
      var _this = this;

      axios.get('/getarticle/' + this.$route.params.judul).then(function (response) {
        // console.log(response.data.medium);
        if (response.data.medium == null) {
          window.location = "/";
        } else {
          _this.medium = response.data.medium;
        }
      });
    },
    get_dark_mode: function get_dark_mode() {
      return this.$store.getters.getDarkMode;
    },
    set_dark_mode: function set_dark_mode() {
      if (this.$store.getters.getDarkMode) {
        this.$store.dispatch('changeDarkMode', false);
      } else {
        this.$store.dispatch('changeDarkMode', true);
      }

      this.dark_mode = this.$store.getters.getDarkMode; // console.log(this.dark_mode);
    }
  },
  created: function created() {
    this.getKonten();
    this.dark_mode = this.$store.getters.getDarkMode;
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/*\nTemplate Name:Mediumish\nCopyright:WowThemes.net,https://www.wowthemes.net\nVersion:1.0.1\nLicense: https://www.wowthemes.net/freebies-license/\ngradasi:  #040D21 #7B2B8E #F148FB\n*/\nbody[data-v-9960a11c] {\n\tpadding-top:5rem;\n\t/* background-attachment: fixed; */\n\t/* background-image: url(\"../img/bg-pattern.png\"); */\n\tbackground-color: #ffeb3b;\n\t/* background-size: cover; */\n\t/* background-position: 0 50px; */\n\tcolor: #040B21;\n}\n.background--yellow[data-v-9960a11c]{\n\tbackground-color: #f5d300;\n}\n.background--dark[data-v-9960a11c]{\n\tbackground-color: #212121;\n}\n.text--dark[data-v-9960a11c]{\n\tcolor: hsla(0,0%,100%,.7) !important;\n}\n.mainheading[data-v-9960a11c] {\n\tpadding:1rem 0rem;\n}\na[data-v-9960a11c] {\n\tcolor: #003366;\n\t/* color:#00ab6b; */\n}\na[data-v-9960a11c],a[data-v-9960a11c]:hover {\n\ttransition:all 0.2s;\n}\n.mediumnavigation[data-v-9960a11c] {\n\tbackground:#040B21;\n\tbox-shadow:0 2px 2px -2px rgba(0,0,0,.15);\n}\nsection[data-v-9960a11c] {\n\tmargin-bottom:20px;\n}\n.section-title h2[data-v-9960a11c] {\n\tborder-bottom:1px solid rgba(0,0,0,.15);\n\tmargin-bottom:25px;\n\tfont-weight:700;\n\tfont-size:1.4rem;\n\tmargin-bottom:27px;\n}\n.section-title span[data-v-9960a11c] {\n\tborder-bottom:1px solid rgba(0,0,0,.44);\n\tdisplay:inline-block;\n\tpadding-bottom:20px;\n\tmargin-bottom:-1px;\n}\n@media (min-width:576px) {\n.card-columns.listfeaturedtag[data-v-9960a11c] {\n\t\t-moz-column-count:2;\n\t\tcolumn-count:2;\n}\n}\n@media (min-width:992px) {\n.navbar-toggleable-md .navbar-nav .nav-link[data-v-9960a11c] {\n\t\tpadding-right:.7rem;\n\t\tpadding-left:.7rem;\n}\n}\n.card-columns .card[data-v-9960a11c] {\n\tmargin-bottom:20px;\n}\n.card[data-v-9960a11c] {\n\tbackground: #040B21\n}\n.listfeaturedtag .wrapthumbnail[data-v-9960a11c] {\n\theight:258px;\n\tflex:0 0 auto;\n}\n.listfeaturedtag .card[data-v-9960a11c] {\n\tborder:1px solid rgba(0,0,0,.1);\n\tborder-radius:2px;\n\theight:260px;\n\tpadding-left:0;\n\tmargin-bottom:15px;\n}\n.listfeaturedtag .thumbnail[data-v-9960a11c] {\n\tbackground-size:cover;\n\theight:100%;\n\tdisplay:block;\n\tbackground-position:38% 22% !important;\n\tbackground-origin:border-box!important;\n\tborder-top-left-radius:2px;\n}\n.listfeaturedtag .card-block[data-v-9960a11c] {\n\tpadding-left:0;\n}\n.listfeaturedtag h2.card-title[data-v-9960a11c],.listrecent h2.card-title[data-v-9960a11c] {\n\tfont-size:1.3rem;\n\tfont-weight:700;\n\tline-height: 1.25;\n}\n.listfeaturedtag h2.card-title a[data-v-9960a11c],.listrecent h2.card-title a[data-v-9960a11c] {\n\tcolor:#E5E5E5;\n}\n.listfeaturedtag h2.card-title a[data-v-9960a11c]:hover,.listrecent h2.card-title a[data-v-9960a11c]:hover {\n\ttext-shadow: 0px 0px 5px rgba(255, 255, 255, 1);\n\ttext-decoration:none;\n}\n.listfeaturedtag h4.card-text[data-v-9960a11c],.listrecent h4.card-text[data-v-9960a11c] {\n\tcolor:#E5E5E5;\n\tfont-size:0.95rem;\n\tline-height:1.4;\n\tfont-weight:400;\n}\n.listfeaturedtag .wrapfooter[data-v-9960a11c] {\n\tposition:absolute;\n\tbottom:20px;\n\tfont-size:12px;\n\tdisplay:block;\n\twidth:85%;\n}\n.listrecent .wrapfooter[data-v-9960a11c] {\n\tfont-size:12px;\n\tmargin-top:30px;\n}\n.author-thumb[data-v-9960a11c] {\n\twidth:40px;\n\theight:40px;\n\tfloat:left;\n\tmargin-right:13px;\n\tborder-radius:100%;\n}\n.post-top-meta[data-v-9960a11c] {\n\tmargin-bottom:2rem;\n}\n.post-top-meta .author-thumb[data-v-9960a11c] {\n\twidth:72px;\n\theight:72px;\n}\n.post-top-meta.authorpage .author-thumb[data-v-9960a11c] {\n\tmargin-top:40px;\n}\n.post-top-meta span[data-v-9960a11c] {\n\tfont-size:0.9rem;\n\tcolor:rgba(0,0,0,.44);\n\tdisplay:inline-block;\n}\n.post-top-meta .author-description[data-v-9960a11c] {\n\tmargin-bottom:5px;\n\tmargin-top:5px;\n\tfont-size:0.95rem;\n}\n.author-meta[data-v-9960a11c] {\n\tflex:1 1 auto;\n\twhite-space:nowrap!important;\n\ttext-overflow:ellipsis!important;\n\toverflow:hidden!important;\n}\nspan.post-name[data-v-9960a11c],span.post-date[data-v-9960a11c],span.author-meta[data-v-9960a11c] {\n\tdisplay:inline-block;\n}\nspan.post-date[data-v-9960a11c],span.post-read[data-v-9960a11c] {\n\tcolor:#E5E5E5;\n}\nspan.post-read-more[data-v-9960a11c] {\n\talign-items:center;\n\tdisplay:inline-block;\n\tfloat:right;\n\tmargin-top:8px;\n}\nspan.post-read-more a[data-v-9960a11c] {\n\tcolor:rgba(0,0,0,.44);\n}\nspan.post-name a[data-v-9960a11c],span.post-read-more a[data-v-9960a11c]:hover {\n\tcolor:#E5E5E5;\n}\nspan.post-read-more a[data-v-9960a11c] {\n\tfill: #E5E5E5;\n}\n.dot[data-v-9960a11c]:after {\n\tcontent:\"·\";\n\tmargin-left:3px;\n\tmargin-right:3px;\n}\n.mediumnavigation .form-control[data-v-9960a11c] {\n\tfont-size:0.8rem;\n\tborder-radius:30px;\n\toverflow:hidden;\n\tborder:1px solid rgba(0,0,0,0.04);\n}\n.mediumnavigation .form-inline[data-v-9960a11c] {\n\tmargin-left:15px;\n}\n.mediumnavigation .form-inline .btn[data-v-9960a11c] {\n\tmargin-left:-50px;\n\tborder:0;\n\tborder-radius:30px;\n\tcursor:pointer;\n}\n.mediumnavigation .form-inline .btn[data-v-9960a11c]:hover,.mediumnavigation .form-inline .btn[data-v-9960a11c]:active {\n\tbackground:transparent;\n\tcolor:green;\n}\n.mediumnavigation .navbar-brand[data-v-9960a11c] {\n\tfont-weight:500;\n}\n.mediumnavigation .dropdown-menu[data-v-9960a11c] {\n\tborder:1px solid rgba(0,0,0,0.08);\n\tmargin:.5rem 0 0;\n}\n.mediumnavigation .nav-item[data-v-9960a11c],.dropdown-menu[data-v-9960a11c] {\n\tfont-size:0.9rem;\n}\n.mediumnavigation .search-icon[data-v-9960a11c] {\n\tmargin-left:-40px;\n\tdisplay:inline-block;\n\tmargin-top:3px;\n\tcursor:pointer;\n}\n.mediumnavigation .navbar-brand img[data-v-9960a11c] {\n\tmax-height:30px;\n\tmargin-right:5px;\n}\n.mainheading h1.sitetitle[data-v-9960a11c] {\n\tfont-family:Righteous;\n}\n.mainheading h1.posttitle[data-v-9960a11c] {\n\tfont-weight:700;\n\tmargin-bottom:1rem;\n}\n.footer[data-v-9960a11c] {\n\tborder-top:1px solid rgba(0,0,0,.05)!important;\n\tpadding-top:15px;\n\tpadding-bottom:12px;\n\tfont-size:0.8rem;\n\tcolor:#040B21;\n\tmargin-top:50px;\n}\n.link-dark[data-v-9960a11c] {\n\tcolor:#040B21;\n}\n.article-post[data-v-9960a11c] {\n\t/* font-family:Merriweather; */\n\tfont-size:1.2rem;\n\tline-height:1.8;\n\tcolor:#040B21;\n}\nblockquote[data-v-9960a11c] {\n\tborder-left:4px solid #f148fb;\n\tpadding:0 20px;\n\tfont-style:italic;\n\tcolor:#040B21;\n}\n.article-post p[data-v-9960a11c],.article-post blockquote[data-v-9960a11c] {\n\tmargin:0 0 1.5rem 0;\n}\n.featured-image[data-v-9960a11c] {\n\tdisplay:block;\n\tmargin:0px auto;\n\tmargin-bottom:1.5rem;\n}\n.share[data-v-9960a11c] {\n\ttext-align:center;\n\tmargin-top:20px;\n}\n.share p[data-v-9960a11c] {\n\tmargin-bottom:10px;\n\tfont-size:0.95rem;\n\tcolor: #040B21;\n}\n.share[data-v-9960a11c] {\n\tdisplay:none;\n}\n.share ul li[data-v-9960a11c] {\n\tdisplay:inline-block;\n\tmargin-bottom:5px;\n}\n.share ul li a[data-v-9960a11c] {\n\tfill: #040B21;\n\tcolor: #040B21;\n}\n.share ul[data-v-9960a11c] {\n\tpadding-left:0;\n\tmargin-left:0;\n}\n.svgIcon[data-v-9960a11c] {\n\tvertical-align:middle;\n}\n@media (min-width:1024px) {\n.share[data-v-9960a11c] {\n\t\tposition:fixed;\n\t\tdisplay:block;\n}\n.share ul li[data-v-9960a11c] {\n\t\tdisplay:block;\n}\n}\n@media (max-width:999px) {\n.listfeaturedtag .wrapthumbnail[data-v-9960a11c], .listfeaturedtag .col-md-7[data-v-9960a11c] {\n\t\twidth:100%;\n\t\tmax-width:100%;\n\t\tflex: 100%;\n}\n.listfeaturedtag .wrapthumbnail[data-v-9960a11c] {\n\t\theight:250px;\n}\n.listfeaturedtag .card[data-v-9960a11c] {\n\t\theight:auto;\n}\n.listfeaturedtag .wrapfooter[data-v-9960a11c] {\n\t\tposition:relative;\n\t\tmargin-top:30px;\n}\n.listfeaturedtag .card-block[data-v-9960a11c] {\n\t\tpadding:20px;\n}\n}\n@media (max-width:1024px) {\n.post-top-meta .col-md-10[data-v-9960a11c] {\n\t\ttext-align:center;\n}\n}\n@media (max-width:767px) {\n.post-top-meta.authorpage[data-v-9960a11c] {\n\t\ttext-align:center;\n}\n}\n.share[data-v-9960a11c],.share a[data-v-9960a11c] {\n\tcolor:rgba(0,0,0,.44);\n\tfill:rgba(0,0,0,.44);\n}\n.graybg[data-v-9960a11c] {\n\tbackground-color:rgba(255, 255, 255, 0.1);\n\tpadding:40px 0 46px;\n\tposition:relative;\n}\n.listrelated .card[data-v-9960a11c] {\n\tbox-shadow:0 1px 7px rgba(0,0,0,.05);\n\tborder:0;\n}\n.card[data-v-9960a11c] {\n\tborder-radius:4px;\n}\n.card .img-thumb[data-v-9960a11c] {\n\tborder-top-right-radius:4px;\n\tborder-top-left-radius:4px;\n}\nul.tags[data-v-9960a11c] {\n\tlist-style:none;\n\tpadding-left:0;\n\tmargin:0 0 3rem 0;\n}\nul.tags li[data-v-9960a11c] {\n\tdisplay:inline-block;\n\tfont-size:0.9rem;\n}\nul.tags li a[data-v-9960a11c] {\n\tbackground:#040B21;\n\tcolor:#E5E5E5;\n\tborder-radius:3px;\n\tpadding:5px 10px;\n\ttransition: 0.3s;\n}\nul.tags li a[data-v-9960a11c]:hover {\n\ttext-shadow: 0px 0px 15px white;\n\ttext-decoration:none;\n}\n.margtop3rem[data-v-9960a11c] {\n\tmargin-top: 3rem;\n}\n.sep[data-v-9960a11c] {\n\theight:1px;\n\twidth:20px;\n\tbackground:#040B21;\n\tmargin:0px auto;\n\tmargin-bottom:1.2rem;\n}\n.btn.follow[data-v-9960a11c] {\n\tborder-color:#003366;\n\tcolor:#003366;\n\tpadding:3px 10px;\n\ttext-align:center;\n\tborder-radius:999em;\n\tfont-size:0.85rem;\n\tdisplay:inline-block;\n}\n.btn.subscribe[data-v-9960a11c] {\n\tbackground-color:#f148fb;\n\tborder-color:#f148fb;\n\tcolor:rgba(255,255,255,1);\n\tfill:rgba(255,255,255,1);\n\tborder-radius:30px;\n\tfont-size:0.85rem;\n\tmargin-left:10px;\n\tfont-weight:600;\n\ttext-transform:uppercase;\n}\n.post-top-meta .btn.follow[data-v-9960a11c] {\n\tmargin-left:5px;\n\tmargin-top:-4px;\n}\n.alertbar[data-v-9960a11c] {\n\tbox-shadow:0 -3px 10px 0 rgba(0,0,0,.0785);\n\tposition:fixed;\n\tbottom:0;\n\tleft:0;\n\tbackground-color:#040D21;\n\twidth:100%;\n\tpadding:14px 0;\n\tz-index:1;\n\tcolor: #E5E5E5;\n}\n.alertbar-logo[data-v-9960a11c] {\n\twidth: 50px;\n}\n.form-control[data-v-9960a11c]::-webkit-input-placeholder {\n\tcolor: rgba(0,0,0,.5);\n}\n.form-control[data-v-9960a11c]:-moz-placeholder {\n\tcolor: rgba(0,0,0,.5);\n}\n.form-control[data-v-9960a11c]::-moz-placeholder {\n\tcolor: rgba(0,0,0,.5);\n}\n.form-control[data-v-9960a11c]:-ms-input-placeholder {\n\tcolor: rgba(0,0,0,.5);\n}\n.form-control[data-v-9960a11c]::-ms-input-placeholder {\n\tcolor: rgba(0,0,0,.5);\n}\n.authorpage h1[data-v-9960a11c] {\n\tfont-weight:700;\n\tfont-size:30px;\n}\n.post-top-meta.authorpage .author-thumb[data-v-9960a11c] {\n\tfloat:none;\n}\n.authorpage .author-description[data-v-9960a11c] {\n\tfont-size:1rem;\n\tcolor:#040B21;\n}\n.authorpage .author-description a[data-v-9960a11c]{\n\tcolor: #003366;\n}\n.post-top-meta span[data-v-9960a11c] {\n\tcolor: #040B21;\n}\n.post-top-meta.authorpage .btn.follow[data-v-9960a11c] {\n\tpadding:7px 20px;\n\tmargin-top:10px;\n\tmargin-left:0;\n\tfont-size:0.9rem;\n}\n.graybg.authorpage[data-v-9960a11c] {\n\tborder-top:1px solid #f0f0f0;\n}\n.authorpostbox[data-v-9960a11c] {\n\twidth:760px;\n\tmargin:0px auto;\n\tmargin-bottom:1.5rem;\n\tmax-width:100%;\n}\n.authorpostbox .img-thumb[data-v-9960a11c] {\n\twidth:100%;\n}\n.sociallinks[data-v-9960a11c] {\n\tmargin:1rem 0;\n}\n.sociallinks a[data-v-9960a11c] {\n\tbackground:#666;\n\tcolor:#fff;\n\twidth:22px;\n\theight:22px;\n\tdisplay:inline-block;\n\ttext-align:center;\n\tline-height:22px;\n\tborder-radius:50%;\n\tfont-size:12px;\n}\n.nav-link[data-v-9960a11c] {\n\tcolor: #F5D300 !important;\n}\n.nav-link[data-v-9960a11c]:hover {\n\ttext-shadow: 0px 0px 10px rgba(255, 255, 255, 1);\n}\n.active[data-v-9960a11c] {\n\tfont-weight: bold;\n}\n.toggler-img[data-v-9960a11c] {\n\twidth: 30px;\n}\n\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);



module.exports = content.locals || {};

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      class: {
        "background--dark": _vm.dark_mode,
        "background--yellow": !_vm.dark_mode
      }
    },
    [
      _c("vue-headful", {
        attrs: { title: _vm.medium.judul, description: "Page for Mage6 Blog" }
      }),
      _vm._v(" "),
      _c(
        "v-container",
        [
          _c(
            "v-row",
            [
              _c(
                "v-col",
                { attrs: { cols: "12 mx-auto", sm: "8 mx-auto" } },
                [
                  _c(
                    "div",
                    { staticClass: "mainheading" },
                    [
                      _c(
                        "v-row",
                        { staticClass: "post-top-meta" },
                        [
                          _c(
                            "v-col",
                            { attrs: { sm: "2", cols: "12" } },
                            [
                              _c("v-img", {
                                staticClass: "author-thumb",
                                attrs: {
                                  src: __webpack_require__(/*! ../../../public/medium/logomage.png */ "./public/medium/logomage.png"),
                                  cover: ""
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "v-col",
                            {
                              attrs: {
                                sm: "8",
                                cols: "12 text-center text-sm-left"
                              }
                            },
                            [
                              _c(
                                "div",
                                { class: { "text--dark": _vm.dark_mode } },
                                [_vm._v("MAGE 6")]
                              ),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass: "author-description",
                                  class: { "text--dark": _vm.dark_mode }
                                },
                                [
                                  _vm._v(
                                    "Event tahunan dari Departemen Teknik Komputer ITS yang menyelenggarakan beberapa kompetisi untuk membantu generasi muda mengimplementasikan ide dan kemampuannya"
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass: "post-date",
                                  class: { "text--dark": _vm.dark_mode }
                                },
                                [
                                  _vm._v(
                                    _vm._s(_vm.medium.created_at.slice(0, 10))
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "v-col",
                            {
                              attrs: {
                                sm: "2",
                                cols: "12 text-center text-sm-left"
                              }
                            },
                            [
                              _c("v-switch", {
                                attrs: {
                                  label: "Dark Mode",
                                  color: "yellow",
                                  dark: _vm.dark_mode,
                                  "input-value": _vm.dark_mode
                                },
                                on: { change: _vm.set_dark_mode }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass:
                            "posttitle text-h4 text-sm-h3 font-weight-medium",
                          class: { "text--dark": _vm.dark_mode }
                        },
                        [_vm._v(_vm._s(_vm.medium.judul))]
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("v-img", {
                    staticClass: "featured-image",
                    attrs: {
                      src: __webpack_require__("./public/medium sync recursive ^\\.\\/.*$")("./" +
                        _vm.medium.path_gambar),
                      cover: ""
                    }
                  }),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "article-post",
                    class: { "text--dark": _vm.dark_mode },
                    domProps: { innerHTML: _vm._s(_vm.medium.konten) }
                  })
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-container", [
        _c("div", { staticClass: "footer" }, [
          _c(
            "p",
            {
              staticClass: "pull-left",
              class: { "text--dark": this.$store.getters.getDarkMode }
            },
            [
              _vm._v(
                "\n\t\t\t\t\tCopyright © 2020 Multimedia And Game Event 6 ITS\n\t\t\t\t"
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "clearfix" })
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./public/medium sync recursive ^\\.\\/.*$":
/*!*************************************!*\
  !*** ./public/medium sync ^\.\/.*$ ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./Apps Transportasi Online yang Mempermudah Masyarakat Dalam Angkutan.png": "./public/medium/Apps Transportasi Online yang Mempermudah Masyarakat Dalam Angkutan.png",
	"./Big Data dalam Pemenuhan Pemasaran E-Commerce.jpg": "./public/medium/Big Data dalam Pemenuhan Pemasaran E-Commerce.jpg",
	"./IoT Pada Supply Chain.jpg": "./public/medium/IoT Pada Supply Chain.jpg",
	"./Pengaplikasian Blockchain terhadap Sektor Industri.jpg": "./public/medium/Pengaplikasian Blockchain terhadap Sektor Industri.jpg",
	"./Penggunaan AR dalam Pemasaran Produk.jpg": "./public/medium/Penggunaan AR dalam Pemasaran Produk.jpg",
	"./Peran Penting Teknologi di Masa Pandemi COVID19.jpg": "./public/medium/Peran Penting Teknologi di Masa Pandemi COVID19.jpg",
	"./logomage.png": "./public/medium/logomage.png"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./public/medium sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./public/medium/Apps Transportasi Online yang Mempermudah Masyarakat Dalam Angkutan.png":
/*!***********************************************************************************************!*\
  !*** ./public/medium/Apps Transportasi Online yang Mempermudah Masyarakat Dalam Angkutan.png ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Apps Transportasi Online yang Mempermudah Masyarakat Dalam Angkutan.png?762e6a2e4f5163d2b7c2ad9ac0d05133";

/***/ }),

/***/ "./public/medium/Big Data dalam Pemenuhan Pemasaran E-Commerce.jpg":
/*!*************************************************************************!*\
  !*** ./public/medium/Big Data dalam Pemenuhan Pemasaran E-Commerce.jpg ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Big Data dalam Pemenuhan Pemasaran E-Commerce.jpg?c58d5516dc9deb86c83ea1654d3fbada";

/***/ }),

/***/ "./public/medium/IoT Pada Supply Chain.jpg":
/*!*************************************************!*\
  !*** ./public/medium/IoT Pada Supply Chain.jpg ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/IoT Pada Supply Chain.jpg?13064393d142f16998c918017aba2692";

/***/ }),

/***/ "./public/medium/Pengaplikasian Blockchain terhadap Sektor Industri.jpg":
/*!******************************************************************************!*\
  !*** ./public/medium/Pengaplikasian Blockchain terhadap Sektor Industri.jpg ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Pengaplikasian Blockchain terhadap Sektor Industri.jpg?beae7b70ac487263926aa616ca95900e";

/***/ }),

/***/ "./public/medium/Penggunaan AR dalam Pemasaran Produk.jpg":
/*!****************************************************************!*\
  !*** ./public/medium/Penggunaan AR dalam Pemasaran Produk.jpg ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Penggunaan AR dalam Pemasaran Produk.jpg?7f84e92bda88b1f889587085f2873fe7";

/***/ }),

/***/ "./public/medium/Peran Penting Teknologi di Masa Pandemi COVID19.jpg":
/*!***************************************************************************!*\
  !*** ./public/medium/Peran Penting Teknologi di Masa Pandemi COVID19.jpg ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Peran Penting Teknologi di Masa Pandemi COVID19.jpg?abcae4e934a36d7025bd70194d8c18ff";

/***/ }),

/***/ "./public/medium/logomage.png":
/*!************************************!*\
  !*** ./public/medium/logomage.png ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/logomage.png?aa0cce7c9260feaab58fa7a7f663301f";

/***/ }),

/***/ "./resources/js/views/BlogDetail.vue":
/*!*******************************************!*\
  !*** ./resources/js/views/BlogDetail.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true& */ "./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true&");
/* harmony import */ var _BlogDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BlogDetail.vue?vue&type=script&lang=js& */ "./resources/js/views/BlogDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& */ "./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _BlogDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "9960a11c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/BlogDetail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/BlogDetail.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/views/BlogDetail.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./BlogDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& ***!
  \****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=style&index=0&id=9960a11c&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_style_index_0_id_9960a11c_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true&":
/*!**************************************************************************************!*\
  !*** ./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/BlogDetail.vue?vue&type=template&id=9960a11c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BlogDetail_vue_vue_type_template_id_9960a11c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);