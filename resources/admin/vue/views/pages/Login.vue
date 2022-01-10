<template>
  <div
    class="
      h-screen
      overflow-hidden overflow-y-hidden
      container-login
      bg-gray
      text-white
    "
  >
    <v-row class="flex justify-center items-center">
      <v-col md="4" lg="7" class="hidden lg:block">
        <div
          id="background"
          class="
            h-screen
            bg-cover
            flex
            justify-center
            items-center
            flex-col
            w-full
            relative
          "
        >
          <h2 class="text-white z-50 text-5xl">Bem vindo</h2>

          <p class="mt-10 text-white opacity-80 z-50 text-base">
            Insira seus dados e faça login no gerencial
          </p>
        </div>
      </v-col>

      <v-col cols="12" xs="12" sm="12" md="4" lg="5">
        <div class="container login-container">
          <div class="flex justify-center">
            <img src="/assets/admin/images/logo.png" alt="Logo" class="w-40" />
          </div>

          <v-form ref="form">
            <div class="p-8 lg:px-28 lg:py-16">
              <v-text-field
                :rules="[(v) => !!v || 'E-mail obrigatório']"
                outlined
                v-model="user.email"
                label="E-mail"
                type="email"
                required
              ></v-text-field>

              <v-text-field
                class="l-field"
                v-model="user.password"
                :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                :rules="[(v) => !!v || 'Senha obrigatório']"
                :type="showPassword ? 'text' : 'password'"
                name="Senha"
                label="Senha"
                outlined
                @click:append="showPassword = !showPassword"
              ></v-text-field>
            </div>

            <div class="flex justify-center">
              <v-btn :disabled="loading" @click="handleSubmit">
                <span v-if="!loading">Entrar</span>
                <i v-else class="text-xl fas fa-spinner fa-pulse"></i>
              </v-btn>
            </div>
          </v-form>
        </div>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      showPassword: false,
      user: {
        password: "",
        email: "",
      },
    };
  },

  methods: {
    async handleSubmit() {
      if (!this.$refs.form.validate()) {
        return;
      }

      this.loading = true;

      try {
        location.href = "/admin";
      } catch (error) {
        console.log(error);
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
.theme--light.v-btn.v-btn--has-bg {
  @apply bg-blue text-white;
}

#background {
  background: url("/assets/admin/images/bg.jpeg") no-repeat;
}

#background::before {
  @apply absolute top-0 left-0 right-0 bottom-0 opacity-60 bg-purple;
  content: "";
}

#background h2 {
  line-height: 1.5;
  border-bottom: 0.5px solid #fff;
}

.v-text-field--outlined >>> fieldset {
  @apply border-white;
}

.v-text-field--outlined >>> input,
.v-text-field--outlined >>> label {
  @apply text-white;
}
</style>
