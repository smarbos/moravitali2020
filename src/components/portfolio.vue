<template>
    <div class="galeria">
      <div v-for="item in currentPage.child.items" :key="item.titulo">
        <p v-if="item.type === 'txt'" v-html="item.content"></p>
        <img v-if="item.type === 'img'" :src="'/'+item.content" />
        <ul>
          <span v-for="subitem in item.items" :key="subitem.nombre">
              <li>{{subitem.nombre}}</li>
          </span>
        </ul>
      </div>
    </div>
</template>

<script>
export default {
  name: 'portfolio',
  props: {
    currentPage: Object
  }
}
</script>

<style scoped>
.galeria {
    display: inline-flex;
}

.galeria {
    width: auto;
    margin-right: 20px;
    min-width: 20vw;
}

.galeria h3 {
    color: #f5f5f5;
    position: absolute;
    bottom: 15px;
    left: 15px;
    margin: 15px;
    margin-left: 30px;
    font-size: 2em;
}

.galeria p {
    min-width: 300px;
    margin: 0;
    margin-right:20px;
}
.galeria img {
    height: 82vh;
    margin:0;
    margin-right: 20px;
}
  .galeria {
    position:relative;
  }
</style>
