<template>
  <div id="game-network">
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

import { Network } from 'vue-vis-network';
import { DataSet } from 'vue-vis-network';

export default {
    name: 'GameNetwork',
    components: {
        Network
    },
    data: () => ({
      nodes: new DataSet(),
      edges: new DataSet(),
      options: {}
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

        // console.log(hasil);
        // console.log(this.nodes.get(nodeId));
        // console.log("posisi y " + this.nodes._data[nodeId].y);

        if(this.nodes._data[nodeId].group == 'unlocked'){          
          // this.$router.push("/showsoal/" + nodeId);
          for (let index = 0; index < hasil.length; index++) {
            // console.log(hasil[index]);
            this.nodes.update({id: hasil[index], group:"semi_unlocked"});
          }                    
        }      
        else if(this.nodes._data[nodeId].group == 'semi_unlocked'){
          confirm("Apakah anda yakin untuk membuka soal ini?")
          if(confirm){
            this.$router.push("/showsoal/"+nodeId);
          }
        }
        else{
          alert("Soal Masih Terkunci");
        }        
                      
      },
      onNodeHovered(params){        
        this.$refs.network.canvas.body.container.style.cursor = 'pointer';
        // console.log("hoverNode Event:", params)
      }
    },
    created(){
        let nodes = new DataSet();
        let edges = new DataSet();

        let i = 1;
        let id_layer1 = 1;
        let id_layer2 = 16;        
        let j = 1;
        // let xx = 0;
        // let yy = 50;

        var layer1_x = [0, 80, 160, 240, 320, 420, 500, 580, 660, 740, 840, 920, 1000, 1080, 1160];
        var layer1_y = [50, 50, 50, 10, 10, 10, 50, 50, 50, 10, 10, 10, 50, 50, 50];
        var layer2_x = [0, 80, 160, 240, 320, 420, 500, 580, 660, 740, 840, 920, 1000, 1080, 1160];
        var layer2_y = [-20, -20, -20, -60, -60, -60, -20, -20, -20, -60, -60, -60, -20, -20, -20];

        for(var it = 0; it < 15; it++){                        
            nodes.add({
                id: i,
                //label: "node " + i,
                fixed: true,
                x: layer1_x[it],
                y: layer1_y[it],
                size: 20,
                shape: "image",
                image: require("../../assets/img/Game/white.png"),
                group: "unlocked",
                text: "not_answered"
            });                       
            i++                                                                                          
        }
        

        for(var it = 0; it < 15; it++){
            nodes.add({
                id: i,
                //label: "node " + i,
                fixed: true,
                x: layer2_x[it],
                y: layer2_y[it],
                size: 25,
                shape: "image",
                image: "image/blue.png",
                group: "locked",
                text: "not_answered"
            });
            i++
        }

        // layer3
        var layer3_x = [0, 80, 160, 240, 320, 420, 500, 580, 660, 740, 840, 920, 1000, 1080, 1160];
        var layer3_y = [-90, -90, -90, -130, -130, -130, -90, -90, -90, -130, -130, -130, -90, -90, -90];

        for(var it = 0; it < 15; it++){
            nodes.add({
                id: i,
                //label: "node " + i,
                fixed: true,
                x: layer3_x[it],
                y: layer3_y[it],
                size: 25,
                shape: "image",
                image: "image/blue.png",
                group: "locked",
                text: "not_answered"
            });
            i++
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
            hover: true
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
            unlocked_blue: {
              shape: "image",
              image: require("../../assets/img/Game/blue.png"),
            },
            unlocked_yellow_1: {
              shape: "image",
              image: require("../../assets/img/Game/yellow_1.png"),
            },
            unlocked_yellow_2: {
              shape: "image",
              image: require("../../assets/img/Game/yellow_2.png"),
            },
            unlocked_red_1: {
              shape: "image",
              image: require("../../assets/img/Game/red_1.png"),
            },
            unlocked_red_2: {
              shape: "image",
              image: require("../../assets/img/Game/red_2.png"),
            },
            unlocked_king: {
              shape: "image",
              image: require("../../assets/img/Game/king.png"),
            },
          },
        };

        //set to component
        this.nodes = nodes;
        this.edges = edges;
        this.options = options;

    //   for(let i = 1; i <= 77; i++){
    //     console.log("Node ke " + i + " posisi x = " + this.nodes._data[i].x + " posisi y = " + this.nodes._data[i].y);
    //   }        
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
  /* background-color: #f5d300; */
  background-image: url('../../assets/img/Game/background.png');
  background-position: center;
  background-size: cover;
}
.vis-network {
  outline: none;
}

</style>