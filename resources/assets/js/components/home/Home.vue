<template>
    <div>
        <sliderHome></sliderHome>
        <searchHome></searchHome>
    </div>
</template>
<script>
    import sliderHome from './Slider.vue'
    import searchHome from './Search.vue'
    export default {
        components: {
            sliderHome: sliderHome,
            searchHome: searchHome
        }
    }
</script>