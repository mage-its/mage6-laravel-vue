(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_vis_network__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-vis-network */ "./node_modules/vue-vis-network/dist/vueVisNetwork.common.js");
/* harmony import */ var vue_vis_network__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_vis_network__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
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




function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");




/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'GameNetwork',
  components: {
    Network: vue_vis_network__WEBPACK_IMPORTED_MODULE_1__["Network"]
  },
  data: function data() {
    return {
      nodes: new vue_vis_network__WEBPACK_IMPORTED_MODULE_1__["DataSet"](),
      edges: new vue_vis_network__WEBPACK_IMPORTED_MODULE_1__["DataSet"](),
      options: {},
      user_soals: '',
      user_score: '',
      user_time: ''
    };
  },
  methods: {
    onClick: function onClick(p) {
      var _this = this;

      //nodediatasnya
      var arrayOfChildrens = this.$refs.network.getConnectedNodes(p["nodes"], 'to');
      var arrayOfParents = this.$refs.network.getConnectedNodes(p["nodes"], 'from');
      var hasil = [];
      hasil = arrayOfParents.concat(arrayOfChildrens); // hasil = arrayOfChildrens;

      var nodeId = p["nodes"]; // console.log(p["nodes"]);
      // console.log(this.nodes._data[nodeId].group);        

      var group = this.nodes._data[nodeId].group;

      if (group == 'unlocked' || group == 'unlocked_blue' || group == 'unlocked_yellow_1' || group == 'unlocked_yellow_2' || group == 'unlocked_red_1' || group == 'unlocked_red_2' || group == 'unlocked_king' || group == 'done_white' || group == 'done_blue' || group == 'done_yellow_1' || group == 'done_yellow_2' || group == 'done_red_1' || group == 'done_red_2' || group == 'done_king') {
        // this.$router.push("/showsoal/" + nodeId);
        // for (let index = 0; index < hasil.length; index++) {
        //   // console.log(hasil[index]);
        //   this.nodes.update({id: hasil[index], group:"semi_unlocked"});
        // }
        // if(nodeId[0] === 76){
        //   return this.$router.push("/showsoal/" + nodeId);                    
        // }
        return this.$router.push("/showsoal/" + nodeId + "/" + btoa("divcontainercard__mage" + hasil + "divcontainercard__mage"));
      } else if (this.nodes._data[nodeId].group == 'semi_unlocked') {
        console.log(nodeId[0]);
        var harga = "";
        var point = "";

        switch (true) {
          case nodeId[0] >= 16 && nodeId[0] <= 45:
            harga = 5;
            point = 10;
            break;

          case nodeId[0] >= 46 && nodeId[0] <= 66:
            harga = 12;
            point = 20;
            break;

          case nodeId[0] >= 67 && nodeId[0] <= 75:
            harga = 20;
            point = 30;
            break;

          case nodeId[0] === 76:
            harga = 0;
            point = "Lolos Semifinal";
            break;
        }

        if (confirm("Apakah anda yakin untuk membuka soal ini? Harga " + harga + " untuk mendapatkan score " + point)) {
          axios.put('/unlocknode', {
            no_soal: nodeId[0]
          }).then(function (response) {
            console.log(response.data);

            if (response.data.success === 1) {
              alert("Berhasil membeli soal");
              return _this.$router.push("/showsoal/" + nodeId + "/" + btoa("divcontainercard__mage" + hasil + "divcontainercard__mage"));
            } else {
              alert("Gagal membeli soal silahkan coba kembali");
            }
          });
        }
      } else {
        return alert("Soal Masih Terkunci");
      }
    },
    getUserSoals: function getUserSoals() {
      var _this2 = this;

      return;
      axios.get('/getallsoals').then(function (response) {
        // console.log(response.data);
        _this2.user_soals = response.data;
      });
    } // onNodeHovered(params){        
    //   this.$refs.network.canvas.body.container.style.cursor = 'pointer';
    //   // console.log("hoverNode Event:", params)
    // }

  },
  watch: {
    user_time: {
      handler: function handler(value) {
        var _this3 = this;

        if (value >= 0) {
          setTimeout(function () {
            _this3.timerHour = Math.floor(value % (60 * 60 * 24) / (60 * 60));
            _this3.timerMinute = Math.floor(value % (60 * 60) / 60);
            _this3.timerSecond = Math.floor(value % 60);
            _this3.user_time--;
          }, 1000);
        } else {
          this.$router.push('/closed'); // window.location.href="/closed";

          window.location.reload();
        }
      } // immediate: true // This ensures the watcher is triggered upon creation

    }
  },
  created: function created() {
    // await axios.get('/getallsoals')
    // .then((response)=>{
    // 		// console.log(response.data);
    //   this.user_soals = response.data
    // })      
    // console.log("diluar then "+this.user_soals[0].correct); 
    console.log("test1");
    var nodes = new vue_vis_network__WEBPACK_IMPORTED_MODULE_1__["DataSet"]();
    var edges = new vue_vis_network__WEBPACK_IMPORTED_MODULE_1__["DataSet"]();
    var i = 1;
    var j = 1;
    var xx = 0;
    var yy = 50; //set nodes

    for (i; i < 77; i++) {
      // ganti layer
      if (i == 16 || i == 31 || i == 46 || i == 58 || i == 67 || i == 73 || i == 76) {
        yy += -70;
        xx = 0;
      } // posisi unik layer 4


      if (i == 46) {
        xx += 50;
        yy += -40;
      } // posisi unik layer 5


      if (i == 58) {
        xx += 50;
        yy += -25;
      } // posisi unik layer 6


      if (i == 67) {
        xx += 275;
        yy += -70;
      } // posisi unik layer 6


      if (i == 73) {
        xx += 450;
        yy += -40;
      } // posisi unik king


      if (i == 76) {
        xx += 570;
        yy += -125;
      } ///////////////////////////// UNTUK CLASSIFY LAYER /////////////////////////////////
      // layer 1


      if (i < 16) {
        if ((i - 4) % 15 == 0 || (i - 5) % 15 == 0 || (i - 6) % 15 == 0 || (i - 10) % 15 == 0 || (i - 11) % 15 == 0 || (i - 12) % 15 == 0) {
          nodes.add({
            id: i,
            //label: "node " + i,
            fixed: true,
            x: xx,
            y: yy - 40,
            size: 20,
            shape: "image",
            image: __webpack_require__(/*! ../../assets/img/Game/white.png */ "./resources/js/assets/img/Game/white.png"),
            group: "unlocked",
            text: "not_answered"
          });
        } else nodes.add({
          id: i,
          //label: "node " + i,
          fixed: true,
          x: xx,
          y: yy,
          size: 20,
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/white.png */ "./resources/js/assets/img/Game/white.png"),
          group: "unlocked",
          text: "not_answered"
        });
      } // layer 2
      else if (i < 31) {
          if ((i - 4) % 15 == 0 || (i - 5) % 15 == 0 || (i - 6) % 15 == 0 || (i - 10) % 15 == 0 || (i - 11) % 15 == 0 || (i - 12) % 15 == 0) {
            nodes.add({
              id: i,
              //label: "node " + i,
              fixed: true,
              x: xx,
              y: yy - 40,
              size: 25,
              shape: "image",
              image: "image/blue.png",
              group: "locked",
              text: "not_answered"
            });
          } else nodes.add({
            id: i,
            //label: "node " + i,
            fixed: true,
            x: xx,
            y: yy,
            size: 25,
            shape: "image",
            image: "image/blue.png",
            group: "locked",
            text: "not_answered"
          });
        } // layer 3
        else if (i < 46) {
            if ((i - 4) % 15 == 0 || (i - 5) % 15 == 0 || (i - 6) % 15 == 0 || (i - 10) % 15 == 0 || (i - 11) % 15 == 0 || (i - 12) % 15 == 0) {
              nodes.add({
                id: i,
                //label: "node " + i,
                fixed: true,
                x: xx,
                y: yy - 40,
                size: 25,
                shape: "image",
                image: "image/blue.png",
                group: "locked",
                text: "not_answered"
              });
            } else nodes.add({
              id: i,
              //label: "node " + i,
              fixed: true,
              x: xx,
              y: yy,
              size: 25,
              shape: "image",
              image: "image/blue.png",
              group: "locked",
              text: "not_answered"
            });
          } // layer 4
          else if (i < 58) {
              if ((i - 3) % 15 == 0 || (i - 4) % 15 == 0 || (i - 5) % 15 == 0 || (i - 8) % 15 == 0 || (i - 9) % 15 == 0 || (i - 10) % 15 == 0) {
                nodes.add({
                  id: i,
                  //label: "node " + i,
                  fixed: true,
                  x: xx,
                  y: yy - 40,
                  size: 27,
                  shape: "image",
                  image: "image/yellow_1.png",
                  group: "locked",
                  text: "not_answered"
                });
              } else nodes.add({
                id: i,
                //label: "node " + i,
                fixed: true,
                x: xx,
                y: yy,
                size: 27,
                shape: "image",
                image: "image/yellow_1.png",
                group: "locked",
                text: "not_answered"
              });
            } // layer 5
            else if (i < 67) {
                if (i == 59 || i == 60 || i == 61 || i == 63 || i == 64 || i == 65) {
                  nodes.add({
                    id: i,
                    //label: "node " + i,
                    fixed: true,
                    x: xx,
                    y: yy - 25,
                    size: 27,
                    shape: "image",
                    image: "image/yellow_2.png",
                    group: "locked",
                    text: "not_answered"
                  });
                } else nodes.add({
                  id: i,
                  //label: "node " + i,
                  fixed: true,
                  x: xx,
                  y: yy,
                  size: 27,
                  shape: "image",
                  image: "image/yellow_2.png",
                  group: "locked",
                  text: "not_answered"
                });
              } else if (i < 73) {
                nodes.add({
                  id: i,
                  //label: "node " + i,
                  fixed: true,
                  x: xx,
                  y: yy,
                  size: 29,
                  shape: "image",
                  image: "image/red_1.png",
                  group: "locked",
                  text: "not_answered"
                });
              } else if (i < 76) {
                nodes.add({
                  id: i,
                  //label: "node " + i,
                  fixed: true,
                  x: xx,
                  y: yy,
                  size: 29,
                  shape: "image",
                  image: "image/red_2.png",
                  group: "locked",
                  text: "not_answered"
                });
              } else {
                nodes.add({
                  id: i,
                  //label: "node " + i,
                  fixed: true,
                  x: xx,
                  y: yy,
                  size: 75,
                  shape: "image",
                  image: "image/king.png",
                  group: "locked",
                  text: "not_answered"
                });
              } // untuk distinguish spacing horizontal


      if (i < 46) xx += 80;else if (i < 58) xx += 90;else if (i < 66) xx += 84;else xx += 120; // untuk spacing horizontal tertentu

      if (((i - 5) % 15 == 0 || (i - 10) % 15 == 0) && i < 46) xx += 20;
      if (i == 49 || i == 53) xx += 30;
      if (i == 58 || i == 60 || i == 63 || i == 65) xx += 95;
    } /////////////////////////////////// EDGES //////////////////////////////////////////
    // edges 2 layer terbawah


    for (j; j < 31; j++) {
      if ((j - 1) % 5 == 0) {
        edges.add({
          from: j,
          to: j + 15
        });
        edges.add({
          from: j,
          to: j + 16
        }); // back edges
        // edges.add({ from: j + 15, to: j });
        // edges.add({ from: j + 16, to: j });
      } else if (j % 5 == 0) {
        if (j > 19 && j % 15 != 0) {
          edges.add({
            from: j,
            to: j + 1
          }); // back edges
          // edges.add({ from: j+1, to: j })
        }

        edges.add({
          from: j,
          to: j + 14
        });
        edges.add({
          from: j,
          to: j + 15
        }); // back edges
        // edges.add({ from: j + 14, to: j });
        // edges.add({ from: j + 15, to: j });
      } else {
        edges.add({
          from: j,
          to: j + 14
        });
        edges.add({
          from: j,
          to: j + 15
        });
        edges.add({
          from: j,
          to: j + 16
        }); // back edges
        // edges.add({ from: j + 14, to: j });
        // edges.add({ from: j + 15, to: j });
        // edges.add({ from: j + 16, to: j });        
      }
    } // edges layer 3


    var up = 15;
    var up2 = 14;
    var up3 = 13;

    for (j; j < 46; j++) {
      // yang teredges dengan 1 node lain
      if (j == 31 || j == 36 || j == 40 || j == 45) {
        edges.add({
          from: j,
          to: j + up
        }); // back edges
        // edges.add({ from: j + up, to: j });

        up--;
      } // yang teredges dengan 2 node lain
      else if (j == 32 || j == 35 || j == 37 || j == 38 || j == 39 || j == 41 || j == 44) {
          edges.add({
            from: j,
            to: j + up2
          });
          edges.add({
            from: j,
            to: j + up2 + 1
          }); // back edges
          // edges.add({ from: j + up2, to: j });        
          // edges.add({ from: j + up2 + 1, to: j });

          if (j == 32 || j == 41) up2--;
        } // yang teredges dengan 3 node lain
        else {
            edges.add({
              from: j,
              to: j + up3
            });
            edges.add({
              from: j,
              to: j + up3 + 1
            });
            edges.add({
              from: j,
              to: j + up3 + 2
            }); // back edges
            // edges.add({ from: j + up3, to: j });
            // edges.add({ from: j + up3 + 1, to: j });
            // edges.add({ from: j + up3 + 2, to: j });

            if (j == 34) up3--;
          }
    } // edges layer 4


    up = 12;
    up2 = 11;
    up3 = 10;

    for (j; j < 58; j++) {
      // yang teredges dengan 1 node lain
      if (j == 46 || j == 50 || j == 53 || j == 57) {
        edges.add({
          from: j,
          to: j + up
        }); // back edges
        // edges.add({ from: j + up, to: j });

        if (j == 53) {
          edges.add({
            from: j,
            to: j + 1
          }); // back edges
          // edges.add({ from: j + 1, to: j })
        }

        up--;
      } // yang teredges dengan 2 node lain
      else if (j == 47 || j == 49 || j == 51 || j == 52 || j == 54 || j == 56) {
          edges.add({
            from: j,
            to: j + up2
          });
          edges.add({
            from: j,
            to: j + up2 + 1
          }); // back edges
          // edges.add({ from: j + up2, to: j });
          // edges.add({ from: j + up2 + 1, to: j });

          if (j == 49) {
            edges.add({
              from: j,
              to: j + 1
            }); // backedges
            // edges.add({ from: j + 1, to: j })
          }

          if (j == 47 || j == 54) up2--;
        } // yang teredges dengan 3 node lain
        else if (j == 48 || j == 55) {
            edges.add({
              from: j,
              to: j + up3
            });
            edges.add({
              from: j,
              to: j + up3 + 1
            });
            edges.add({
              from: j,
              to: j + up3 + 2
            }); // back edges
            // edges.add({ from: j + up3, to: j });
            // edges.add({ from: j + up3 + 1, to: j });
            // edges.add({ from: j + up3 + 2, to: j });

            up3--;
          }
    } // edges layer 5


    up = 9;
    up2 = 8;
    up3 = 10;

    for (j; j < 67; j++) {
      // yang teredges dengan 1 node lain
      if (j == 58 || j == 61 || j == 63 || j == 66) {
        edges.add({
          from: j,
          to: j + up
        }); // back edges
        // edges.add({ from: j + up, to: j });

        up--;
      } // yang teredges dengan 2 node lain
      else {
          edges.add({
            from: j,
            to: j + up2
          });
          edges.add({
            from: j,
            to: j + up2 + 1
          }); // back edges
          // edges.add({ from: j + up2, to: j });
          // edges.add({ from: j + up2 + 1, to: j });

          if (j == 59 || j == 64) up2--;
        }
    } // edges layer 6


    up = 6;

    for (j; j < 73; j++) {
      edges.add({
        from: j,
        to: j + up
      }); // back edges
      // edges.add({ from: j + up, to: j });

      if (j % 2 == 1) up--;
    } // edges layer 7


    for (j; j < 76; j++) {
      edges.add({
        from: j,
        to: 76
      }); // back edges (tidak perlu)            
      // console.log(j);
    }

    var options = {
      interaction: {
        zoomView: false,
        dragView: false,
        hover: false
      },
      nodes: {
        scaling: {
          min: 16,
          max: 100
        } // shadow: {
        //   enabled: true,
        //   color: 'white',
        //   size: 15,
        //   x:0,
        //   y:0
        // }

      },
      edges: {
        width: 4,
        smooth: false,
        color: {
          color: "rgb(0, 255  , 255)"
        }
      },
      physics: {
        barnesHut: {
          gravitationalConstant: -30000
        },
        stabilization: {
          iterations: 2500
        }
      },
      groups: {
        locked: {
          shape: "circularImage",
          image: __webpack_require__(/*! ../../assets/img/Game/locked.png */ "./resources/js/assets/img/Game/locked.png")
        },
        semi_unlocked: {
          shape: "circularImage",
          image: __webpack_require__(/*! ../../assets/img/Game/semi_unlocked.png */ "./resources/js/assets/img/Game/semi_unlocked.png")
        },
        done_white: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_white.png */ "./resources/js/assets/img/Game/done_white.png")
        },
        unlocked_blue: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/blue.png */ "./resources/js/assets/img/Game/blue.png")
        },
        done_blue: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_blue.png */ "./resources/js/assets/img/Game/done_blue.png")
        },
        unlocked_yellow_1: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/yellow_1.png */ "./resources/js/assets/img/Game/yellow_1.png")
        },
        done_yellow_1: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_yellow_1.png */ "./resources/js/assets/img/Game/done_yellow_1.png")
        },
        unlocked_yellow_2: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/yellow_2.png */ "./resources/js/assets/img/Game/yellow_2.png")
        },
        done_yellow_2: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_yellow_2.png */ "./resources/js/assets/img/Game/done_yellow_2.png")
        },
        unlocked_red_1: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/red_1.png */ "./resources/js/assets/img/Game/red_1.png")
        },
        done_red_1: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_red_1.png */ "./resources/js/assets/img/Game/done_red_1.png")
        },
        unlocked_red_2: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/red_2.png */ "./resources/js/assets/img/Game/red_2.png")
        },
        done_red_2: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_red_2.png */ "./resources/js/assets/img/Game/done_red_2.png")
        },
        unlocked_king: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/king.png */ "./resources/js/assets/img/Game/king.png")
        },
        done_king: {
          shape: "image",
          image: __webpack_require__(/*! ../../assets/img/Game/done_king.png */ "./resources/js/assets/img/Game/done_king.png")
        }
      }
    }; // console.log(nodes);
    //set to component

    this.nodes = nodes;
    this.edges = edges;
    this.options = options;
  },
  beforeMount: function beforeMount() {
    var _this4 = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      var i;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return axios.get('/getallsoals').then(function (response) {
                // console.log(response.data);        
                if (response.data.usersoals.length == 0) {
                  alert("Data soal anda belum tergenerate dengan benar");
                  return _this4.$router.push('/mainmenu');
                } else if (response.data.userscore.length == 0) {
                  alert("Data score anda belum tergenerate dengan benar");
                  return _this4.$router.push('/mainmenu');
                } else if (response.data.timediff.length == 0) {
                  alert("Data time anda belum tergenerate dengan benar");
                  return _this4.$router.push('/mainmenu');
                }

                _this4.user_soals = response.data.usersoals;
                _this4.user_score = response.data.userscore;
                _this4.user_time = response.data.timediff;
              })["catch"](function (e) {
                alert("Soal anda belum tergenerate dengan benar");

                _this4.$router.push('/login');

                window.location.reload();
              });

            case 2:
              // console.log(this.user_soals);
              for (i = 0; i < _this4.user_soals.length; i++) {
                // console.log(this.user_soals[i].no_soal);
                _this4.nodes.update({
                  id: _this4.user_soals[i].no_soal,
                  group: _this4.user_soals[i].status
                });
              }

            case 3:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/sass-loader/dist/cjs.js??ref--7-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
var ___CSS_LOADER_GET_URL_IMPORT___ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/getUrl.js */ "./node_modules/css-loader/dist/runtime/getUrl.js");
var ___CSS_LOADER_URL_IMPORT_0___ = __webpack_require__(/*! ../../assets/img/Game/background3.png */ "./resources/js/assets/img/Game/background3.png");
exports = ___CSS_LOADER_API_IMPORT___(false);
var ___CSS_LOADER_URL_REPLACEMENT_0___ = ___CSS_LOADER_GET_URL_IMPORT___(___CSS_LOADER_URL_IMPORT_0___);
// Module
exports.push([module.i, "#game-network[data-v-72ec22e3] {\n  font-family: Avenir, Helvetica, Arial, sans-serif;\n  -webkit-font-smoothing: antialiased;\n  -moz-osx-font-smoothing: grayscale;\n  text-align: center;\n  color: #2c3e50;\n}\n#network-container[data-v-72ec22e3] {\n  height: 100vh;\n  background-image: url(" + ___CSS_LOADER_URL_REPLACEMENT_0___ + ");\n  background-position: center;\n  background-size: cover;\n}\n.vis-network[data-v-72ec22e3] {\n  outline: none;\n}", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/sass-loader/dist/cjs.js??ref--7-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../node_modules/css-loader/dist/cjs.js!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--7-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--7-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& */ "./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
    { attrs: { id: "game-network" } },
    [
      _c(
        "v-card",
        {
          staticClass: "mx-auto ml-sm-auto mr-sm-0 py-1",
          staticStyle: { position: "absolute", top: "10%", left: "5%" },
          attrs: { color: "rgba(0,0,0,.06)", width: "200px" }
        },
        [
          _c("div", { staticClass: "text-center white--text" }, [
            _vm._v("Timer")
          ]),
          _vm._v(" "),
          _c(
            "div",
            _vm._b({ staticClass: "white--text" }, "div", _vm.user_time, false),
            [
              _vm._v(
                "                    \n          " +
                  _vm._s(_vm.timerHour) +
                  " : " +
                  _vm._s(_vm.timerMinute) +
                  " : " +
                  _vm._s(_vm.timerSecond) +
                  "\n      "
              )
            ]
          ),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c("div", { staticClass: "white--text" }, [
            _vm._v("\n          Score\n      ")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "white--text" }, [
            _vm._v(
              " \n        " +
                _vm._s(_vm.user_score.score) +
                "           \n      "
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c("network", {
        ref: "network",
        attrs: {
          id: "network-container",
          nodes: _vm.nodes,
          edges: _vm.edges,
          options: _vm.options,
          events: ["click", "hoverNode"]
        },
        on: { click: _vm.onClick, hoverNode: _vm.onNodeHovered }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/assets/img/Game/background3.png":
/*!******************************************************!*\
  !*** ./resources/js/assets/img/Game/background3.png ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/background3.png?444fd60fb7899cd8e66d9936221f1f76";

/***/ }),

/***/ "./resources/js/assets/img/Game/blue.png":
/*!***********************************************!*\
  !*** ./resources/js/assets/img/Game/blue.png ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/blue.png?d664c77e1ceea600666d488729b02991";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_blue.png":
/*!****************************************************!*\
  !*** ./resources/js/assets/img/Game/done_blue.png ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_blue.png?cc54cddede0cd7a022b4615ddcc5f71e";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_king.png":
/*!****************************************************!*\
  !*** ./resources/js/assets/img/Game/done_king.png ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_king.png?a69d05234534b525fcc9cf5d08f5372d";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_red_1.png":
/*!*****************************************************!*\
  !*** ./resources/js/assets/img/Game/done_red_1.png ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_red_1.png?7349a84a8536ac4ab0bdb8d3213b50bf";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_red_2.png":
/*!*****************************************************!*\
  !*** ./resources/js/assets/img/Game/done_red_2.png ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_red_2.png?9c8c1d1cca489260cbcf735faff64425";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_white.png":
/*!*****************************************************!*\
  !*** ./resources/js/assets/img/Game/done_white.png ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_white.png?955d2640475384bb7725df4b32e3c6a3";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_yellow_1.png":
/*!********************************************************!*\
  !*** ./resources/js/assets/img/Game/done_yellow_1.png ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_yellow_1.png?eed624c0a8c95cd4957bfbb7b979e70e";

/***/ }),

/***/ "./resources/js/assets/img/Game/done_yellow_2.png":
/*!********************************************************!*\
  !*** ./resources/js/assets/img/Game/done_yellow_2.png ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/done_yellow_2.png?0c51a12902a609a2324e2d4435164a56";

/***/ }),

/***/ "./resources/js/assets/img/Game/king.png":
/*!***********************************************!*\
  !*** ./resources/js/assets/img/Game/king.png ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/king.png?dd186e901d0c70718aa59fb1478bc366";

/***/ }),

/***/ "./resources/js/assets/img/Game/locked.png":
/*!*************************************************!*\
  !*** ./resources/js/assets/img/Game/locked.png ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/locked.png?9dca16a71c55e1852c875ccfe46bf2ef";

/***/ }),

