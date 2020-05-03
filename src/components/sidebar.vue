<template>
  <div class="sidebar">
    <a href="#"
      rel="noopener"
      @click="$emit('updateContentPlease', ['home'])">
        <h1>Mora Vitali</h1>
    </a>
      <ul>
      <li v-for="data in menuData"
        :key="data.name">
          <a href="#"
            rel="noopener"
            @click="$emit('updateContentPlease', [data.ref])"><strong v-if="data.name !== 'home'">{{data.name}}</strong></a>
            <ul v-if="data.subMenu === true">
              <li v-for="subitem in data.subItems" :key="subitem.ref">
              <a href="#"
                rel="noopener"
                @click="$emit('updateContentPlease', [data.ref, subitem.ref])">{{subitem.name}}</a>
              </li>
            </ul>
      </li>
    </ul>
    <a href="https://www.instagram.com/hagia_mora/" target="_blank" id="instagramLogo">
      <img src="/img/instagram.png" width="25px" height="25px" />
    </a>
  </div>
</template>

<script>
export default {
  name: 'sidebar',
  props: {
    msg: String,
    menuData: Object
  },
  data: function () {
    return {
    }
  },
  computed: {
    getMenuData: function () {
      const menu = []
      Object.keys(this.menuData).forEach((el) => {
        menu[el] = {}
        if (this.menuData[el].subMenu) {
          this.menuData[el].subItems.forEach((subitem) => {
            menu[el][subitem.ref] = subitem.name
          })
        }
      })
      console.log('-------')
      console.log(menu)
      console.log('-------')
      return menu
    }
  },
  methods: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#instagramLogo {
  margin-left: 15px;
  opacity: 0.7;
}
.sidebar {
  width: 16%;
  float: left;
  text-align: left;
  height: 97vh;
  z-index: 999;
  position: fixed;
  padding-left: 25px;
  left: 0;
  top: 50px;
}
a {
  color: inherit;
  text-decoration: none;
  text-transform: capitalize;
}
h1 {
  margin: 0;
  margin-left: 10px;
  font-size: 2.5em;
  margin-bottom: 25px;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: block;
  margin: 12px;
}
</style>
