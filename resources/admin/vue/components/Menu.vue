<template>
  <v-navigation-drawer v-model="getMenu.menu" dark app>
    <div class="flex justify-center mt-8 mb-4">
      <router-link to="/admin">
        <img src="/assets/admin/images/logo.png" class="w-24" alt="icon" />
      </router-link>
    </div>

    <template>
      <v-list>
        <div>
          <v-list-item
            style="margin-top: 15px"
            v-for="item in menu"
            :key="item.title"
            @click="handleRedirect(item.redirect)"
          >
            <i :class="`mr-3 ${item.icon}`"></i>

            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item>
        </div>
      </v-list>
    </template>
  </v-navigation-drawer>
</template>

<script>
import { mapState } from "vuex";

export default {
  data() {
    return {
      menu: [
        {
          icon: "fas fa-tachometer-alt",
          title: "Dashboard",
          redirect: "/",
        },
        {
          icon: "fas fa-plus",
          title: "Cadastrar produto",
          redirect: "/produtos/cadastrar",
        },
        {
          icon: "fas fa-history",
          title: "Movimentos de estoque",
          redirect: "/movimentos/estoque",
        },

        {
          icon: "fas fa-box",
          title: "Movimentar estoque",
          redirect: "/movimentar/estoque",
        },
      ],
    };
  },

  methods: {
    handleRedirect(route) {
      this.$router.push(`/admin${route}`).catch((err) => {});
    },
  },

  computed: {
    ...mapState({
      getMenu: (state) => state.menu,
    }),
  },
};
</script>

<style scoped>
.theme--dark.v-navigation-drawer {
  @apply bg-gray;
}
</style>
