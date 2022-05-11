<template>
	<aside
    :class="{dropMobile: showMenu}"
    class="hidden sm:flex bg-gray-50 pt-3 h-full flex-col border-r border-gray-200 w250 overflow-x-hidden overflow-y-auto scrollbar scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 scrollbar-thumb-rounded scrollbar-thumb-rounded scrollbar-thumb-rounded-md"
    @click.stop="clickAsideCloseMenu">

    <ul class="pt-3 sm:pt-0" @click.stop="">

        <li class="menu">
            <NuxtLink
                to="/admin" :class="{ active : $nuxt.$route.path === '/admin'}"
                class="flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4">
                <svg xmlns="http://www.w3.org/2000/svg" class=" icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </NuxtLink>
        </li>

        <li class="menu">
            <NuxtLink
                to="/dashboard" :class="{ active : $nuxt.$route.path == '/dashboard2'}"
                class="flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="ml-3 w-full">Produtos</span>

                <span class="text-right">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" data-v-6390c946="">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" data-v-6390c946=""></path>
                    </svg>
                </span>
            </NuxtLink>
            <div class="dropdown dropdown-active">
                <ul class="menu-sub">
                    <li>
                        <a href="#" class="link-sublist">
                            Listar Produtos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-sublist">
                            Criar Produto
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-sublist">
                            Categorias
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="menu">
            <NuxtLink
                to="/settings"
                :class="{ active : $nuxt.$route.path.includes('/settings') }"

                class="flex items-center p-3 px-5 text-sm font-medium text-gray-500 hover:text-gray-800 border-l-4">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="ml-3 w-full">Configurações</span>

                    <span
                        class="text-right"
                        :class="{'rotate-180' : !$nuxt.$route.path.includes('/settings')}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" data-v-6390c946="">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" data-v-6390c946=""></path>
                        </svg>
                    </span>
            </NuxtLink>

            <div v-if="$nuxt.$route.path.includes('/settings')" class="dropdown">
                <ul class="menu-sub">
                    <li>
                        <NuxtLink to="/settings/domain" :class="{ active : $nuxt.$route.path == '/settings/domain'}" class="link-sublist">
                            Domínios
                        </NuxtLink>
                    </li>
                </ul>
            </div>
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
