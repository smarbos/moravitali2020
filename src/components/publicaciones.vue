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

<style scoped>
.publicaciones,
  .publicacion {
    margin: 20px 0;
    display: inline-block;
    width: 100%;
  }

  .publicacion {
    width: 350px;
    margin-right: 20px;
    position: relative;
    height: 350px;
    background-position: center;
    background-size: cover;
    margin-bottom: 0;
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
