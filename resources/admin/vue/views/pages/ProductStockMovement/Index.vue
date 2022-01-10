<template>
  <v-row>
    <v-col xs="12" md="12" lg="12">
      <v-row class="container">
        <v-col cols="12">
          <h1 class="text-xl font-bold mb-8">
            Listagem de todos movimentos de estoque
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

              <template v-slot:item.movements="{ item }">
                <div v-if="item.sku">
                  <router-link
                    :to="`/admin/sku/${item.sku}/movimentos/estoque`"
                  >
                    <i class="fas fa-external-link-alt"></i>
                  </router-link>
                </div>
              </template>
            </v-data-table>

            <pagination
              align="center"
              :data="paginator"
              @pagination-change-page="getListStockMovement"
            ></pagination>
          </v-card>
          <v-alert v-else type="warning">Nenhum movimento de estoque encontrado</v-alert>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";
import pagination from "laravel-vue-pagination";

export default {
  name: "ProductStockMovementIndex",

  components: {
    pagination,
  },

  data() {
    return {
      movements: [],
      paginator: {},
      search: "",
      loading: true,
      headers: [
        { text: "SKU", value: "sku" },
        { text: "Quantidade", value: "amount" },
        { text: "Executado em", value: "createdAt" },
        { text: "Movimentos do SKU", value: "movements" }
      ],
    };
  },

  async beforeMount() {
    await this.getListStockMovement(1);
  },

  methods: {
    async getListStockMovement(page) {
      this.loading = true;
      const { data } = await axios.get(
        `/api/product-stock-movements`,
        {
          params: {
            page,
            paginator: true,
          },
        }
      );

      this.movements = data.items;
      this.paginator = data.paginator;
      this.loading = false;
    },
  },
};
</script>
