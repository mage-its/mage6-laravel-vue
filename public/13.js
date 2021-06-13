(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[13],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
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
//
//
//
var axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'CreateSoal',
  data: function data() {
    return {
      difficulty: '',
      jenisSoal: '',
      textSoal: '',
      answerSoal: '',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      // table
      headers: [{
        text: 'Id',
        align: 'start',
        value: 'id'
      }, {
        text: 'Difficulty',
        value: 'difficulty'
      }, {
        text: 'Jenis Soal',
        value: 'jenis_soal'
      }, {
        text: 'Text Soal',
        value: 'text_soal'
      }, {
        text: 'Answer Soal',
        value: 'answer_soal'
      }],
      desserts: []
    };
  },
  methods: {
    submit: function submit() {
      var _this = this;

      axios.put('/submitsoal', {
        difficulty: this.difficulty,
        jenis_soal: this.jenisSoal,
        text_soal: this.textSoal,
        answer_soal: this.answerSoal
      }).then(function (res) {
        alert("success");
        _this.desserts = res.data.laravel_soals;
        _this.difficulty = '';
        _this.textSoal = '';
        _this.jenisSoal = '';
        _this.answerSoal = '';
        console.log(res.data.laravel_soals);
      })["catch"](function (err) {
        alert("failed");
        console.error(err);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
    [
      _c(
        "v-form",
        [
          _c("input", {
            attrs: { type: "hidden", name: "_token" },
            domProps: { value: _vm.csrf }
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
                    { attrs: { cols: "6" } },
                    [
                      _c("v-text-field", {
                        attrs: { label: "Difficulty", required: "" },
                        model: {
                          value: _vm.difficulty,
                          callback: function($$v) {
                            _vm.difficulty = $$v
                          },
                          expression: "difficulty"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-col",
                    { attrs: { cols: "6" } },
                    [
                      _c("v-text-field", {
                        attrs: { label: "Jenis Soal", required: "" },
                        model: {
                          value: _vm.jenisSoal,
                          callback: function($$v) {
                            _vm.jenisSoal = $$v
                          },
                          expression: "jenisSoal"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-col",
                    { attrs: { cols: "6" } },
                    [
                      _c("v-text-field", {
                        attrs: { label: "Text Soal", required: "" },
                        model: {
                          value: _vm.textSoal,
                          callback: function($$v) {
                            _vm.textSoal = $$v
                          },
                          expression: "textSoal"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-col",
                    { attrs: { cols: "6" } },
                    [
                      _c("v-text-field", {
                        attrs: { label: "Answer Soal", required: "" },
                        model: {
                          value: _vm.answerSoal,
                          callback: function($$v) {
                            _vm.answerSoal = $$v
                          },
                          expression: "answerSoal"
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-row",
                [
                  _c(
                    "v-col",
                    { attrs: { cols: "12" } },
                    [
                      _c("v-btn", { on: { click: _vm.submit } }, [
                        _vm._v("submit")
                      ])
                    ],
                    1
                  )
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
      _c(
        "v-container",
        { staticClass: "mt-10" },
        [
          _c(
            "v-row",
            [
              _c(
                "v-col",
                { attrs: { cols: "12" } },
                [
                  _c("v-data-table", {
                    staticClass: "elevation-1",
                    attrs: {
                      headers: _vm.headers,
                      items: _vm.desserts,
                      "items-per-page": 5
                    }
                  })
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/penyisihanolim/CreateSoal.vue":
/*!**********************************************************!*\
  !*** ./resources/js/views/penyisihanolim/CreateSoal.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CreateSoal.vue?vue&type=template&id=b1440528& */ "./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528&");
/* harmony import */ var _CreateSoal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CreateSoal.vue?vue&type=script&lang=js& */ "./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CreateSoal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/penyisihanolim/CreateSoal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateSoal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateSoal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateSoal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateSoal.vue?vue&type=template&id=b1440528& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/CreateSoal.vue?vue&type=template&id=b1440528&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateSoal_vue_vue_type_template_id_b1440528___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);