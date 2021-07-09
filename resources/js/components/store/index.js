import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export const store = new Vuex.Store({
 state:{
        categoryItem:[],
},

mutations:{
    categoreis(state,data){
        return state.categoryItem = data
    },
},

actions:{
    allCategory(context){
        axios.get('http://localhost/blog/public/api/category')
            .then((response)=>{
                context.commit('categoreis',response.data)
            })
    }
},
    getters:{
        getCategory(state){
            return state.categoryItem
        }
    }

  })
