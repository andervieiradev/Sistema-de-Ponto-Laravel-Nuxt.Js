<template>
    <span v-show="message" class="text-xs text-red-700">
        {{ message }}
    </span>
</template>

<script>
  export default {
      props: {
        message: {
          type: String,
          default: ''
        }
      }
  }
</script>
