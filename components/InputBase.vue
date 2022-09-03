<template>
  <div>
      <label :for="name" class="block text-sm font-medium text-gray-700"> {{ label }}  </label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <input :id="name" :value="value" :type="type" :name="name" class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" :placeholder="placeholder" :required="required" :disabled="disabled" @input="$emit('input', $event.target.value)">
          <svg v-if="loading" class="animate-spin  m-2 h-5 w-5 text-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-80" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
      </div>
      <InputError :message="error[0]" />
  </div>
</template>

<script>
  export default {
      props: {
        name: {
          type: String,
          required: true,
          default: ''
        },
        type: {
          type: String,
          required: true,
          default: 'text'
        },
        label: {
          type: String,
          required: true,
          default: ''
        },
        value: {
          type: String,
          required: false,
          default: ''
        },
        placeholder: {
          type: String,
          required: true,
          default: ''
        },
        required: {
          type: Boolean,
          required: false,
          default: false
        },
        disabled: {
          type: Boolean,
          required: false,
          default: false
        },
        loading: {
          type: Boolean,
          required: false,
          default: false
        },
        error: {
          type: Array,
          required: false,
          default: Array
        },
      }
  }
</script>
