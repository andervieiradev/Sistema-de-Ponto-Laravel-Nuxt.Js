<template>
  <transition>
      <div v-show="show" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" >
          <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="$emit('closeModal')"></div>

              <!-- This element is to trick the browser into centering the modal contents. -->
              <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

              <div class="relative inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg sm:w-full">
                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                      <div class="flex items-start">

                      <div class="mt-0 text-left w-full">
                          <h3 id="modal-title" class="text-lg leading-6 font-medium text-gray-900">{{ title }}</h3>
                          <div class="mt-2">
                              <slot></slot>
                          </div>
                      </div>
                      </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-row-reverse">
                      <button type="button" class="mt-3  inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="$emit('closeModal')">Fechar</button>
                  </div>
              </div>
          </div>
      </div>
  </transition>
</template>

<script>

    export default {
      props: {
        title: {
            type: String,
            default: '',
        },
        show: {
            type: Boolean,
            default: false
        }
      },
      emits: ['closeModal'],
    }
</script>


<style scoped>
    .v-enter-active,
    .v-leave-active {
        transition: opacity 0.2s ease;
    }

    .v-enter-from,
    .v-leave-to {
        opacity: 0;
    }
 </style>
