<template>
    <div
      v-if="message" class="flex p-4 mb-4  rounded-lg" role="alert"
      :class="`bg-${type}`">


      <svg
        v-if="type == 'success'"
        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-6 h-5 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
        :class="`icon-${type}`">
          <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
      </svg>

        <svg
          v-if="type == 'info'" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-6 h-5 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
          :class="`icon-${type}`">
            <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
        </svg>

        <svg
          v-if="type == 'error'" class="w-6 h-5 mr-2 fill-current" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
          :class="`icon-${type}`">
            <path  fill-rule="evenodd"  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z" clip-rule="evenodd"></path>
        </svg>

        <div
          class="ml-3 text-sm font-medium"
          :class="`message-${type}`">
            {{ message }}
        </div>
        <button
          type="button" class="ml-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8"
          :class="`btn-${type}`"
          @click="$emit('close')">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</template>

<script>
  export default {
    props: {
      message: {
        type: String,
        default: null
      },
      type: {
        type: String,
        default: 'error'
      },
    },
    emits: ['close']
  }
</script>


<style scoped>
    .bg-success{
        @apply bg-green-100 dark:bg-green-200;
    }
    .icon-success{
        @apply text-green-700 dark:text-green-800;
    }
    .message-success{
        @apply text-green-700 dark:text-green-800;
    }
    .btn-success{
        @apply bg-green-100 text-green-500 focus:ring-green-400 hover:bg-green-200 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300;
    }

    .bg-error{
        @apply bg-red-100 dark:bg-red-200;
    }
    .icon-error{
        @apply text-red-700 dark:text-red-800;
    }
    .message-error{
        @apply text-red-700 dark:text-red-800;
    }
    .btn-error{
        @apply bg-red-100 text-red-500 focus:ring-red-400 hover:bg-red-200 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300;
    }

    .bg-info{
        @apply bg-indigo-100 dark:bg-indigo-200;
    }
    .icon-info{
        @apply text-indigo-700 dark:text-indigo-800;
    }
    .message-info{
        @apply text-indigo-700 dark:text-indigo-800;
    }
    .btn-info{
        @apply bg-indigo-100 text-indigo-500 focus:ring-indigo-400 hover:bg-indigo-200 dark:bg-indigo-200 dark:text-indigo-600 dark:hover:bg-indigo-300;
    }

</style>
