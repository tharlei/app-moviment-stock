<template>
  <div>
    <menu-admin />

    <v-app-bar app dark>
      <i
        @click.stop="setMenu"
        class="cursor-pointer text-lg fas fa-bars"
      ></i>

      <v-spacer />

      <div class="flex justify-end items-center">
        <v-btn icon>
          <v-icon class="text-dark-900">fa-user-circle</v-icon>
        </v-btn>

        <span class="px-2">Administrador</span>

        <v-menu offset-y flat>
          <template v-slot:activator="{ on }">
            <button
              style="outline: none"
              color="primary"
              class="pointer w-10"
              v-on="on"
            >
              <v-icon size="15">fa-ellipsis-v</v-icon>
            </button>
          </template>

          <v-list>
            <v-list-item v-for="(item, index) in items" :key="index">
              <v-list-item-title style="cursor: pointer" @click="handleExit">
                {{ item.title }}
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </div>
    </v-app-bar>

    <v-main>
      <v-container fluid class="flex">
        <v-row class="container">
          <router-view></router-view>
        </v-row>
      </v-container>
    </v-main>
  </div>
</template>

<script>
import Menu from "../../components/Menu";
import { mapActions } from "vuex";

export default {
  name: "LayoutAdmin",

  data() {
    return {
        items: [
            { title: "Sair" }
        ],
    };
  },

  components: {
    'menu-admin': Menu,
  },

  methods: {
    handleExit() {
      location.href = "/admin/entrar";
    },

    ...mapActions({
      setMenu: "setMenu",
    }),
  },
};
</script>

<style scoped>
.theme--dark.v-app-bar.v-toolbar.v-sheet {
    @apply bg-purple;
}
</style>
