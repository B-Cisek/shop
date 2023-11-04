<script setup lang="ts">
import PromoSection from "@/Components/PromoSection.vue";
import Layout from "@/Layouts/Layout.vue";
import PopularProductList from "@/Components/PopularProductList.vue";
import CategoryPreviews from "@/Components/CategoryPreviews.vue";
import CategoryFilters from "@/Components/CategoryFilters.vue";

defineOptions({layout: Layout});
</script>

<template>
    <PromoSection/>
    <CategoryFilters />
</template>
