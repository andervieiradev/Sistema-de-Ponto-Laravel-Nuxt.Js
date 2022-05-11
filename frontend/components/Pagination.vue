/* eslint-disable vue/no-v-html */
<template>

  <div v-show="links.length > 3">
    <div class="flex flex-wrap -mb-1">


      <template v-for="(link, key) in links" >
        <div v-if="link.url === null" :key="`${key}-disabled`" class=" mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded hover:bg-gray-300" v-html="link.label"/>
        <div
          v-else
          :key="key"
          class="cursor-pointer mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-300 focus:border-sky-500 focus:text-sky-500" :class="{ 'bg-white': link.active }"
          @click="onChangePage(link.url)"
          >
          <span v-html="link.label"></span>
        </div>


      </template>
    </div>
  </div>
</template>

<script>

export default {

    props: {
      links: {
        type: Array,
        required: true,
      },
    },
    methods: {
      onChangePage(link){
        this.$emit('changePage', {
          link,
        })
      }
    }
}
</script>
