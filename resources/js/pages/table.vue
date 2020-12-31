<template>
  <div class="mt-20">
    <flash-message></flash-message>
    <div class="rounded-lg ">
      <button
        v-on:click="addTransaction = true"
        class="flex mr-2 focus:cursor-pointer focus:outline-none bg-purple-400 text-white py-2 px-4 rounded-lg font-bold"
      >
        <svg
          class="w-6 h-6 bg-purple-600 text-white rounded-full"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
          ></path>
        </svg>
        <span class="ml-2">Add Transaction</span>
      </button>
    </div>

    <div class="flex items-center mt-4">
      <div class="flex flex-1 pr-4">
        <div class="relative md:w-1/3">
          <input
            type="search"
            class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
            placeholder="Search..."
          />
          <div class="absolute top-0 left-0 inline-flex items-center p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 text-gray-400"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
          </div>
        </div>
      </div>
      <div>
        <button
          type="button"
          @click="open = !open"
          class="flex items-center text-gray-700 px-3 py-1 border font-medium rounded"
        >
          <svg
            viewBox="0 0 24 24"
            preserveAspectRatio="xMidYMid meet"
            class="w-5 h-5 mr-1"
          >
            <g class="">
              <path d="M0 0h24v24H0z" fill="none" class=""></path>
              <path
                d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z"
                class=""
              ></path>
            </g>
          </svg>
          Filter
        </button>
      </div>
    </div>

    <div class="bg-white rounded-sm shadow overflow-y-auto relative mt-2">
      {{ transactions.length }}
      <div v-if="transactions.length === 0">Loading...</div>
      <div v-else>
        <table
          class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative"
        >
          <thead>
            <tr class="text-left h-6">
              <th
                class="w-12 py-3 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"
              >
                <label
                  class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer"
                >
                  <input
                    type="checkbox"
                    class="form-checkbox focus:outline-none focus:shadow-outline"
                    @click="selectAllCheckbox($event)"
                  />
                </label>
              </th>
              <th
                class="max-w-md bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Date
              </th>
              <th
                class="w-2/12 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Category
              </th>
              <th
                class="w-2/12 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Payee
              </th>

              <th
                class="w-1/12 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Amount
              </th>
              <th
                class="w-3/12 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Notes
              </th>
              <th
                class="w-2/12 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Account
              </th>
              <th class="bg-gray-100 sticky top-0"></th>
              <th class="bg-gray-100 sticky top-0"></th>
            </tr>
          </thead>
          <tbody>
            <template>
              <tr
                v-for="transaction in transactions.data"
                :key="transaction.id"
                class="max-h-2"
                :class="
                  transaction.id === editing.id
                    ? ' border-solid border-2 border-pink-300'
                    : ''
                "
              >
                <td class="px-3">
                  <label
                    class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer"
                  >
                    <input
                      type="checkbox"
                      class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                    />
                  </label>
                </td>
                <template v-if="editing.id === transaction.id">
                  <td>
                    <date-picker type="date"></date-picker>
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.date
                    }}</span>
                  </td>
                </template>
                <template v-if="editing.id === transaction.id">
                  <td>
                    <v-select :options="options"></v-select>
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.account.account_name
                    }}</span>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td class="">
                    <div class="w-5/6 ml-1">
                      <input
                        class="py-2 pl-4 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        type="text"
                      />
                    </div>
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.payee
                    }}</span>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td>
                    <input
                      class="py-2 pl-4 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      type="decimal"
                      :value="transaction.amount"
                    />
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.amount
                    }}</span>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td>
                    <input
                      class="py-2 pl-4 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      type="decimal"
                      :value="transaction.notes"
                    />
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.notes
                    }}</span>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td>
                    <input
                      class="text-gray-700 px-4 py-1 flex items-center focus:outline-none"
                      type="text"
                      :value="transaction.account.account_type"
                    />
                  </td>
                </template>
                <template v-else>
                  <td class="border-solid border border-gray-200">
                    <span class="text-gray-700 px-6 py-1 flex items-center">{{
                      transaction.account.account_type
                    }}</span>
                  </td>
                </template>

                <template v-if="editing.id !== transaction.id">
                  <td class="border-solid border border-gray-200">
                    <a
                      href="#"
                      @click.prevent="update(transaction)"
                      v-if="editing.id !== transaction.id"
                    >
                      <svg
                        class="w-6 h-6 text-indigo-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                        ></path></svg
                    ></a>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td>
                    <div class="flex items-center">
                      <a href="#" @click.prevent="editing.id = null">
                        <svg
                          class="w-6 h-6 text-red-400"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                          ></path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </template>

                <template v-if="editing.id !== transaction.id">
                  <td class="border-solid border border-gray-200">
                    <svg
                      class="w-6 h-6 text-indigo-400"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"
                      ></path>
                    </svg>
                  </td>
                </template>

                <template v-if="editing.id === transaction.id">
                  <td>
                    <a href="#" @click.prevent="">
                      <svg
                        class="pl-2 w-8 h-8 text-green-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                      </svg>
                    </a>
                  </td>
                </template>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>

    <div v-if="addTransaction === true">
      <AddTransactionSideModal
        v-on:close-modal="closeModal"
        :categories="categories.data"
        :accounts="accounts.data"
      />
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

import AddTransactionSideModal from "../components/AddTransactionSideModal";

export default {
  data: () => ({
    loading: true,
    addTransaction: false,
    editing: {
      id: null,
      form: new Form({
        account_id: "",
        category: "",
        payee: "",
        amount: "",
        payee: "",
        notes: "",
        account: "",
      }),
    },
    options: ["foo", "bar", "baz"],
  }),
  components: {
    vSelect,
    DatePicker,
    AddTransactionSideModal,
  },

  mounted() {
    console.log("loaded");
    this.fetchTransactions();
  },

  computed: mapGetters({
    transactions: "transactions/transactions",
    categories: "categories/categories",
    accounts: "accounts/accounts",
  }),

  methods: {
    closeModal: function () {
      this.addTransaction = false;
    },
    selectAllCheckbox(event) {
      let columns = document.querySelectorAll(".rowCheckbox");

      let selectedRows = [];

      if (event.target.checked == true) {
        columns.forEach((column) => {
          column.checked = true;
          console.log(column);
          //selectedRows.push(parseInt(column.name));
        });
      } else {
        columns.forEach((column) => {
          column.checked = false;
        });
        selectedRows = [];
      }
      console.log(selectedRows);
    },

    async fetchTransactions() {
      //Fetch transactions
      await this.$store.dispatch("transactions/fetchTransactions");
      //Fetch Categories
      await this.$store.dispatch("categories/fetchCategories");
      //Fetch Accounts
      await this.$store.dispatch("accounts/fetchAccounts");
      this.loading = false;
      //this.transactions = transactions;
    },

    update(record) {
      console.log(record);
      this.editing.id = record.id;
    },
  },
};
</script>
