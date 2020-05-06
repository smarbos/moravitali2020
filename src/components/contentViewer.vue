<template>
  <div class="contentViewer" id="contentViewer">
    <div class="titlecontainer">
      <h2 v-if="currentPage.name && currentPage.name !== 'home'" v-html="currentPage.name"></h2><span v-if="currentPage.child"> > <h3>{{currentPage.child.name}}</h3></span>
    </div>
    <div class="contentContainer">
      <div v-if="currentPage.name === 'home'" class="home">
        <span v-if="currentPage.content" v-html="currentPage.content"></span>
      </div>

      <bio v-if="currentPage.name === 'bio'" :currentPage="currentPage"></bio>

      <cv v-if="currentPage.name === 'cv'" :currentPage="currentPage"></cv>

      <contacto v-if="currentPage.name === 'contacto'" :currentPage="currentPage"></contacto>

      <portfolio v-if="currentPage.name === 'portfolio'" :currentPage="currentPage"></portfolio>

      <publicaciones v-if="currentPage.name === 'publicaciones'" :currentPage="currentPage"></publicaciones>
    </div>
  </div>
</template>

<script>
import bio from './bio.vue'
import contacto from './contacto.vue'
import portfolio from './portfolio.vue'
import publicaciones from './publicaciones.vue'
import cv from './cv.vue'

export default {
  name: 'contentViewer',
  components: {
    bio,
    contacto,
    portfolio,
    publicaciones,
    cv
  },
  props: {
    currentPage: Object
  }
}
</script>

<style lang="scss" scoped>
@mixin for-phone-only {
  @media (max-width: 599px) { @content; }
}
@mixin for-tablet-portrait-up {
  @media (min-width: 600px) { @content; }
}
@mixin for-tablet-landscape-up {
  @media (min-width: 900px) { @content; }
}
@mixin for-desktop-up {
  @media (min-width: 1200px) { @content; }
}
@mixin for-big-desktop-up {
  @media (min-width: 1800px) { @content; }
}
  .contentContainer {
    margin-top: 47px;
  }
  .contentViewer {
    float: left;
    text-align: left;
    padding-top: 41px;
    padding-right: 25px;
    line-height: 1.4em !important;
    position: absolute;
    right: 0;
    width: auto;
    top: 0;
    bottom: 0;
    left: 200px;
    overflow-x: auto;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    @include for-tablet-landscape-up {
      left: 300px !important;
    }
  }

  .titlecontainer {
    position: fixed;
  }
  .titlecontainer h2,
  .titlecontainer h3 {
  display: inline-block;
  margin-bottom:0;
  }

  .titlecontainer h2 {
    font-size: 1.2em
  }
  .titlecontainer h3 {
    font-size: 1.5em
  }

  h1, h2, h3, h4, h5 {
    margin-top: 0;
    text-transform: capitalize;
  }

  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align:left;
  }

  li {
    margin-left:50px;
    margin-bottom:5px;
  }
  a {
    color: #42b983;
  }
</style>
