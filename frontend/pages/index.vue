<template>
  <div>
    <div class="mb-3 text-center">
      <NuxtLink to="/admin/login" class="mt-3 sm:mt-0  inline-flex  leading-1 items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Login como Administrador</NuxtLink>
    </div>
    <div class="mb-3 text-center">
      <NuxtLink to="/employee/login" class="mt-3 sm:mt-0  inline-flex  leading-1 items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Login como Funcionário</NuxtLink>
    </div>

  </div>
</template>

<script>
export default {
    layout: "Onboarding",
    auth: false
}
</script>
