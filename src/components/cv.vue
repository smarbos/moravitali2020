<template>
    <div class="cv">
        <span v-for="item in currentPage.subItems" :key="item.anio">
            <h3>{{item.anio}}</h3>
            <span v-for="subitem in item.items" :key="subitem.nombre">
            <ul>
                <li>{{subitem.nombre}}</li>
            </ul>
            </span>
        </span>
    </div>
</template>

<script>
export default {
  name: 'cv',
  props: {
    currentPage: Object
  }
}
</script>

<style scoped>
.cv {
  margin-left: 20px;
}
.cv h3 {
  margin-top: 30px;
}
</style>
