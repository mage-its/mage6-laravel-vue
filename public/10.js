(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[10],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _penyisihanolim_Loader_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../penyisihanolim/Loader.vue */ "./resources/js/views/penyisihanolim/Loader.vue");
/* harmony import */ var _penyisihanolim_Footer_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../penyisihanolim/Footer.vue */ "./resources/js/views/penyisihanolim/Footer.vue");
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
// @ is an alias to /src


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'MainMenu',
  components: {
    Loader: _penyisihanolim_Loader_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    FooterMage: _penyisihanolim_Footer_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      assets: {
        play1: __webpack_require__(/*! ../../assets/img/Game/play1.png */ "./resources/js/assets/img/Game/play1.png"),
        play2: __webpack_require__(/*! ../../assets/img/Game/play2.png */ "./resources/js/assets/img/Game/play2.png"),
        rules1: __webpack_require__(/*! ../../assets/img/Game/rules1.png */ "./resources/js/assets/img/Game/rules1.png"),
        rules2: __webpack_require__(/*! ../../assets/img/Game/rules2.png */ "./resources/js/assets/img/Game/rules2.png"),
        exit1: __webpack_require__(/*! ../../assets/img/Game/exit1.png */ "./resources/js/assets/img/Game/exit1.png"),
        exit2: __webpack_require__(/*! ../../assets/img/Game/exit2.png */ "./resources/js/assets/img/Game/exit2.png")
      },
      playImage: undefined,
      rulesImage: undefined,
      exitImage: undefined,
      isModalActive: false
    };
  },
  methods: {
    activeModal: function activeModal() {
      this.isModalActive = true;
    },
    inactiveModal: function inactiveModal() {
      this.isModalActive = false;
    }
  },
  beforeMount: function beforeMount() {// document.body.classList.remove('bg');
    // document.body.classList.add('bg1');
  },
  created: function created() {
    this.playImage = this.assets.play1;
    this.rulesImage = this.assets.rules1;
    this.exitImage = this.assets.exit1;
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
var ___CSS_LOADER_GET_URL_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/getUrl.js */ "./node_modules/css-loader/dist/runtime/getUrl.js");
var ___CSS_LOADER_URL_IMPORT_0___ = __webpack_require__(/*! ../../assets/img/Game/bg1.png */ "./resources/js/assets/img/Game/bg1.png");
exports = ___CSS_LOADER_API_IMPORT___(false);
var ___CSS_LOADER_URL_REPLACEMENT_0___ = ___CSS_LOADER_GET_URL_IMPORT___(___CSS_LOADER_URL_IMPORT_0___);
// Module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* Logo Judul */\n.wrapperLogo[data-v-5432f97e]{\n  display: grid;\n  width: 100%;\n  justify-content: center;\n  align-items: center;\n  text-align: center;\n  padding: 15% 0% 10% 0;\n}\n.logo1[data-v-5432f97e]{\n  display: block;\n  position: relative;\n  max-width: 600px;\n  width: 100%;\n  -webkit-animation: fadeInUp-data-v-5432f97e 1s ease-in;\n          animation: fadeInUp-data-v-5432f97e 1s ease-in;\n}\n@-webkit-keyframes fadeInUp-data-v-5432f97e{\n0%{\n    opacity: 0;\n    visibility: 0;\n    transform: translateY(100%)\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n@keyframes fadeInUp-data-v-5432f97e{\n0%{\n    opacity: 0;\n    visibility: 0;\n    transform: translateY(100%)\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n\n/* Tombol */\n.wrapperMain[data-v-5432f97e]{\n  display: grid;\n  grid-template-rows: 1fr 1fr;\n  grid-row-gap: 50px;\n  position: relative;\n  width: 100%;\n  justify-content: center;\n  align-items: center;\n  text-align: center;\n  padding: 0% 0% 20% 0;\n  transition: 0.5s;\n}\n.playButton[data-v-5432f97e]{\n  position: relative;\n  /* width: 35vw; */\n  min-width: 200px;\n  cursor: pointer;\n  -webkit-animation: fadeIn-data-v-5432f97e 2s ease-in;\n          animation: fadeIn-data-v-5432f97e 2s ease-in;\n}\n.rulesButton[data-v-5432f97e]{\n  position: relative;\n  width: 10vw;\n  min-width: 50px;\n  margin-left: auto;\n  margin-right: auto;\n  margin-top: auto;\n  margin-bottom: auto;\n  cursor: pointer;\n  -webkit-animation: fadeIn-data-v-5432f97e 2s ease-in;\n          animation: fadeIn-data-v-5432f97e 2s ease-in;\n}\n@-webkit-keyframes fadeIn-data-v-5432f97e{\n0%{\n    opacity: 0;\n    visibility: 0;\n}\n50%{\n    opacity: 0;\n    visibility: 0;\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n@keyframes fadeIn-data-v-5432f97e{\n0%{\n    opacity: 0;\n    visibility: 0;\n}\n50%{\n    opacity: 0;\n    visibility: 0;\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n\n/* Modal Peraturan */\n.rulesModal-bg[data-v-5432f97e]{\n  position: fixed;\n  background: none;\n  width: 100%;\n  height: 100vh;\n  top: -10%;\n  left: 0;\n  transform: translate(0, -50%);\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  visibility: hidden;\n  transition: visibility 0.5s, opacity 0.5s;\n}\n.rulesModal[data-v-5432f97e]{\n  display: grid;\n  grid-template-rows: 1fr;\n  position: relative;\n  background-color: rgba(0, 0, 0, 0.8);\n  padding: 40px 40px 40px 40px;\n  width: 80vw;\n  height: 70vh;\n  justify-content: center;\n  align-items: center;\n  overflow: auto;\n  white-space: pre-line;\n}\n.rulesModal h2[data-v-5432f97e]{\n  display: inline-block;\n  position: relative;\n  opacity: 1;\n  color: white;\n  text-align: center;\n  /* font-family: rubik-regular; */\n  font-size: calc(16px + 0.5vw);\n}\n.rulesModal p[data-v-5432f97e]{\n  display: inline-block;\n  position: relative;\n  opacity: 1;\n  color: white;\n  text-align: justify;\n  /* font-family: rubik-regular; */\n  font-size: calc(8px + 0.5vw);\n}\n.rulesModal img[data-v-5432f97e]{\n  display: block;\n  width: 10vw;\n  min-width: 65px;\n  opacity: 1;\n  position: relative;\n  cursor: pointer;\n  margin-left: auto;\n  margin-right: auto;\n  padding-bottom: 40px;\n}\n.rulesModalButton[data-v-5432f97e]{\n  background: none;\n  border: none;\n}\n.bgActive[data-v-5432f97e]{\n  visibility: visible;\n  top: 50%;\n  opacity: 1;\n  transition: 0.5s;\n}\n.bgInactive[data-v-5432f97e]{\n  visibility: hidden;\n  top: -50%;\n  opacity: 0;\n  transition: 0.5s;\n}\n.bg1[data-v-5432f97e]{\n    display: grid;\n    grid-template-rows: 1fr;\n    background: url(" + ___CSS_LOADER_URL_REPLACEMENT_0___ + ") no-repeat top center;\n    background-size: cover;\n}\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "bg1", attrs: { id: "home" } },
    [
      _c("loader"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "wrapperMain" },
        [
          _c("router-link", { attrs: { to: "/gamestart" } }, [
            _c("img", {
              staticClass: "playButton",
              attrs: { src: _vm.playImage },
              on: {
                mouseenter: function($event) {
                  _vm.playImage = _vm.assets.play2
                },
                mouseleave: function($event) {
                  _vm.playImage = _vm.assets.play1
                }
              }
            })
          ]),
          _vm._v(" "),
          _c("img", {
            staticClass: "rulesButton",
            attrs: { src: _vm.rulesImage },
            on: {
              mouseenter: function($event) {
                _vm.rulesImage = _vm.assets.rules2
              },
              mouseleave: function($event) {
                _vm.rulesImage = _vm.assets.rules1
              },
              click: _vm.activeModal
            }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "rulesModal-bg",
          class: { bgActive: _vm.isModalActive, bgInactive: !_vm.isModalActive }
        },
        [
          _c("div", { staticClass: "rulesModal" }, [
            _c("h2", [_vm._v("Peraturan Olimpiade")]),
            _vm._v(" "),
            _vm._m(1),
            _vm._v(" "),
            _c("img", {
              staticClass: "mt-7",
              attrs: { src: _vm.exitImage },
              on: {
                mouseenter: function($event) {
                  _vm.exitImage = _vm.assets.exit2
                },
                mouseleave: function($event) {
                  _vm.exitImage = _vm.assets.exit1
                },
                click: _vm.inactiveModal
              }
            })
          ])
        ]
      ),
      _vm._v(" "),
      _c("footer-mage")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wrapperLogo" }, [
      _c("img", {
        staticClass: "logo1",
        attrs: { src: __webpack_require__(/*! ../../assets/img/Game/logoolimpiade.png */ "./resources/js/assets/img/Game/logoolimpiade.png") }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "mt-9" }, [
      _c("ol", [
        _c("li", [_vm._v("Waktu pengerjaan soal adalah 120 menit atau 2 jam")]),
        _vm._v(" "),
        _c("li", [
          _vm._v(
            "Peserta dilarang bertanya apapun mengenai soal kepada panitia"
          )
        ]),
        _vm._v(" "),
        _c("li", [_vm._v("Peserta dilarang meretas website MAGE 6")]),
        _vm._v(" "),
        _c("li", [
          _vm._v(
            "Peserta yang terlambat dalam mengerjakan soal tidak akan mendapatkan tambahan waktu"
          )
        ]),
        _vm._v(" "),
        _c("li", [
          _vm._v("Peserta hanya diperbolehkan bekerja sama dengan anggota tim")
        ]),
        _vm._v(" "),
        _c("li", [
          _vm._v(
            "Jika terjadi kesalahan yang disebabkan oleh sistem maka peseta berhak mendapatkan tambahan waktu"
          )
        ]),
        _vm._v(" "),
        _c("li", [
          _vm._v(
            "Format jawaban yang diterima adalah sebagai berikut :\n            "
          ),
          _c("ul", [
            _c("li", [_vm._v("Angka desimal menggunakan titik. Contoh: 2.5")]),
            _vm._v(" "),
            _c("li", [_vm._v("Isian tidak menggunakan spasi")])
          ])
        ]),
        _vm._v(" "),
        _c("li", [
          _vm._v("Jika menemukan kendala teknis hubungi 082230469774 - adhisti")
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/assets/img/Game/bg1.png":
/*!**********************************************!*\
  !*** ./resources/js/assets/img/Game/bg1.png ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/bg1.png?32409163b29709a7656347675013c8a3";

/***/ }),

/***/ "./resources/js/assets/img/Game/logoolimpiade.png":
/*!********************************************************!*\
  !*** ./resources/js/assets/img/Game/logoolimpiade.png ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/logoolimpiade.png?99f10c4d54500acd99466282db760010";

/***/ }),

/***/ "./resources/js/assets/img/Game/play1.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/play1.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/play1.png?a2599c4e0dc5a8c1416343500cbdd06e";

/***/ }),

/***/ "./resources/js/assets/img/Game/play2.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/play2.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/play2.png?d85ce5adb923f35f7cad4d1b0ff95a06";

/***/ }),