/***/ "./resources/js/assets/img/Game/red_1.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/red_1.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/red_1.png?6e21d9c9700aebb8724c7fbeafdbe007";

/***/ }),

/***/ "./resources/js/assets/img/Game/red_2.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/red_2.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/red_2.png?649feabc55fcfb296f22664cbec791ed";

/***/ }),

/***/ "./resources/js/assets/img/Game/semi_unlocked.png":
/*!********************************************************!*\
  !*** ./resources/js/assets/img/Game/semi_unlocked.png ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/semi_unlocked.png?0dbe160f08e5cb0c2289cf9dab84cfa0";

/***/ }),

/***/ "./resources/js/assets/img/Game/white.png":
/*!************************************************!*\
  !*** ./resources/js/assets/img/Game/white.png ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/white.png?1a06f47de05d50810b78aa4a67f390c0";

/***/ }),

/***/ "./resources/js/assets/img/Game/yellow_1.png":
/*!***************************************************!*\
  !*** ./resources/js/assets/img/Game/yellow_1.png ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/yellow_1.png?f865892ec2f0861e4659c136c36ba247";

/***/ }),

/***/ "./resources/js/assets/img/Game/yellow_2.png":
/*!***************************************************!*\
  !*** ./resources/js/assets/img/Game/yellow_2.png ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/yellow_2.png?df255e6e6b45c87b6e76ff581d3d49f1";

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameNetwork.vue":
/*!***********************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameNetwork.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true& */ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true&");
/* harmony import */ var _GameNetwork_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./GameNetwork.vue?vue&type=script&lang=js& */ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& */ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _GameNetwork_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "72ec22e3",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/penyisihanolim/GameNetwork.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameNetwork.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&":
/*!*********************************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& ***!
  \*********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--7-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--7-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=style&index=0&id=72ec22e3&scoped=true&lang=scss&");
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_sass_loader_dist_cjs_js_ref_7_3_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_style_index_0_id_72ec22e3_scoped_true_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/penyisihanolim/GameNetwork.vue?vue&type=template&id=72ec22e3&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GameNetwork_vue_vue_type_template_id_72ec22e3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);