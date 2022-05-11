<template>
  <div class="bg-white px-3 rounded-t shadow-lg dark:bg-gray-900  py-4">
      <div class="mt-1 overflow-x-auto">
          <h1 class="mb-3 text-xl text-center font-medium">Pontos Registrados Para o dia {{ date }}</h1>

          <div
            v-for="point in points" :key="point.id"
            class="mb-3 flex items-center pl-5 focus:outline-none h-16 border border-gray-100 dark:border-gray-600  rounded">
            <p class="w-full text-center text-2xl font-medium leading-none text-gray-700 dark:text-white  mr-2">
              {{ point.point_date }}
            </p>
          </div>

      </div>
  </div>

</template>

<script>
  export default {
    props: {
      points: {
        type: Object,
        default: null
      },
      date: {
        type: String,
        default: ''
      }
    },
  }
</script>
