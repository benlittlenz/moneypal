<template>
  <section class="absolute inset-y-0 pl-16 max-w-full right-0 flex">
    <div class="w-screen max-w-md">
      <div
        class="h-full divide-y divide-gray-200 flex flex-col bg-gray-50 shadow-xl px-4"
      >
        <div class="flex-1 h-0 overflow-y-auto">
          <header class="space-y-1 py-6 px-4 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
              <h2 class="text-xl leading-7 font-semibold text-gray-900">
                Create New Category
              </h2>
              <div class="h-7 flex items-center">
                <button
                  v-on:click="closeModal"
                  aria-label="Close panel"
                  class="text-indigo-200 hover:text-white transition ease-in-out duration-150"
                >
                  <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </header>
          <div class="mt-6 flex-1 flex flex-col justify-between bg-white">
            <label
              class="border-solid border-b border-gray-200 py-4 text-center block text-lg font-semi-bold leading-5 text-gray-400"
            >
              Category Information
            </label>
          </div>
          <form @submit.prevent="create">
            <div class="px-4 divide-y divide-gray-200 sm:px-6 bg-white">
              <div class="space-y-6 pt-6 pb-5">
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Display Name
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      v-model="form.display_name"
                      id="display_name"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="display_name" />
                  </div>
                </div>

                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Description
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      v-model="form.description"
                      id="description"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="description" />
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-8 pb-4 px-4 bg-white">
              <label
                class="border-solid border-b border-gray-200 py-4 text-center block text-lg font-semi-bold leading-5 text-gray-400"
              >
                Category Information
              </label>
              <div class="flex items-center mt-2 py-2">
                <div
                  class="flex justify-between items-center"
                  @click="
                    toggleIncomeActive = !toggleIncomeActive;
                    form.income = 1;
                  "
                >
                  <div
                    class="w-12 h-6 flex items-center bg-gray-300 rounded-full duration-300 ease-in-out"
                    :class="{ 'bg-green-400': toggleIncomeActive }"
                  >
                    <div
                      class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300 ease-in-out"
                      :class="{ 'translate-x-6': toggleIncomeActive }"
                    ></div>
                  </div>
                </div>
                <label for="toggle" class="px-4 text-xs text-gray-700"
                  >INCOME</label
                >
              </div>

              <div class="flex items-center mt-2 py-2">
                <div
                  class="flex justify-between items-center"
                  @click="
                    toggleBudgetActive = !toggleBudgetActive;
                    form.exclude_budget = 1;
                  "
                >
                  <div
                    class="w-12 h-6 flex items-center bg-gray-300 rounded-full duration-300 ease-in-out"
                    :class="{ 'bg-green-400': toggleBudgetActive }"
                  >
                    <div
                      class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300 ease-in-out"
                      :class="{ 'translate-x-6': toggleBudgetActive }"
                    ></div>
                  </div>
                </div>
                <label for="toggle" class="px-4 text-xs text-gray-700"
                  >EXCLUDE FROM BUDGET</label
                >
              </div>

              <div class="flex items-center mt-2 py-2">
                <div
                  class="flex justify-between items-center"
                  @click="
                    toggleTotalActive = !toggleTotalActive;
                    form.exclude_totals = 1;
                  "
                >
                  <div
                    class="w-12 h-6 flex items-center bg-gray-300 rounded-full duration-300 ease-in-out"
                    :class="{ 'bg-green-400': toggleTotalActive }"
                  >
                    <div
                      class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300 ease-in-out"
                      :class="{ 'translate-x-6': toggleTotalActive }"
                    ></div>
                  </div>
                </div>
                <label for="toggle" class="px-4 text-xs text-gray-700"
                  >EXCLUDE FROM TOTALS</label
                >
              </div>
            </div>
            <div
              class="flex-shrink-0 px-4 py-4 space-x-4 flex justify-end bg-white"
            >
              <span class="inline-flex rounded-md shadow-sm">
                <button
                  v-on:click="closeModal"
                  type="button"
                  class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
                >
                  Cancel
                </button>
              </span>
              <span class="inline-flex rounded-md shadow-sm">
                <button
                  type="submit"
                  class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                >
                  Save
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

export default {
  //props: ["account"],
  components: {
    vSelect,
  },
  data: () => ({
    toggleIncomeActive: false,
    toggleBudgetActive: false,
    toggleTotalActive: false,
    form: new Form({
      display_name: "",
      description: "",
      income: null,
      exclude_budget: null,
      exclude_totals: null,
    }),
  }),

    methods: {
    ...mapActions({
      createCategory: "categories/createCategory",
    }),
    closeModal: function () {
      console.log("clicked close");
      this.$emit("close-modal");
    },

    doStuff: function () {
      console.log("HEY");
    },

    async create() {
      console.log(this.form);
      try {
        const response = await this.createCategory({
          data: {
            display_name: this.form.display_name,
            description: this.form.description,
            income: this.form.income === null ? 0 : this.form.income,
            exclude_budget: this.form.exclude_budget === null ? 0 : this.form.exclude_budget,
            exclude_totals: this.form.exclude_totals === null ? 0 : this.form.exclude_totals,
          },
        });

        console.log("RES: ", response);
        this.$emit("close-modal");
        if (response.data) {
          console.log("successfully created category!");
          Bus.$emit("flash-message", {
            type: "success",
            text: "Category successfully created!",
          });
        }
      } catch (err) {
        console.log("ERROR: ", err);
      }
    },
  },



  // directives: {
  //   //ClickOutside
  // }
};
</script>
