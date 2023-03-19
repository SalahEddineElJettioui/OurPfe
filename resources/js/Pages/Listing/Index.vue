<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
  </div>

  <Pagination :links="listings.links" class="w-full flex justify-center rounded-md mt-8 mb-8"/>
</template>

<script setup>
import Pagination from '@/Components/UI/Pagination.vue';
import Listing from '@/Pages/Listing/Index/Components/Listing.vue'
defineProps({
  listings: Object,
})
</script>