<template>
    <div class="bio">
        <p v-if="currentPage.content" v-html="currentPage.content"></p>
    </div>
</template>

<script>
export default {
  name: 'bio',
  props: {
    currentPage: Object
  }
}
</script>

<style scoped>
  .bio {
    max-width: 900px;
  }
  .bio a {
    text-decoration: none !important;
    font-weight: bolder !important;
  }
</style>
