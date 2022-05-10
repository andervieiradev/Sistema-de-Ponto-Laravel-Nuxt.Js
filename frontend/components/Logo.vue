<template>
    <h1 class="logo">{{ $config.APP_NAME}}</h1>
</template>

<script>
export default {
  name: 'LogoComponent'
}
</script>

<style scoped>
    .logo{
        @apply h-full;
    }
</style>
