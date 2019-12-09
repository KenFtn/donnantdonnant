import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const get = function(url){
    axios(url, {
        credentials: 'same-origin',
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
        }
    })
}
/**
 *  {
 *      1: {
 *          id:1,
 *          name:'bidule',
 *          count:100,
 *          messages: [{
 *              id,
 *              ...             
 *  }]             
 * }
 * 
 * }
 * 
 * 
 */

export default new Vuex.Store({
    strict: true,
    state: {
        conversations: {}
    },
    actions: {
        loadConversations: function (context) {
            get('/api/conversations')
        }
    } 
})