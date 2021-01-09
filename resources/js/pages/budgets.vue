<template>
  <div class="mx-auto mt-20 w-10/12">
    <div class="">
      <div>
        <loading ref="loading" />

        <div>
          <div class="py-4 mb-32">
            <h2>{{ month_display }} - {{ year_display }}</h2>

            <month-picker @change="dateChange"></month-picker>
          </div>
          <table
            class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative"
          >
            <thead>
              <tr class="text-left h-6">
                <th
                  class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
                >
                  Category
                </th>
                <th
                  class="w-32 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
                >
                  This Month's Budget
                </th>
                <th
                  class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
                >
                  This Month's Spending
                </th>
                <th
                  class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
                >
                  Difference
                </th>
              </tr>
            </thead>
            <tbody>
              <template>
                <tr
                  v-for="budget in budgets"
                  :key="budget.budget_id"
                  class="max-h-2 hover:bg-gray-50 cursor-pointer"
                >
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      budget.display_name
                    }}</span>
                  </td>
                  <td class="border-solid border border-gray-200">
                    <div class="">
                      <input
                        @change="onBudgetAmountChange"
                        :value="budget.budgeted_amount"
                        :id="budget.budget_id"
                        type="decimal"
                        placeholder="Set a Budget"
                        class="text-gray-700 px-6 py-1 flex items-center border-2 border-transparent hover:border-red-200 focus:border-blue-500"
                      />
                    </div>
                  </td>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center"
                      >${{ budget.sum }}</span
                    >
                  </td>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center"
                      >${{ budget.budgeted_amount - budget.sum }}</span
                    >
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import moment from "moment";
import { MonthPicker } from "vue-month-picker";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

import Loading from "../components/Loading";

export default {
  data: () => ({
    loading: true,
    createCategory: false,
    editCategory: false,
    editing: {
      budget_id: null,
      budget_amount: null,
    },
    month: null,
    year: null,
    month_display: "",
    year_display: "",
  }),
  components: {
    vSelect,
    MonthPicker,
    Loading,
  },

  mounted() {
    console.log("loaded");
    this.fetchBudgets();
    this.$loading = this.$refs.loading;
  },

  computed: mapGetters({
    budgets: "budgets/budgets",
  }),

  methods: {
    ...mapActions({
      updateBudget: "budgets/updateBudget",
    }),

    closeModal() {},
    async fetchBudgets() {
      this.year = moment().year();
      this.month = moment().month() + 1;
      this.month_display = moment().format("MMMM");
      this.year_display = moment().format("YYYY");
      await this.$store.dispatch("budgets/fetchBudgets", {
        month: this.month,
        year: this.year,
      });
      this.loading = false;
    },

    updateCategory(record) {
      console.log(record);
      this.editCategory = true;
      this.category = record;
    },

    async dateChange(date) {
      console.log(date);
      this.year = date.year;
      this.month = ("0" + date.monthIndex).slice(-2);
      this.month_display = date.month;

      await this.$store.dispatch("budgets/fetchBudgets", {
        month: ("0" + date.monthIndex).slice(-2),
        year: date.year,
      });
    },
    async onBudgetAmountChange({ target }) {
      console.log("target: ", target);
      const budgetID = target.id;
      const budgetAmount = target.value;
      console.log("budget_id", budgetID);
      console.log("budget_amount", budgetAmount);

      const response = await this.updateBudget({
        data: {
          budget_id: budgetID,
          budget_amount: budgetAmount,
        },
      });
    },
  },
};
</script>
