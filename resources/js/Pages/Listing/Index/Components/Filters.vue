<template>
<form @submit.prevent="filter">
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
        <div class="flex flex-nowrap items-center">
            <input type="text" placeholder="Price From" class="input-filter-l w-28" v-model.number="filterForm.priceFrom">
            <input v-model.number="filterForm.priceTo" type="text" placeholder="Price To" class="input-filter-r w-28">
        </div>
        <div class="flex flex-nowrap items-center">
            <select v-model.number="filterForm.beds" class="input-filter-l w-28">
                <option :value="null">Beds</option>
                <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                <option>6+</option>
            </select>
            <select v-model.number="filterForm.baths" class="input-filter-r w-28">
                <Option :value="null">Baths</Option>
                <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                <option>6+</option>
            </select>
        </div>
         <div class="flex flex-nowrap items-center">
            <input type="text" placeholder="Area From" class="input-filter-l w-28" v-model.number="filterForm.areaFrom">
            <input v-model.number="filterForm.areaTo" type="text" placeholder="Area To" class="input-filter-r w-28">
        </div>
        <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" @submit="clear">Clear</button>
       
    </div>
</form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

 const props = defineProps({
    filters: Object,
})
 
const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null,
});

const filter = () => {
    filterForm.get(route('listing.index'),
    {
        preserveState: true,
        preserveScroll: true,
    },
    )
}

const clear = () => {
    priceFrom: null
    priceTo: null
    beds: null
    baths: null
    areaFrom: null
    areaTo: null
    filter()
}

</script>