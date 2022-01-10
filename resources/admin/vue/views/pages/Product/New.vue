<template>
  <v-row>
    <v-col xs="12" md="12" lg="12">
      <v-card class="content-card p-4">
        <v-form ref="form">
          <v-container>
            <h1 class="text-xl font-bold mb-8">Cadastro de produto</h1>
            <v-row>
              <v-col lg="4" sm="12">
                <v-text-field
                  label="Nome"
                  single-line
                  outlined
                  v-model="product.name"
                  :rules="[(v) => !!v || 'Nome do produto é necessário']"
                  required
                ></v-text-field>
              </v-col>
              <v-col lg="4" sm="12">
                <v-text-field
                  label="SKU"
                  single-line
                  outlined
                  v-model="product.sku"
                  :rules="[(v) => !!v || 'SKU do produto é necessário']"
                  required
                ></v-text-field>
              </v-col>
              <v-col lg="4" sm="12">
                <v-text-field
                  type="number"
                  label="Quantidade"
                  single-line
                  outlined
                  v-model="product.amount"
                  :rules="[(v) => !!v || 'Quantidade do produto é necessário']"
                  required
                ></v-text-field>
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12">
                <v-btn
                  class="ma-2"
                  :loading="loading"
                  :disabled="loading"
                  @click="handleSubmit"
                >
                  Salvar
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";

export default {
  name: "ProductNew",

  data() {
    return {
      loading: false,
      product: {
        name: null,
        sku: null,
        amount: null,
      },
    };
  },

  methods: {
    async handleSubmit() {
      if (!this.$refs.form.validate()) {
        this.$swal({
          icon: "error",
          text: "Formulário com erro",
          toast: true,
          position: "top-end",
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
        });
        return;
      }

      this.loading = true;

      try {
        await axios.post("/api/products", {
          ...this.product,
        });

        this.$swal({
          icon: "success",
          text: "Criado com sucesso",
          toast: true,
          position: "top-end",
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
        });

        this.$refs.form.reset();
      } catch ({ response }) {
        this.$swal({
          icon: "error",
          text: response.data,
          toast: true,
          position: "top-end",
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
        });
      } finally {
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
</style>
