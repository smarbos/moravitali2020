<template>
    <div class="publicaciones">
      <div v-for="item in currentPage.subItems" :key="item.id" class="publicacion">
        <a :href="item.link" class="box">
          <div class="overlay"></div>
          <img :src="'/'+item.img" />
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
    display: inline-flex;
  }

  .publicacion {
    width: auto;
    margin-right: 20px;
    min-width: 20vw;
  }

  .publicacion h3 {
    color: #f5f5f5;
    position: absolute;
    bottom: 15px;
    left: 15px;
    margin: 15px;
    margin-left: 30px;
    font-size: 2em;
  }

  .publicacion .overlay {
    background-color: black;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 3px;
    opacity: 0.5;
  }
  .publicacion:hover h3{
    color: black;
  }
  .publicacion .overlay:hover {
    opacity: 0.2;
    background-color: white;
  }
  .publicacion img {
    filter: grayscale(100%) saturate(-50) hue-rotate(320deg);
    -webkit-filter: grayscale(100%) saturate(-50) hue-rotate(320deg);
  }
  .publicaciones img {
    height: 75vh;
    margin:0;
  }
  .publicacion {
    position:relative;
  }
</style>
