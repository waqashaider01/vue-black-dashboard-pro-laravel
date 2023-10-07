<template>
    <div class="theme-container ct-documentation bd-docs"
         :class="{ 'nav-open': $sidebar.showSidebar }"
    >
        <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
        <notifications></notifications>
        <div
                class="sidebar-mask"
                @click="toggleSidebar(false)"
        ></div>

        <Sidebar
                class="docs-sidebar"
                :items="sidebarItems"
                @toggle-sidebar="toggleSidebar"
        >
            <slot
                    name="sidebar-top"
                    slot="top"
            />
            <slot
                    name="sidebar-bottom"
                    slot="bottom"
            />
        </Sidebar>

        <div
                class="custom-layout"
                v-if="$page.frontmatter.layout"
        >
            <component :is="$page.frontmatter.layout"/>
        </div>

        <Home v-else-if="$page.frontmatter.home"/>

        <Page class="custom-page"
                v-else
                :sidebar-items="sidebarItems"
        >
            <slot
                    name="page-top"
                    slot="top"
            />
            <slot
                    name="page-bottom"
                    slot="bottom"
            />
        </Page>

    </div>
</template>
<script>
  import Navbar from './Navbar';
  import Sidebar from '../../node_modules/@vuepress/theme-default/components/Sidebar';
  import Home from '../../node_modules/@vuepress/theme-default/components/Home';
  import Page from '../../node_modules/@vuepress/theme-default/components/Page';
  import {resolveSidebarItems} from '../../node_modules/@vuepress/theme-default/util/index';
  import 'prismjs/themes/prism-tomorrow.css';
  import './styles/theme.styl';

  export default {
    components: {
      Navbar,
      Sidebar,
      Home,
      Page
    },
    data() {
      return {
        isSidebarOpen: false,
      }
    },
    computed: {
      sidebarItems () {
        return resolveSidebarItems(
          this.$page,
          this.$route,
          this.$site,
          this.$localePath
        )
      },
    },
    methods: {
      toggleSidebar (value) {
        if(value !== undefined) {
          this.$sidebar.displaySidebar(value);
        } else {
          this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
        }
      }
    }
  }
</script>
<style>
    .page .theme-default-content:not(.custom) {
        margin-top: 70px;
    }
    .page.custom-page .content{
        margin: 60px 20px 20px;
        max-width: 100%;
    }
    .highlight pre[class*=language-] code, .highlight pre code {
        color: #fff;
        padding: 0;
        background-color: transparent;
        border-radius: 0;
    }

</style>
