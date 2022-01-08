<template>
  <div class="h-screen overflow-hidden overflow-y-hidden container-login bg-gray text-white">
    <v-row class="content-login">
      <v-col md="4" lg="7" class="hidden lg:block">
        <div id="background" class="h-screen">
          <h2>Bem vindo</h2>

          <p>Insira seus dados e faça login no gerencial</p>
        </div>
      </v-col>

      <v-col cols="12" xs="12" sm="12" md="4" lg="5">
        <div class="container login-container">
          <div class="flex justify-center wrapper-image-container">
            <img src="/assets/admin/images/logo.png" alt="Logo" class="w-36" />
          </div>

          <v-form ref="form">
            <div class="p-8 lg:p-24">
              <v-text-field
                :rules="[(v) => !!v || 'E-mail obrigatório']"
                outlined
                v-model="user.email"
                label="Email"
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
              <v-btn
                :loading="loading"
                :disabled="loading"
                @click="handleSubmit"
              >
                Entrar
                <template v-slot:loader>
                  <span class="custom-loader">
                    <v-icon light>cached</v-icon>
                  </span>
                </template>
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
        this.$router.push("/admin");
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
.wrapper-image-container img {
  width: 150px;
}

.content-login {
  display: flex;
  justify-content: center;
  align-items: center;
}


#background {
  position: relative;
  width: 100%;
  height: 100vh;
  background: url("/assets/admin/images/bg.jpeg") no-repeat;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

#background::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(188, 149, 251, 0.6);
}

.left-side {
  padding: 0px;
}

#background h2 {
  color: #fff !important;
  z-index: 999;
  font-size: 50px;
  border-bottom: 0.5px solid #fff;
}

#background p {
  margin-top: 40px;
  color: #fafafa !important;
  opacity: 0.8;
  font-size: 16px;
  z-index: 999;
}

@media (max-width: 600px) {
  .wrapper-btn-login {
    margin-top: 10px;
  }
}
</style>
