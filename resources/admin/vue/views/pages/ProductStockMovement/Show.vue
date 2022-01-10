<template>
  <v-row>
    <v-col xs="12" md="12" lg="12">
      <v-row class="container">
        <v-col cols="12">
          <h1 class="text-xl font-bold mb-8">
            Listagem de movimentos de estoque do SKU: <b class="text-blue">{{ sku }}</b>
          </h1>
          <v-card class="content-card" v-if="movements.length > 0">
            <v-card-title>
              <v-spacer></v-spacer>
              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Buscar"
                single-line
                hide-details
              ></v-text-field>
            </v-card-title>
            <v-data-table
              class="m-table"
              :headers="headers"
              :items="movements"
              :search="search"
              sort-by.sync="createdAt"
              sort-desc.sync="1"
              hide-default-footer
              :items-per-page="15"
              :loading="loading"
            >
              <template v-slot:item.amount="{ item }">
                <div v-if="item.amount" class="ml-2">
                  <i
                    v-if="item.operation === '+'"
                    class="fas fa-arrow-up text-green-600"
                  ></i>
                  <i
                    v-if="item.operation === '-'"
                    class="fas fa-arrow-down text-red-600"
                  ></i>
                  {{ item.amount }}
                </div>
              </template>
            </v-data-table>
          </v-card>
          <v-alert v-else type="warning">Nenhum movimento de estoque encontrado</v-alert>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";

export default {
    props: ['sku'],

  name: "ProductStockMovementShow",

  data() {
    return {
      movements: [],
      search: "",
      loading: true,
      headers: [
        { text: "Quantidade", value: "amount" },
        { text: "Executado em", value: "createdAt" },
      ],
    };
  },

  async beforeMount() {
    this.getListStockMovementOfSku();
  },

  methods: {
    async getListStockMovementOfSku() {
      this.loading = true;
      const { data } = await axios.get(
        `/api/sku/${this.sku}/stock-movements`
      );

      this.movements = data;
      this.loading = false;
    },
  },
};
</script>
