<template>
	<aside
    :class="{dropMobile: showMenu}"
    class="hidden sm:flex bg-gray-50 pt-3 h-full flex-col border-r border-gray-200 w250 overflow-x-hidden overflow-y-auto scrollbar scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 scrollbar-thumb-rounded scrollbar-thumb-rounded scrollbar-thumb-rounded-md"
    @click.stop="clickAsideCloseMenu">

    <ul class="pt-3 sm:pt-0" @click.stop="">

        <li class="menu">
            <NuxtLink
                to="/employee" :class="{ active : $nuxt.$route.path === '/employee'}"
                class="flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4">
                <svg xmlns="http://www.w3.org/2000/svg" class=" icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </NuxtLink>
        </li>

        <li class="menu">
            <NuxtLink
                to="/employee/changePassword" :class="{ active : $nuxt.$route.path === '/employee/changePassword'}"
                class="flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span class="ml-3">Alterar Senha</span>
            </NuxtLink>
        </li>

    </ul>
	</aside>
</template>

<script>
export default {
  props: {
      showMenu: Boolean
  },
  emits: ['showMenu'],
  data() {
      return {
          show: false
      }
  },
  methods: {
      clickAsideCloseMenu(){
          this.$emit('showMenu')
      }
  },
}
</script>


<style scoped>
    .dropMobile{
        @apply flex fixed z-10 w-full bg-gray-900 pt-0 bg-opacity-25;
    }
    .dropMobile ul{
        width: 250px;
        @apply bg-gray-50 border-r border-gray-200 overflow-x-hidden overflow-y-auto h-full ;

    }

    .icon{
        @apply h-5 w-5 duration-75;
    }
    .menu .active {
        @apply border-sky-900 text-sky-900 bg-gray-100 font-bold;
    }
    .menu a{
        @apply  flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4 border-sky-900  border-opacity-0;
    }

    .menu .dropdown{
        @apply bg-none;
    }

    .menu .dropdown ul li a{
        @apply pl-8;
    }

    .menu .dropdown .active{
        @apply bg-opacity-0 border-opacity-0  text-sky-900 font-bold;
    }

</style>
