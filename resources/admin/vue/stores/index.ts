import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

import menu from './modules/menu/root';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    menu
  },

  plugins: [
    createPersistedState({
      paths: [],
    }),
  ],
});
