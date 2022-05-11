<template>
<div class="py-12">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">


      <div>
          <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="md:col-span-1">
                  <div class="px-4 sm:px-0 text-center">
                      <p class="text-2xl font-medium">21:04:22</p>
                      <p class="font-medium">10 de Maio de 2022</p>
                  </div>
              </div>
              <div class="md:col-span-1">
                  <div class="px-4 sm:px-0 text-center items-center">
                      <button
                        class="bg-transparent text-3xl hover:bg-sky-500 text-sky-700 font-semibold hover:text-white py-2 px-4 border border-sky-500 hover:border-transparent rounded"
                        @click="checkRegisterPoint">
                        Registre Seu Ponto
                      </button>
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
              <ListPoint :points="points" />
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Calendar />
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
  data() {
      return {
        points: [],
        errors: null
      };
  },
  methods: {
    checkRegisterPoint(){
      this.$swal.fire({
                title: 'Registrar?',
                text: "Tem certeza que deseja registrar seu ponto?",
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
      await this.$axios.$post('/employee/newPoint')
        .then(response => {

          this.$toast.success(response.data.message)
          this.points.push(response.data.point);

        }).catch(({ response }) => {
          this.errors = response.data.message
        })
    }
  }
}
</script>
