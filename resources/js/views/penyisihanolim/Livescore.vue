<template>
    <v-container style="width: 100vw; height: 100vh">
        <v-row>
            <v-col cols="3">
                <v-btn @click="getScore">Refresh</v-btn>
            </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="items"
                    :items-per-page="5"
                    class="elevation-1"
                ></v-data-table>
          </v-col>
      </v-row>      
    </v-container>
</template>

<script>
const axios = require('axios');

export default {
    name: 'Livescore',    
    data: () => ({        
        difficulty: '',
        jenisSoal: '',
        textSoal: '',
        answerSoal: '',
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),        
        // table
        headers: [
        {
            text: 'timId',
            align: 'start',            
            value: 'id',
          },
          { text: 'No Peserta', value: 'no_peserta' },
          { text: 'Nama Tim', value: 'nama_tim' },          
          { text: 'Total Score', value: 'score' },
          
        ],
        items: [{

        }]
    }),
    
    created(){
        axios.get('getlivescore')
        .then(res => {
            this.items = res.data;
            console.log(res.data);
        })
        .catch(err => {
            console.log(err);
        })
    },

    methods:{
        getScore(){
            axios.get('getlivescore')
            .then(res => {
                this.items = res.data;
                console.log(res.data);
            })
            .catch(err => {
                console.log(err);
            })
        }
    }
}
</script>