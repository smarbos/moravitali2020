<template>
  <div id="app" ref="App">
    <sidebar
      :menuData="sideMenuData"
      v-on:updateContentPlease="updateContent($event)"
      v-on:updateTheme="changeTheme($event)">
    </sidebar>
    <contentViewer
      :currentPage="currentPage">
    </contentViewer>
  </div>
</template>

<script>
import sidebar from './components/sidebar.vue'
import contentViewer from './components/contentViewer.vue'
import estructura from './estructura.json'

export default {
  name: 'App',
  components: {
    sidebar,
    contentViewer
  },
  data () {
    return {
      sideMenuData: estructura,
      currentPage: estructura.home,
      whiteTheme: true
    }
  },
  methods: {
    toggleBodyClass (addRemoveClass, className) {
      const el = document.body

      if (addRemoveClass === 'addClass') {
        el.classList.add(className)
      } else {
        el.classList.remove(className)
      }
    },
    updateContent: function (contentId) {
      console.log('----- updateContent')
      const mainSection = contentId[0]
      const subSection = contentId[1]
      let childElements = {}
      console.log('mainSection: ' + mainSection)
      console.log('subSection: ' + subSection)
      const holder = estructura[mainSection]
      if (subSection) {
        console.log('has subsection')
        childElements = estructura[mainSection].subItems.find((subItem) => {
          return subItem.ref === subSection
        })
        holder.child = childElements
        console.log(childElements)
      }
      this.currentPage = holder
    },
    changeTheme: function () {
      console.log('switchTheme')
      this.whiteTheme = !this.whiteTheme
      if (this.whiteTheme) {
        this.toggleBodyClass('addClass', 'colores')
      } else {
        this.toggleBodyClass('removeClass', 'colores')
      }
    },
    handleScroll (event) {
      console.log(event)
      let delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)))
      delta = delta / -1
      console.log(delta)
      document.getElementById('contentViewer').scrollBy(delta * 100, 0)
    }
  },
  created () {
    window.addEventListener('mousewheel', this.handleScroll)
  },
  destroyed () {
    window.removeEventListener('mousewheel', this.handleScroll)
  },
  metaInfo: {
    title: 'Mora Vitali',
    titleTemplate: '%s ← Mora Vitali',
    meta: [
      { 'http-equiv': 'Content-Type', content: 'text/html; charset=utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { name: 'description', content: 'Sitio personal de Mora Vitali. Fotografía e investigación en artes.' },
      { property: 'og:title', content: 'Mora Vitali' },
      { property: 'og:site_name', content: 'Mora Vitali' },
      { property: 'og:type', content: 'website' },
      { property: 'og:url', content: 'https://www.my-site.com/my-special-page' }, // UPDATE THIS
      { property: 'og:image', content: 'https://www.my-site.com/my-special-image.jpg' }, // UPDATE THIS
      { property: 'og:description', content: 'Sitio personal de Mora Vitali. Fotografía e investigación en artes.' },
      { name: 'twitter:card', content: 'summary' },
      { name: 'twitter:site', content: 'https://www.my-site.com/my-special-page' },
      { name: 'twitter:title', content: 'Mora Vitali' },
      { name: 'twitter:description', content: 'Sitio personal de Mora Vitali. Fotografía e investigación en artes.' },
      { name: 'twitter:creator', content: '@alligatorio' }, // UPDATE THIS
      { name: 'twitter:image:src', content: 'https://www.my-site.com/my-special-image.jpg' }, // UPDATE THIS
      { itemprop: 'name', content: 'Mora Vitali' },
      { itemprop: 'description', content: 'Sitio personal de Mora Vitali. Fotografía e investigación en artes.' },
      { itemprop: 'image', content: 'https://www.my-site.com/my-special-image.jpg' } // UPDATE THIS
    ],
    link: [
      { rel: 'canonical', href: 'https://moravitali.com.ar/' }
    ]
  }
}
</script>

<style lang="scss">
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
#app {
  font-family: monospace;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: black;
  margin: 0;
}
p {
  line-height: 1.30em;
}
body.colores {
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>
