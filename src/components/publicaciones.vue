<template>
    <div class="publicaciones">
      <div v-for="item in currentPage.subItems" :key="item.id" class="publicacion" v-bind:style="{ backgroundImage: 'url(' + '/' + item.img + ')' }">
        <a :href="item.link" class="box">
          <div class="overlay"></div>
          <h3>{{item.titulo}}</h3>
        </a>
      </div>
    </div>
</template>

<script>
export default {
  name: 'publicaciones',
  props: {
    currentPage: Object
  },
  data: function () {
    return {
    }
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
  .publicaciones,
  .publicacion {
    display: inline-block;
    width: 100%;
  }

  .publicacion {
    height: 250px;
    width: 250px;
    position: relative;
    background-position: center;
    background-size: cover;
    margin-right: 20px;
    margin-bottom: 15px;
    opacity: 1;
    @include for-tablet-landscape-up {
      opacity: 0.3;
      height: 250px !important;
      width: 250px !important;
    }
    @include for-tablet-portrait-up {
      opacity: 1;
      height: 200px;
      width: 300px;
    }
    @include for-desktop-up {
      opacity: 0.1 !important;
      height: 400px !important;
      width: 400px !important;
    }
  }

  .publicacion h3 {
    color: #f5f5f5;
    position: absolute;
    bottom: 15px;
    left: 15px;
    margin: 15px;
    margin-left: 15px;
    font-size: 2em;
    line-height:1.2em;
    @include for-tablet-portrait-up {
      font-size: 1.4em;
      margin: 10px;
      margin-left: 10px;
      bottom: 10px;
    }
  }
  .publicacion:hover h3{
    color: black;
  }
  .publicacion h3:hover h3{
    color: black;
  }

  .publicacion .overlay {
    background-color: black;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.5;
  }
  .publicacion:hover .overlay{
    opacity: 0.2;
    background-color: white;
  }
   .publicacion h3 .overlay:hover{
    opacity: 0.2;
    background-color: white;
  }

  .publicaciones img {
    width: 100%;
    margin:0;
  }

</style>
