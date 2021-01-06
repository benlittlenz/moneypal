<template>
  <div class="mx-auto mt-20 w-11/12">

    <div class="bg-white rounded-sm shadow overflow-y-auto relative mt-2">
      <div>
          gdhfghgf
        <!-- <table
          class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative"
        >
          <thead>
            <tr class="text-left h-6">
              <th
                class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Display Name
              </th>
              <th
                class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Description
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Income
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Exclude From Budget
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Exclude From Totals
              </th>
              <th
                class="w-4 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              ></th>
            </tr>
          </thead>
          <tbody>
            <template>
              <tr
                v-for="category in categories.data"
                :key="category.id"
                class="max-h-2 hover:bg-gray-50 cursor-pointer"
                v-on:click="updateCategory(category)"
              >
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    category.display_name
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    category.description
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <div class="flex flex-col justify-center items-center">
                    <span v-if="category.income !== 0">
                    <svg
                      class="w-6 h-6"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                      ></path>
                    </svg>
                  </span>
                  </div>

                </td>
                <td class="border-solid border border-gray-200">
                  <div class="flex flex-col justify-center items-center">
                    <span v-if="category.exclude_budget !== 0">
                    <svg
                      class="w-6 h-6"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                      ></path>
                    </svg>
                  </span>
                  </div>

                </td>

                <td class="border-solid border border-gray-200">
                  <div class="flex flex-col justify-center items-center">
                    <span v-if="category.exclude_totals !== 0">
                    <svg
                      class="w-6 h-6"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                      ></path>
                    </svg>
                  </span>
                  </div>

                </td>

                <td class="border-solid border border-gray-200">
                  <div class="flex flex-col justify-center items-center">
                    <span class="">
                      <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"
                        ></path>
                      </svg>
                    </span>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table> -->
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  data: () => ({
    loading: true,
    createCategory: false,
    editCategory: false,
    category: null,
  }),
  components: {
    vSelect,
    DatePicker,
  },

  mounted() {
    console.log("loaded");
    this.fetchBudgets('11/2021');
  },

  computed: mapGetters({
    budgets: "budgets/budgets",
  }),

  methods: {
    closeModal() {

    },

    async fetchBudgets() {
      //Fetch categories
      await this.$store.dispatch("budgets/fetchBudgets", {
          month: '11',
          year: '2021',
      });
      this.loading = false;
    },

    updateCategory(record) {
      console.log(record);
      this.editCategory = true;
      this.category = record;
      //this.editing.account = record;
      //   this.editing.form.date = new Date(record.date);
      //   this.editing.form.account_id = record.account.id
      //   this.editing.form.category_id = record.category.id
    },
  },
};
</script>
