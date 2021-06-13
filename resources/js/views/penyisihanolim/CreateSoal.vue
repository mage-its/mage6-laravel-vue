<template>
<div>
  <v-form>
    <input type="hidden" name="_token" :value="csrf">
    <v-container>
      <v-row>
        <v-col
          cols="6"          
        >
          <v-text-field
            v-model="difficulty"            
            label="Difficulty"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="6"          
        >
          <v-text-field
            v-model="jenisSoal"            
            label="Jenis Soal"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="6"          
        >
          <v-text-field
            v-model="textSoal"            
            label="Text Soal"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="6"          
        >
          <v-text-field
            v-model="answerSoal"            
            label="Answer Soal"
            required
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row>
          <v-col cols="12">
               <v-btn @click="submit">submit</v-btn>
          </v-col>
      </v-row>
    </v-container>
  </v-form>

  <v-container class="mt-10">
      <v-row>
          <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="desserts"
                    :items-per-page="5"
                    class="elevation-1"
                ></v-data-table>
          </v-col>
      </v-row>
  </v-container>
</div>
</template>

<script>
const axios = require('axios');

export default {
    name: 'CreateSoal',
    data: () => ({
        difficulty: '',
        jenisSoal: '',
        textSoal: '',
        answerSoal: '',
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),        
        // table
        headers: [
        {
            text: 'Id',
            align: 'start',            
            value: 'id',
          },
          { text: 'Difficulty', value: 'difficulty' },
          { text: 'Jenis Soal', value: 'jenis_soal' },
          { text: 'Text Soal', value: 'text_soal' },
          { text: 'Answer Soal', value: 'answer_soal' }
        ],
        desserts: []



    }),
    
    methods:{
        submit(){
            axios.put('/submitsoal', {
                difficulty : this.difficulty,
                jenis_soal : this.jenisSoal,
                text_soal : this.textSoal,
                answer_soal : this.answerSoal
            })
            .then(res => {
                alert("success");
                this.desserts = res.data.laravel_soals;
                this.difficulty = '';
                this.textSoal = '';
                this.jenisSoal = '';
                this.answerSoal = '';
                console.log(res.data.laravel_soals); 
            })
            .catch(err => {
                alert("failed");
                console.error(err); 
            })        
        }
    }
}
</script>