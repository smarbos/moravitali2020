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
      <img src="img/instagram.png" width="25px" height="25px" />
    </a>
    <h5 id="themeSwitch" @click="$emit('updateTheme')">
    <span v-if="this.$parent.whiteTheme">¿Menos colores?</span>
    <span v-if="!this.$parent.whiteTheme">¡Mas colores!</span>
    </h5>
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
      switch: true
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
      return menu
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
#themeSwitch {
  position:fixed;
  bottom: 10px;
  left:30px;
  font-size:1em;
  cursor: pointer;
}
#instagramLogo {
  margin-left: 15px;
  opacity: 0.7;
}
.sidebar {
  width: 200px;
  float: left;
  text-align: left;
  z-index: 999;
  position: fixed;
  padding-left: 25px;
  padding-right: 25px;
  left: 0;
  top: 0px;
  bottom: 0;
  box-sizing: border-box;
  background-color: white;
  @include for-tablet-landscape-up {
    width: 300px;
  }
}
.colores .sidebar {
  background-color: transparent !important;
}
a {
  color: inherit;
  text-decoration: none;
  text-transform: capitalize;
}
h1 {
  margin: 0;
  margin-top:25px;
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
