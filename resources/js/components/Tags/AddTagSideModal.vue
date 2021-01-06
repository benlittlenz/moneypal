<template>
  <section class="absolute inset-y-0 pl-16 max-w-full right-0 flex">
    <div class="w-screen h-full max-w-md">
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
              Tag Information
            </label>
          </div>
          <form class="h-full" @submit.prevent="create">
            <div class="">
              <div>
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
                          v-model="form.name"
                          id="name"
                          type="text"
                          required
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        />
                        <has-error :form="form" field="name" />
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
                    Tag Colour
                  </label>

                  <div class="max-w-sm mx-auto mt-2">
                    <div class="">
                      <div class="">
                        <div class="relative ml-3 mt-4">
                          <button
                            type="button"
                            v-on:click="isOpen = !isOpen"
                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: ${form.colorSelected}; color: white`"
                          >
                            <svg
                              class="w-6 h-6 fill-current"
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="none"
                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"
                              />
                              <path
                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"
                              />
                            </svg>
                          </button>

                          <div
                            v-if="isOpen"
                            class="origin-top-right absolute left-0 mt-2 w-40 rounded-md shadow-lg"
                          >
                            <div
                              class="rounded-md bg-white shadow-xs px-4 py-3"
                            >
                              <div class="flex flex-wrap -mx-2">
                                <div
                                  v-for="(color, index) in colors"
                                  :key="index"
                                >
                                  <div class="px-2">
                                    <template v-if="form.colorSelected === color">
                                      <div
                                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                        :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"
                                      ></div>
                                    </template>

                                    <template v-if="form.colorSelected != color">
                                      <div
                                        @click="
                                          form.colorSelected = color;
                                          isOpen = false;
                                        "
                                        role="checkbox"
                                        tabindex="0"
                                        :aria-checked="form.colorSelected"
                                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                        :style="`background: ${color};`"
                                      ></div>
                                    </template>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="absolute bottom-0 right-0 mr-6 mb-6 flex-shrink-0 px-4 py-4 space-x-4 flex justify-end"
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
    isOpen: false,
    colors: [
      "#2196F3",
      "#009688",
      "#9C27B0",
      "#FFEB3B",
      "#afbbc9",
      "#4CAF50",
      "#2d3748",
      "#f56565",
      "#ed64a6",
    ],
    form: new Form({
      name: "",
      description: "",
      colorSelected: "#2196F3"
    }),
  }),

  methods: {
    ...mapActions({
      createTag: "tags/createTag",
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
        const response = await this.createTag({
          data: {
            name: this.form.name,
            description: this.form.description,
            color: this.form.colorSelected.split('#')[1]
          },
        });

        console.log("RES: ", response);
        this.$emit("close-modal");
        if (response.data) {
          console.log("successfully created category!");
          Bus.$emit("flash-message", {
            type: "success",
            text: "Tag successfully created!",
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
