'use strict'

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const axios = require('axios');
export default new Vuex.Store({
    state:{
        darkMode: false,
        safetyRouterOlimStart: false,
        safetyRouterOlimNetwork: false


    },
    mutations:{
        CHANGE_DARK_MODE: (state, status) => {
            state.darkMode = status;
        },
        GET_SOALS: (state, soals) => {
            // console.log(soals);
            return state.user_soals = soals;
        },
        CHANGE_SAFETY_ROUTER_START: (state, start) => {
            return state.safetyRouterOlimStart = start;
        },
        CHANGE_SAFETY_ROUTER_NETWORK: (state, network) => {
            return state.safetyRouterOlimNetwork = network;
        }

    },
    actions:{
        changeDarkMode({commit}, status){            
            commit('CHANGE_DARK_MODE', status);            
        },
        changeSafetyStart({commit}, status){            
            commit('CHANGE_SAFETY_ROUTER_START', status);            
        },
        changeSafetyNetwork({commit}, status){            
            commit('CHANGE_SAFETY_ROUTER_NETWORK', status);            
        }
        // getSoals({commit}){
        //     axios.get('/getallsoals')
        //         .then((response) => {
        //             // console.log(response.data);
        //             commit('GET_SOALS', response.data)
        //     }).catch(error => {
        //         throw new Error(`API ${error}`);
        //     });            
        // }
    },
    getters:{
        getDarkMode : state => {
            return state.darkMode
        },
        get_soals : state => {
            return  state.user_soals;
            // axios.get('/getallsoals')
            //     .then((response) => {
            //         console.log(response.data)
            // })
        },
        get_safetyrouterstart : state => {
            return  state.safetyRouterOlimStart;
        },
        get_safetyrouternetwork : state => {
            return  state.safetyRouterOlimNetwork;
        }
    }
})