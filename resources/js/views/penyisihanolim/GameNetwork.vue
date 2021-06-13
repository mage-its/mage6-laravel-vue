<template>
  <div id="game-network">    
    <v-card color="rgba(0,0,0,.06)" class="mx-auto ml-sm-auto mr-sm-0 py-1" width="200px" style="position: absolute; top:10%; left:5%">
        <div class="text-center white--text">Timer</div>
        <div v-bind="user_time" class="white--text">                    
            {{ timerHour }} : {{ timerMinute }} : {{ timerSecond }}
        </div>
        <br>                
        <div class="white--text">
            Score
        </div>                    
        <div class="white--text"> 
          {{ user_score.score }}           
        </div>
    </v-card>    
    <network ref="network"
    id="network-container"
    :nodes="nodes"
    :edges="edges"
    :options="options"
    :events="['click', 'hoverNode']"    
    @click="onClick"    
    @hoverNode="onNodeHovered"
    >
    </network>    
  </div>
</template>

<script>
'use strict'

const axios = require('axios');
import { Network } from 'vue-vis-network';
import { DataSet } from 'vue-vis-network';
import { mapState } from 'vuex'; 

export default {
    name: 'GameNetwork',
    components: {
        Network
    },
    data: () => ({
      nodes: new DataSet(),
      edges: new DataSet(),
      options: {},
      user_soals: '',
      user_score: '',
      user_time: ''
    }),
    methods: {
      onClick(p){
        //nodediatasnya
        let arrayOfChildrens = this.$refs.network.getConnectedNodes(p["nodes"], 'to');
        let arrayOfParents = this.$refs.network.getConnectedNodes(p["nodes"], 'from');
        let hasil = [];
        
        hasil = arrayOfParents.concat(arrayOfChildrens);
        // hasil = arrayOfChildrens;

        let nodeId = p["nodes"];

        // console.log(p["nodes"]);
        // console.log(this.nodes._data[nodeId].group);        
        let group = this.nodes._data[nodeId].group;

        if(group == 'unlocked' ||group == 'unlocked_blue' || group == 'unlocked_yellow_1' || group == 'unlocked_yellow_2' || group == 'unlocked_red_1' || group == 'unlocked_red_2' || group == 'unlocked_king' || group == 'done_white' ||group == 'done_blue' || group == 'done_yellow_1' || group == 'done_yellow_2' || group == 'done_red_1' || group == 'done_red_2' || group == 'done_king'){          
          // this.$router.push("/showsoal/" + nodeId);
          // for (let index = 0; index < hasil.length; index++) {
          //   // console.log(hasil[index]);
          //   this.nodes.update({id: hasil[index], group:"semi_unlocked"});
          // }
          // if(nodeId[0] === 76){
          //   return this.$router.push("/showsoal/" + nodeId);                    
          // }
          return this.$router.push("/showsoal/" + nodeId +"/"+btoa("divcontainercard__mage"+hasil+"divcontainercard__mage"));                  
        }      
        else if(this.nodes._data[nodeId].group == 'semi_unlocked'){
          console.log(nodeId[0]);
          let harga = ""
          let point = "";
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
          if(confirm("Apakah anda yakin untuk membuka soal ini? Harga " + harga + " untuk mendapatkan score " + point)){                        
            axios.put('/unlocknode',{
                    no_soal: nodeId[0]
                    })
                    .then((response) => {
                      console.log(response.data);
                      if(response.data.success === 1){
                        alert("Berhasil membeli soal");
                        return this.$router.push("/showsoal/" + nodeId +"/"+btoa("divcontainercard__mage"+hasil+"divcontainercard__mage"));
                      }
                      else{
                        alert("Gagal membeli soal silahkan coba kembali");
                      }
                    })
          }
        }
        else{
          return alert("Soal Masih Terkunci");          
        }        
                      
      },
      getUserSoals(){
        return
        axios.get('/getallsoals')
				.then((response)=>{
					// console.log(response.data);
          this.user_soals = response.data
				})
      }
      // onNodeHovered(params){        
      //   this.$refs.network.canvas.body.container.style.cursor = 'pointer';
      //   // console.log("hoverNode Event:", params)
      // }
    },

    watch: {

        user_time: {
            handler(value) {

                if (value >= 0) {
                    setTimeout(() => {    
                        this.timerHour = Math.floor((value % (60 * 60 * 24)) / (60 * 60));
                        this.timerMinute = Math.floor((value % (60 * 60)) / (60));                                           
                        this.timerSecond = Math.floor((value % (60))); 
                        this.user_time--;                        
                    }, 1000);
                }
                else{
                    this.$router.push('/closed');                                        
                    // window.location.href="/closed";
                    window.location.reload();
                    
                }

            },
            // immediate: true // This ensures the watcher is triggered upon creation
        },        

    },

    created(){      
      // await axios.get('/getallsoals')
			// .then((response)=>{
			// 		// console.log(response.data);
      //   this.user_soals = response.data
                
      // })      
      // console.log("diluar then "+this.user_soals[0].correct); 
      console.log("test1");
      
      let nodes = new DataSet();
      let edges = new DataSet();

      let i = 1;
      let j = 1;
      let xx = 0;
      let yy = 50;

      //set nodes
      for (i; i < 77; i++) {
        // ganti layer
        if (
          i == 16 ||
          i == 31 ||
          i == 46 ||
          i == 58 ||
          i == 67 ||
          i == 73 ||
          i == 76
        ) {
          yy += -70;
          xx = 0;
        }

        // posisi unik layer 4
        if (i == 46) {
          xx += 50;
          yy += -40;
        }

        // posisi unik layer 5
        if (i == 58) {
          xx += 50;
          yy += -25;
        }

        // posisi unik layer 6
        if (i == 67) {
          xx += 275;
          yy += -70;
        }

        // posisi unik layer 6
        if (i == 73) {
          xx += 450;
          yy += -40;
        }

        // posisi unik king
        if (i == 76) {
          xx += 570;
          yy += -125;
        }

        ///////////////////////////// UNTUK CLASSIFY LAYER /////////////////////////////////
        // layer 1
        if (i < 16) {
          if (
            (i - 4) % 15 == 0 ||
            (i - 5) % 15 == 0 ||
            (i - 6) % 15 == 0 ||
            (i - 10) % 15 == 0 ||
            (i - 11) % 15 == 0 ||
            (i - 12) % 15 == 0
          ) {
            nodes.add({
              id: i,
              //label: "node " + i,
              fixed: true,
              x: xx,
              y: yy - 40,
              size: 20,
              shape: "image",
              image: require("../../assets/img/Game/white.png"),
              group: "unlocked",
              text: "not_answered"
            });
          } else
            nodes.add({
              id: i,
              //label: "node " + i,
              fixed: true,
              x: xx,
              y: yy,
              size: 20,
              shape: "image",
              image: require("../../assets/img/Game/white.png"),
              group: "unlocked",
              text: "not_answered"
            });
        }

        // layer 2
        else if (i < 31) {
          if (
            (i - 4) % 15 == 0 ||
            (i - 5) % 15 == 0 ||
            (i - 6) % 15 == 0 ||
            (i - 10) % 15 == 0 ||
            (i - 11) % 15 == 0 ||
            (i - 12) % 15 == 0
          ) {
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
          } else
            nodes.add({
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
        }

        // layer 3
        else if (i < 46) {
          if (
            (i - 4) % 15 == 0 ||
            (i - 5) % 15 == 0 ||
            (i - 6) % 15 == 0 ||
            (i - 10) % 15 == 0 ||
            (i - 11) % 15 == 0 ||
            (i - 12) % 15 == 0
          ) {
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
          } else
            nodes.add({
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
        }

        // layer 4
        else if (i < 58) {
          if (
            (i - 3) % 15 == 0 ||
            (i - 4) % 15 == 0 ||
            (i - 5) % 15 == 0 ||
            (i - 8) % 15 == 0 ||
            (i - 9) % 15 == 0 ||
            (i - 10) % 15 == 0
          ) {
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
          } else
            nodes.add({
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
        }

        // layer 5
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
          } else
            nodes.add({
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
        }

        // untuk distinguish spacing horizontal
        if (i < 46) xx += 80;
        else if (i < 58) xx += 90;
        else if (i < 66) xx += 84;
        else xx += 120;

        // untuk spacing horizontal tertentu
        if (((i - 5) % 15 == 0 || (i - 10) % 15 == 0) && i < 46) xx += 20;
        if (i == 49 || i == 53) xx += 30;
        if (i == 58 || i == 60 || i == 63 || i == 65) xx += 95;
      }

      /////////////////////////////////// EDGES //////////////////////////////////////////
      // edges 2 layer terbawah
      for (j; j < 31; j++) {
        if ((j - 1) % 5 == 0) {
          edges.add({ from: j, to: j + 15 });
          edges.add({ from: j, to: j + 16 });
          // back edges
          // edges.add({ from: j + 15, to: j });
          // edges.add({ from: j + 16, to: j });
        } else if (j % 5 == 0) {
          if (j > 19 && j % 15 != 0){
            edges.add({ from: j, to: j + 1 })
            // back edges
            // edges.add({ from: j+1, to: j })
          }
          edges.add({ from: j, to: j + 14 });
          edges.add({ from: j, to: j + 15 });
          // back edges
          // edges.add({ from: j + 14, to: j });
          // edges.add({ from: j + 15, to: j });
        } else {
          edges.add({ from: j, to: j + 14 });
          edges.add({ from: j, to: j + 15 });
          edges.add({ from: j, to: j + 16 });
          // back edges
          // edges.add({ from: j + 14, to: j });
          // edges.add({ from: j + 15, to: j });
          // edges.add({ from: j + 16, to: j });        
        }
      }

      // edges layer 3
      let up = 15;
      let up2 = 14;
      let up3 = 13;
      for (j; j < 46; j++) {
        // yang teredges dengan 1 node lain
        if (j == 31 || j == 36 || j == 40 || j == 45) {
          edges.add({ from: j, to: j + up });
          // back edges
          // edges.add({ from: j + up, to: j });
          up--;
        }

        // yang teredges dengan 2 node lain
        else if (
          j == 32 ||
          j == 35 ||
          j == 37 ||
          j == 38 ||
          j == 39 ||
          j == 41 ||
          j == 44
        ) {
          edges.add({ from: j, to: j + up2 });        
          edges.add({ from: j, to: j + up2 + 1 });
          // back edges
          // edges.add({ from: j + up2, to: j });        
          // edges.add({ from: j + up2 + 1, to: j });
          if (j == 32 || j == 41) up2--;
        }

        // yang teredges dengan 3 node lain
        else {
          edges.add({ from: j, to: j + up3 });
          edges.add({ from: j, to: j + up3 + 1 });
          edges.add({ from: j, to: j + up3 + 2 });
          // back edges
          // edges.add({ from: j + up3, to: j });
          // edges.add({ from: j + up3 + 1, to: j });
          // edges.add({ from: j + up3 + 2, to: j });
          if (j == 34) up3--;
        }
      }

      // edges layer 4
      up = 12;
      up2 = 11;
      up3 = 10;
      for (j; j < 58; j++) {
        // yang teredges dengan 1 node lain
        if (j == 46 || j == 50 || j == 53 || j == 57) {
          edges.add({ from: j, to: j + up });
          // back edges
          // edges.add({ from: j + up, to: j });
          if (j == 53){
            edges.add({ from: j, to: j + 1 });
            // back edges
            // edges.add({ from: j + 1, to: j })
          }
          up--;
        }

        // yang teredges dengan 2 node lain
        else if (j == 47 || j == 49 || j == 51 || j == 52 || j == 54 || j == 56) {
          edges.add({ from: j, to: j + up2 });
          edges.add({ from: j, to: j + up2 + 1 });
          // back edges
          // edges.add({ from: j + up2, to: j });
          // edges.add({ from: j + up2 + 1, to: j });

          if (j == 49){
            edges.add({ from: j, to: j + 1 });
            // backedges
            // edges.add({ from: j + 1, to: j })
          }

          if (j == 47 || j == 54) up2--;
        }

        // yang teredges dengan 3 node lain
        else if (j == 48 || j == 55) {
          edges.add({ from: j, to: j + up3 });
          edges.add({ from: j, to: j + up3 + 1 });
          edges.add({ from: j, to: j + up3 + 2 });
          // back edges
          // edges.add({ from: j + up3, to: j });
          // edges.add({ from: j + up3 + 1, to: j });
          // edges.add({ from: j + up3 + 2, to: j });
          up3--;
        }
      }

      // edges layer 5
      up = 9;
      up2 = 8;
      up3 = 10;
      for (j; j < 67; j++) {
        // yang teredges dengan 1 node lain
        if (j == 58 || j == 61 || j == 63 || j == 66) {
          edges.add({ from: j, to: j + up });
          // back edges
          // edges.add({ from: j + up, to: j });
          up--;
        }

        // yang teredges dengan 2 node lain
        else {
          edges.add({ from: j, to: j + up2 });
          edges.add({ from: j, to: j + up2 + 1 });
          // back edges
          // edges.add({ from: j + up2, to: j });
          // edges.add({ from: j + up2 + 1, to: j });
          if (j == 59 || j == 64) up2--;
        }
      }

      // edges layer 6
      up = 6;
      for (j; j < 73; j++) {
        edges.add({ from: j, to: j + up });
        // back edges
        // edges.add({ from: j + up, to: j });
        if (j % 2 == 1) up--;
      }

      // edges layer 7
      for (j; j < 76; j++) {
        edges.add({ from: j, to: 76 });
        // back edges (tidak perlu)            
        // console.log(j);
      }
      
      let options = {
        interaction: {
          zoomView: false,
          dragView: false,
          hover: false
        },
        nodes: {
          scaling: {
            min: 16,
            max: 100,
          },
          // shadow: {
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
            color: "rgb(0, 255  , 255)",
          },
        },
        physics: {
          barnesHut: { gravitationalConstant: -30000 },
          stabilization: { iterations: 2500 },
        },
        groups: {
          locked: {
            shape: "circularImage",
            image: require("../../assets/img/Game/locked.png"),
          },
          semi_unlocked:{
            shape: "circularImage",
            image: require("../../assets/img/Game/semi_unlocked.png")
          },
          done_white: {
            shape: "image",
            image: require("../../assets/img/Game/done_white.png"),
          },
          unlocked_blue: {
            shape: "image",
            image: require("../../assets/img/Game/blue.png"),
          },
          done_blue: {
            shape: "image",
            image: require("../../assets/img/Game/done_blue.png"),
          },
          unlocked_yellow_1: {
            shape: "image",
            image: require("../../assets/img/Game/yellow_1.png"),
          },
          done_yellow_1: {
            shape: "image",
            image: require("../../assets/img/Game/done_yellow_1.png"),
          },
          unlocked_yellow_2: {
            shape: "image",
            image: require("../../assets/img/Game/yellow_2.png"),
          },
          done_yellow_2: {
            shape: "image",
            image: require("../../assets/img/Game/done_yellow_2.png"),
          },
          unlocked_red_1: {
            shape: "image",
            image: require("../../assets/img/Game/red_1.png"),
          },
          done_red_1: {
            shape: "image",
            image: require("../../assets/img/Game/done_red_1.png"),
          },
          unlocked_red_2: {
            shape: "image",
            image: require("../../assets/img/Game/red_2.png"),
          },
          done_red_2: {
            shape: "image",
            image: require("../../assets/img/Game/done_red_2.png"),
          },
          unlocked_king: {
            shape: "image",
            image: require("../../assets/img/Game/king.png"),
          },
          done_king: {
            shape: "image",
            image: require("../../assets/img/Game/done_king.png"),
          },
        },
      };
      
      // console.log(nodes);
      //set to component
      this.nodes = nodes;
      this.edges = edges;
      this.options = options;            
    },
    async beforeMount(){
      await axios.get('/getallsoals')
			.then((response)=>{
					// console.log(response.data);        
        if(response.data.usersoals.length == 0){
          alert("Data soal anda belum tergenerate dengan benar");
          return this.$router.push('/mainmenu');  
        }
        else if(response.data.userscore.length == 0){
          alert("Data score anda belum tergenerate dengan benar");
          return this.$router.push('/mainmenu');  
        }
        else if(response.data.timediff.length == 0){
          alert("Data time anda belum tergenerate dengan benar");
          return this.$router.push('/mainmenu');  
        }
        this.user_soals = response.data.usersoals
        this.user_score = response.data.userscore
        this.user_time = response.data.timediff
      })
      .catch((e) =>{
        alert("Soal anda belum tergenerate dengan benar");
        this.$router.push('/login');
        window.location.reload();
      })      
      
      // console.log(this.user_soals);
      for(var i = 0; i < this.user_soals.length; i++){
        // console.log(this.user_soals[i].no_soal);
        this.nodes.update({id: this.user_soals[i].no_soal, group:this.user_soals[i].status});
      }      
    }            
}
</script>

<style scoped lang="scss">
#game-network {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#network-container {
  height: 100vh;
  // background-color: #360029;

  background-image: url('../../assets/img/Game/background3.png');
  background-position: center;
  background-size: cover;
}
.vis-network {
  outline: none;
}

</style>