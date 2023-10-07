<template>
  <div class="fixed-plugin" v-click-outside="closeDropDown">
    <div class="dropdown show-dropdown" :class="{ show: isOpen }">
      <a data-toggle="dropdown" class="settings-icon">
        <i class="fa fa-cog fa-2x" @click="toggleDropDown"> </i>
      </a>
      <ul class="dropdown-menu" :class="{ show: isOpen }">
        <li class="header-title">Sidebar Background</li>
        <li class="adjustments-line">
          <a class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span
                v-for="item in sidebarColors"
                :key="item.color"
                class="badge filter"
                :class="[`badge-${item.color}`, { active: item.active }]"
                :data-color="item.color"
                @click="changeSidebarBackground(item);"
              ></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>

        <li class="header-title">Sidebar Mini</li>
        <li class="adjustments-line">
          <div class="togglebutton switch-sidebar-mini">
            <span class="label-switch">OFF</span>
            <base-switch
              v-model="sidebarMini"
              @input="minimizeSidebar"
            ></base-switch>
            <span class="label-switch label-right">ON</span>
          </div>
        </li>

        <li class="button-container mt-4">
          <a
            href="https://vue-black-dashboard-pro-laravel.creative-tim.com/documentation/"
            target="_blank"
            rel="noopener"
            class="btn btn-default btn-block btn-round"
          >
            Documentation
          </a>
          <a
            href="https://www.creative-tim.com/product/vue-black-dashboard-pro-laravel"
            target="_blank"
            rel="noopener"
            class="btn btn-primary btn-block btn-round"
          >
            Buy now
          </a>
          <a
            href="https://www.creative-tim.com/product/vue-black-dashboard-laravel"
            target="_blank"
            rel="noopener"
            class="btn btn-info btn-block btn-round"
          >
            Free Version
          </a>
          <a
            href="https://github.com/creativetimofficial/ct-vue-black-dashboard-pro-laravel"
            target="_blank"
            rel="noopener"
            class="btn btn-default btn-block btn-round"
          >
            Star on github
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
  import { BaseSwitch } from 'src/components';

  export default {
    name: 'sidebar-share',
    components: {
      BaseSwitch
    },
    props: {
      backgroundColor: String
    },
    data() {
      return {
        sidebarMini: true,
        darkMode: true,
        isOpen: false,
        sidebarColors: [
          { color: 'primary', active: false, value: 'primary' },
          { color: 'vue', active: true, value: 'vue' },
          { color: 'info', active: false, value: 'blue' },
          { color: 'success', active: false, value: 'green' },
          { color: 'warning', active: false, value: 'orange' },
          { color: 'danger', active: false, value: 'red' }
        ]
      };
    },
    methods: {
      toggleDropDown() {
        this.isOpen = !this.isOpen;
      },
      closeDropDown() {
        this.isOpen = false;
      },
      toggleList(list, itemToActivate) {
        list.forEach(listItem => {
          listItem.active = false;
        });
        itemToActivate.active = true;
      },
      changeSidebarBackground(item) {
        this.$emit('update:backgroundColor', item.value);
        this.toggleList(this.sidebarColors, item);
      },
      minimizeSidebar() {
        this.$sidebar.toggleMinimize();
      }
    }
  };
</script>
<style scoped lang="scss">
  @import '~@/assets/sass/dashboard/custom/variables';

  .settings-icon {
    cursor: pointer;
  }

  .badge-vue {
    background-color: $vue;
  }
</style>
