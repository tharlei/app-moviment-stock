<template>
  <v-row>
    <v-col xs="12" md="12" lg="12">
      <v-card class="content-card p-4">
        <v-form ref="form">
          <v-container>
            <h1 class="text-xl font-bold mb-8">Movimentar estoque do SKU</h1>
            <v-row>
              <v-col lg="4" sm="12">
                <v-combobox
                  :items="skus"
                  label="Escolha um SKU"
                  outlined
                  v-model="productStockMovement.sku"
                  item-text="sku"
                  item-value="sku"
                  persistent-hint
                  single-line
                  return-object
                  clearable
                  required
                  :rules="[(v) => !!v || 'SKU é necessário']"
                ></v-combobox>
              </v-col>
              <v-col lg="4" sm="12">
                <v-text-field
                  label="Quantidade"
                  single-line
                  outlined
                  v-model="productStockMovement.amount"
                  :rules="[
                    (v) =>
                      !!v || 'Quantidade do movimento de estoque é necessário',
                  ]"
                  required
                ></v-text-field>
              </v-col>
              <v-col lg="4" sm="12">
                <v-checkbox
                  v-model="productStockMovement.is_add"
                  :label="
                    productStockMovement.is_add ? 'Incrementar' : 'Decrementar'
                  "
                  hide-details
                ></v-checkbox>
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
                  Movimentar
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
  name: "ProductStockMovementNew",

  data() {
    return {
      loading: false,
      skus: [],
      productStockMovement: {
        sku: null,
        amount: null,
        is_add: true,
      },
    };
  },

  async beforeMount() {
    this.getListAllSku();
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
        await axios.post("/api/product-stock-movements", {
          ...this.productStockMovement,
        });

        this.$swal({
          icon: "success",
          text: "Movimentado com sucesso",
          toast: true,
          position: "top-end",
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
        });

        this.$router.push("/admin/movimentos/estoque");
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

    async getListAllSku() {
      const { data } = await axios.get(`/admin/api/products/skus`);

      this.skus = data;
    },
  },
};
</script>

<style scoped>
.theme--light.v-btn.v-btn--has-bg {
  @apply bg-blue text-white;
}
</style>
