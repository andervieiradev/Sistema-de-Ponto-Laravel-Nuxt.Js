<template>
<div class="py-12">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">


      <div>
          <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="md:col-span-1">
                  <div class="py-4 px-4 sm:px-0 text-center align-middle items-center">
                      <button
                        class="bg-transparent text-3xl hover:bg-sky-500 text-sky-700 font-semibold hover:text-white py-2 px-4 border border-sky-500 hover:border-transparent rounded"
                        @click="checkRegisterPoint">
                        Registre Seu Ponto
                      </button>
                  </div>
              </div>
            <div class="py-4 md:col-span-1">
                  <div class="px-4 sm:px-0 text-center">
                      <p class="text-2xl font-medium">{{ hourReal }}</p>
                      <p class="font-medium">{{ dateReal }}</p>
                  </div>
              </div>

          </div>

          <div class="hidden sm:block" aria-hidden="true">
              <div class="py-5 my-10">
                  <div class="border-t border-gray-200"></div>
              </div>
          </div>

          <div class="md:grid md:grid-cols-4 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-2">
              Selecione a Data:
              <Datepicker
                v-model="point_date"
                show-clear-button
                :range="false"
                type="datetime"
                lang="pt-br"
                format='dd-MMM-yyyy'
                first-day-of-week="monday"
                :date-format="{ day: '2-digit', month: '2-digit', year: 'numeric' }"
               />
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <ListPoint :date="filterDate" :points="points" />
            </div>
          </div>
      </div>


  </div>
</div>
</template>

<script>

export default {
  layout: 'Dashboard',
  middleware: ['isEmployee'],
  async asyncData({ $axios }) {
    return {
      points: await $axios.$get('/employee/point'),
    }
  },
  data() {
      return {
        hourReal: this.$moment().format("HH:mm:ss"),
        dateReal: this.$moment().format("DD/MM/YYYY"),
        point_date: new Date(),
      };
  },
  computed: {
    filterDate(){
      return this.$moment( this.point_date ).format("DD/MM/YYYY")
    }
  },
  watch: {
    filterDate: {
      deep: true,
      handler() {
        this.onSyncWithFilterDateInPoints(this.point_date)
      }
    }
  },
  mounted() {
      setInterval(() => {
          this.hourReal = this.$moment().format("HH:mm:ss")
      }, 1000)
  },
  methods: {
    async onSyncWithFilterDateInPoints(pointDate){
        this.points = await this.$axios.$get('/employee/point', {
          params: { pointDate }
        })
    },
    checkRegisterPoint(){
      this.$swal.fire({
          title: 'Registrar Ponto?',
          text: "Tem certeza que deseja registrar seu ponto agora?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Sim, Registrar!'
      }).then((result) => {
          if (result.isConfirmed) {
            this.onRegisterPoint();
          }
      })
    },
    async onRegisterPoint(){
      await this.$axios.post('/employee/point')
        .then(response => {
          this.$toast.success(response.data.message)

          this.point_date = new Date()

        }).catch(({ response }) => {
          this.$toast.error(response.data.message)
        })
    }
  }
}
</script>
