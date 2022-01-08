<template>
  <v-app id="inspire">
    <transition name="slide-fade">
      <component v-bind:is="layout"></component>
    </transition>
  </v-app>
</template>

<script>
import LayoutAdmin from './views/layouts/Admin.vue';
import LayoutLogin from './views/layouts/Login.vue';

export default {
  name: "App",

  components: {
    "layout-admin": LayoutAdmin,
    "layout-login": LayoutLogin,
  },

  props: {
    source: String,
  },

  computed: {
    layout() {
      if (["notFound", "login"].includes(this.$router.currentRoute.name)) {
        return "layout-login";
      }

      return "layout-admin";
    },
  },
};
</script>