/***/ "./resources/js/assets/img/Game/rules1.png":
/*!*************************************************!*\
  !*** ./resources/js/assets/img/Game/rules1.png ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/rules1.png?2974d84bb7885f7b31e91c6066d53019";

/***/ }),

/***/ "./resources/js/assets/img/Game/rules2.png":
/*!*************************************************!*\
  !*** ./resources/js/assets/img/Game/rules2.png ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/rules2.png?cf67cf62d4ac18d263fa4bfa28dae898";

/***/ }),

/***/ "./resources/js/views/penyisihanolim/MainMenu.vue":
/*!********************************************************!*\
  !*** ./resources/js/views/penyisihanolim/MainMenu.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MainMenu.vue?vue&type=template&id=5432f97e&scoped=true& */ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true&");
/* harmony import */ var _MainMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MainMenu.vue?vue&type=script&lang=js& */ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& */ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _MainMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5432f97e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/penyisihanolim/MainMenu.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./MainMenu.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&":
/*!*****************************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& ***!
  \*****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=style&index=0&id=5432f97e&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_style_index_0_id_5432f97e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./MainMenu.vue?vue&type=template&id=5432f97e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/MainMenu.vue?vue&type=template&id=5432f97e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainMenu_vue_vue_type_template_id_5432f97e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);