(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[11],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
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


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'start',
  components: {
    Loader: _penyisihanolim_Loader_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    FooterMage: _penyisihanolim_Footer_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      assets: {
        back1: __webpack_require__(/*! ../../assets/img/Game/exit1.png */ "./resources/js/assets/img/Game/exit1.png"),
        back2: __webpack_require__(/*! ../../assets/img/Game/exit2.png */ "./resources/js/assets/img/Game/exit2.png"),
        start1: __webpack_require__(/*! ../../assets/img/Game/next1.png */ "./resources/js/assets/img/Game/next1.png"),
        start2: __webpack_require__(/*! ../../assets/img/Game/next2.png */ "./resources/js/assets/img/Game/next2.png")
      },
      backImage: undefined,
      startImage: undefined
    };
  },
  beforeMount: function beforeMount() {// document.body.classList.remove('bg1');
    // document.body.classList.add('bg');
  },
  created: function created() {
    this.backImage = this.assets.back1;
    this.startImage = this.assets.start1;
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
var ___CSS_LOADER_GET_URL_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/getUrl.js */ "./node_modules/css-loader/dist/runtime/getUrl.js");
var ___CSS_LOADER_URL_IMPORT_0___ = __webpack_require__(/*! ../../assets/img/Game/bg.png */ "./resources/js/assets/img/Game/bg.png");
exports = ___CSS_LOADER_API_IMPORT___(false);
var ___CSS_LOADER_URL_REPLACEMENT_0___ = ___CSS_LOADER_GET_URL_IMPORT___(___CSS_LOADER_URL_IMPORT_0___);
// Module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* Teks Cerita */\n.wrapperStart[data-v-28e81352]{\n  display: grid;\n  width: 100%;\n  justify-content: center;\n  align-items: center;\n  padding: 5% 15% 10% 15%\n}\n.wrapperStart h2[data-v-28e81352]{\n  color: white;\n  position: relative;\n  /* font-family: airstrike; */\n  font-size: calc(20px + 0.5vw);\n  text-align: center;\n  -webkit-animation: fadeInUp-data-v-28e81352 1s ease-in;\n          animation: fadeInUp-data-v-28e81352 1s ease-in;\n}\n.wrapperStart p[data-v-28e81352]{\n  color: white;\n  position: relative;\n  /* font-family: rubik-medium; */\n  font-size: calc(10px + 0.5vw);\n  text-align: justify;\n  -webkit-animation: fadeIn-data-v-28e81352 2s ease-in;\n          animation: fadeIn-data-v-28e81352 2s ease-in;\n}\n.wrapperStart div[data-v-28e81352]{\n  display: grid;\n  position: relative;\n  grid-template-columns: 1fr 1fr;\n  -webkit-animation: fadeIn-data-v-28e81352 2s ease-in;\n          animation: fadeIn-data-v-28e81352 2s ease-in;\n}\n.startButton[data-v-28e81352]{\n  position: relative;\n  width: 10vw;\n  min-width: 70px;\n  cursor: pointer;\n  float: right;\n}\n.backButton[data-v-28e81352]{\n  position: relative;\n  width: 10vw;\n  min-width: 70px;\n  cursor: pointer;\n  float: left;\n}\n@-webkit-keyframes fadeInUp-data-v-28e81352{\n0%{\n    opacity: 0;\n    visibility: 0;\n    transform: translateY(100%)\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n@keyframes fadeInUp-data-v-28e81352{\n0%{\n    opacity: 0;\n    visibility: 0;\n    transform: translateY(100%)\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n@-webkit-keyframes fadeIn-data-v-28e81352{\n0%{\n    opacity: 0;\n    visibility: 0;\n}\n50%{\n    opacity: 0;\n    visibility: 0;\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n@keyframes fadeIn-data-v-28e81352{\n0%{\n    opacity: 0;\n    visibility: 0;\n}\n50%{\n    opacity: 0;\n    visibility: 0;\n}\n100%{\n    opacity: 1;\n    visibility: 1;\n}\n}\n.bg[data-v-28e81352]{\n    display: grid;\n    grid-template-rows: 1fr;\n    background: url(" + ___CSS_LOADER_URL_REPLACEMENT_0___ + ") no-repeat top center;\n    background-size: cover;\n}\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "bg", attrs: { id: "start" } },
    [
      _c("loader"),
      _vm._v(" "),
      _c("div", { staticClass: "wrapperStart" }, [
        _c("h2", [_vm._v("\n      Cerita sejauh ini...\n    ")]),
        _vm._v(" "),
        _c("p", { staticClass: "mt-9" }, [
          _vm._v(
            "\n      Bumi semakin tua. Kiamat bisa datang kapan saja dengan kondisi bumi dan manusianya yang terus mengeksploitasi bumi. Kekacuan semakin merajalela. Kamu sudah lelah dengan keadaan ini. Dengan kepintaran dan bantuan teknologi, kamu mencari apakah ada planet lain pengganti bumi. Namun pencarian ini tidak mudah. Kamu harus mencari dengan benar karena tidak semua planet layak untuk ditinggali. Selain itu ada oknum tertentu yang terus menghalangimu untuk membuktikan bahwa kehidupan diluar bumi sangatlah mungkin. Apakah kamu akan berhasil menemukan planet yang layak?\n    "
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "mt-16" },
          [
            _c("router-link", { attrs: { to: "/mainmenu" } }, [
              _c("img", {
                staticClass: "backButton",
                attrs: { src: _vm.backImage },
                on: {
                  mouseenter: function($event) {
                    _vm.backImage = _vm.assets.back2
                  },
                  mouseleave: function($event) {
                    _vm.backImage = _vm.assets.back1
                  }
                }
              })
            ]),
            _vm._v(" "),
            _c("router-link", { attrs: { to: "/gamenetwork" } }, [
              _c("img", {
                staticClass: "startButton",
                attrs: { src: _vm.startImage },
                on: {
                  mouseenter: function($event) {
                    _vm.startImage = _vm.assets.start2
                  },
                  mouseleave: function($event) {
                    _vm.startImage = _vm.assets.start1
                  }
                }
              })
            ])
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("footer-mage")
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/assets/img/Game/bg.png":
/*!*********************************************!*\
  !*** ./resources/js/assets/img/Game/bg.png ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/bg.png?8e4d82861b75ffba91d942bd3ab4fd34";

/***/ }),

/***/ "./resources/js/assets/img/Game/next1.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/next1.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/next1.png?f2a3abfc03587ad3d5ec5f2d55a85eb1";

/***/ }),

/***/ "./resources/js/assets/img/Game/next2.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/next2.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/next2.png?3b3b0ceb30c3cd57e4e1db91a5b351c7";

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameStart.vue":
/*!*********************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameStart.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./GameStart.vue?vue&type=template&id=28e81352&scoped=true& */ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true&");
/* harmony import */ var _GameStart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./GameStart.vue?vue&type=script&lang=js& */ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& */ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _GameStart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "28e81352",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/penyisihanolim/GameStart.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameStart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& ***!
  \******************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=style&index=0&id=28e81352&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_style_index_0_id_28e81352_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameStart.vue?vue&type=template&id=28e81352&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameStart.vue?vue&type=template&id=28e81352&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameStart_vue_vue_type_template_id_28e81352_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);