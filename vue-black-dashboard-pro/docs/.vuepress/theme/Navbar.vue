<template>
  <base-nav :transparent="false"
          v-model="showMenu"
          type="vue"
          menu-classes="justify-content-end"
          class="main-nav fixed-top">
    <div slot="brand" class="navbar-wrapper">
      <div
        class="navbar-toggle d-inline"
        :class="{ toggled: $sidebar.showSidebar }"
      >
        <button type="button" class="navbar-toggler" @click="toggleSidebar">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a href="/" class="navbar-brand mr-0 mr-md-2">
        Vue Black Dashboard Pro Laravel
      </a>
    </div>
     <ul class="navbar-nav flex-row mr-auto d-none d-md-flex">
        <li class="nav-item">
          <a
            class="nav-link"
            href="https://www.creative-tim.com/product/vue-black-dashboard-laravel"
            target="_blank"
            >Free Version</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="https://explore.postman.com/api/6357/laravel-jsonapi"
            target="_blank"
            >API Docs</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="https://github.com/creativetimofficial/ct-vue-black-dashboard-pro-laravel/issues"
            target="_blank"
            >Support</a
          >
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.creative-tim.com/product/vue-black-dashboard-pro-laravel">Buy Now</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="https://github.com/creativetimofficial/vue-black-dashboard-laravel" target="_blank" rel="noopener">Help with a star</a>
          </li> -->
        </ul>

    <ul class="navbar-nav ml-auto">
      <div class="d-flex">
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank">
            <i class="fab fa-facebook-square"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial"
             target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial"
             target="_blank">
            <i class="fab fa-dribbble"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://www.github.com/creativetimofficial"
             target="_blank">
            <i class="fab fa-github"></i>
          </a>
        </li>
      </div>
      <!-- <div class="d-flex">
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/vue-black-dashboard-pro"><i
            class="tim-icons icon-tv-2"></i> Live Preview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/vue-black-dashboard/" target="_blank" rel="noopener">
            <i class="tim-icons icon-shape-star"></i> Free Version</a>
        </li>
      </div> -->

    </ul>
    <form class="form-inline" @submit.prevent="">
      <SearchBox />
    </form>
  </base-nav>
</template>
<script>
  import SearchBox from '@SearchBox'

  export default {
    components: {
      SearchBox
    },
    data() {
      return {
        showMenu: false
      }
    },
    methods: {
      toggleSidebar() {
        this.$emit('toggle-sidebar')
      }
    }
  }
</script>
<style lang="scss">
  .navbar.main-nav {
    z-index: 2000;
    height: initial;
    top: 0;
  }

  .navbar .search-box input {
    width: 190px;
    left: 0;
  }
</style>
