<script setup lang="ts">
import PromoSection from "@/Components/PromoSection.vue";
import Layout from "@/Layouts/Layout.vue";
import PopularProductList from "@/Components/PopularProductList.vue";

defineOptions({layout: Layout});
</script>

<template>
    <PromoSection/>
    <PopularProductList />
</template>
