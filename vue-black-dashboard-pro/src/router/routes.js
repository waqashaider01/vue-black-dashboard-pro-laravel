import DashboardLayout from 'src/pages/Layout/DashboardLayout.vue';
import AuthLayout from 'src/pages/Pages/AuthLayout.vue';
// GeneralViews
import NotFound from 'src/pages/GeneralViews/NotFoundPage.vue';

// Calendar
const Calendar = () =>
  import(/* webpackChunkName: "extra" */ 'src/pages/Calendar/CalendarRoute.vue');
// Charts
const Charts = () =>
  import(/* webpackChunkName: "dashboard" */ 'src/pages/Charts.vue');

// Components pages
const Buttons = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/Buttons.vue');
const GridSystem = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/GridSystem.vue');
const Panels = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/Panels.vue');
const SweetAlert = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/SweetAlert.vue');
const Notifications = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/Notifications.vue');
const Icons = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/Icons.vue');
const Typography = () =>
  import(/* webpackChunkName: "components" */ 'src/pages/Components/Typography.vue');

//import middleware
import auth from "@/middleware/auth";
import guest from "@/middleware/guest";
import admin from "@/middleware/admin";
import admin_creator from "@/middleware/admin_creator";

// Dashboard pages
const Dashboard = () =>
  import(/* webpackChunkName: "dashboard" */ 'src/pages/Dashboard/Dashboard.vue');
import Widgets from 'src/pages/Widgets.vue';

// Forms pages
const RegularForms = () => import('src/pages/Forms/RegularForms.vue');
const ExtendedForms = () => import('src/pages/Forms/ExtendedForms.vue');
const ValidationForms = () => import('src/pages/Forms/ValidationForms.vue');
const Wizard = () => import('src/pages/Forms/Wizard.vue');

// Maps pages
const GoogleMaps = () =>
  import(/* webpackChunkName: "extra" */ 'src/pages/Maps/GoogleMaps.vue');
const FullScreenMap = () =>
  import(/* webpackChunkName: "extra" */ 'src/pages/Maps/FullScreenMap.vue');
const VectorMaps = () =>
  import(/* webpackChunkName: "extra" */ 'src/pages/Maps/VectorMaps.vue');

// Pages
const User = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/UserProfile.vue');
const Pricing = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/Pricing.vue');
const TimeLine = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/TimeLinePage.vue');
const Login = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/Login.vue');
const Register = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/Register.vue');
const RTL = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/RTLPage.vue');
const Lock = () =>
  import(/* webpackChunkName: "pages" */ 'src/pages/Pages/Lock.vue');
  const PasswordReset = () =>
  import(/* webpackChunkName: "password" */ "src/pages/Pages/Password/Reset.vue");
const PasswordEmail = () =>
  import(/* webpackChunkName: "password" */ "src/pages/Pages/Password/Email.vue");

// TableList pages
const RegularTables = () =>
  import(/* webpackChunkName: "tables" */ 'src/pages/Tables/RegularTables.vue');
const ExtendedTables = () =>
  import(/* webpackChunkName: "tables" */ 'src/pages/Tables/ExtendedTables.vue');
const PaginatedTables = () =>
  import(/* webpackChunkName: "tables" */ 'src/pages/Tables/PaginatedTables.vue');

// Example pages
const UserProfile = () => import('src/pages/Pages/Examples/UserProfile.vue');
// Role Management
const ListRolePage = () => import("src/pages/Pages/Examples/RoleManagement/ListRolePage.vue");
const AddRolePage = () => import ("src/pages/Pages/Examples/RoleManagement/AddRolePage.vue");
const EditRolePage = () => import ("src/pages/Pages/Examples/RoleManagement/EditRolePage.vue");
// User Management
const ListUserPage = () => import("src/pages/Pages/Examples/UserManagement/ListUserPage.vue");
const AddUserPage = () => import ("src/pages/Pages/Examples/UserManagement/AddUserPage.vue");
const EditUserPage = () => import ("src/pages/Pages/Examples/UserManagement/EditUserPage.vue");
// Category Management
const ListCategoryPage = () => import("src/pages/Pages/Examples/CategoryManagement/ListCategoryPage.vue");
const AddCategoryPage = () => import ("src/pages/Pages/Examples/CategoryManagement/AddCategoryPage.vue");
const EditCategoryPage = () => import ("src/pages/Pages/Examples/CategoryManagement/EditCategoryPage.vue");
// Tag Management
const ListTagPage = () => import("src/pages/Pages/Examples/TagManagement/ListTagPage.vue");
const AddTagPage = () => import ("src/pages/Pages/Examples/TagManagement/AddTagPage.vue");
const EditTagPage = () => import ("src/pages/Pages/Examples/TagManagement/EditTagPage.vue");
// Item Management
const ListItemPage = () => import("src/pages/Pages/Examples/ItemManagement/ListItemPage.vue");
const AddItemPage = () => import ("src/pages/Pages/Examples/ItemManagement/AddItemPage.vue");
const EditItemPage = () => import ("src/pages/Pages/Examples/ItemManagement/EditItemPage.vue");
let componentsMenu = {
  path: '/components',
  component: DashboardLayout,
  redirect: '/components/buttons',
  name: 'Components',
  children: [
    {
      path: 'buttons',
      name: 'Buttons',
      components: { default: Buttons }
    },
    {
      path: 'grid-system',
      name: 'Grid System',
      components: { default: GridSystem }
    },
    {
      path: 'panels',
      name: 'Panels',
      components: { default: Panels }
    },
    {
      path: 'sweet-alert',
      name: 'Sweet Alert',
      components: { default: SweetAlert }
    },
    {
      path: 'notifications',
      name: 'Notifications',
      components: { default: Notifications }
    },
    {
      path: 'icons',
      name: 'Icons',
      components: { default: Icons }
    },
    {
      path: 'typography',
      name: 'Typography',
      components: { default: Typography }
    }
  ]
};
let formsMenu = {
  path: '/forms',
  component: DashboardLayout,
  redirect: '/forms/regular',
  name: 'Forms',
  children: [
    {
      path: 'regular',
      name: 'Regular Forms',
      components: { default: RegularForms }
    },
    {
      path: 'extended',
      name: 'Extended Forms',
      components: { default: ExtendedForms }
    },
    {
      path: 'validation',
      name: 'Validation Forms',
      components: { default: ValidationForms }
    },
    {
      path: 'wizard',
      name: 'Wizard',
      components: { default: Wizard }
    }
  ]
};

let tablesMenu = {
  path: '/table-list',
  component: DashboardLayout,
  redirect: '/table-list/regular',
  name: 'Tables',
  children: [
    {
      path: 'regular',
      name: 'Regular Tables',
      components: { default: RegularTables }
    },
    {
      path: 'extended',
      name: 'Extended Tables',
      components: { default: ExtendedTables }
    },
    {
      path: 'paginated',
      name: 'Paginated Tables',
      components: { default: PaginatedTables }
    }
  ]
};

let mapsMenu = {
  path: '/maps',
  component: DashboardLayout,
  name: 'Maps',
  redirect: '/maps/google',
  children: [
    {
      path: 'google',
      name: 'Google Maps',
      components: { default: GoogleMaps }
    },
    {
      path: 'full-screen',
      name: 'Full Screen Map',
      meta: {
        hideContent: true,
        hideFooter: true
      },
      components: { default: FullScreenMap }
    },
    {
      path: 'vector-map',
      name: 'Vector Map',
      components: { default: VectorMaps }
    }
  ]
};

let pagesMenu = {
  path: '/pages',
  component: DashboardLayout,
  name: 'Pages',
  redirect: '/pages/user',
  children: [
    {
      path: 'user',
      name: 'User Page',
      components: { default: User }
    },
    {
      path: 'timeline',
      name: 'Timeline Page',
      components: { default: TimeLine }
    },
    {
      path: 'rtl',
      name: 'RTL Page',
      components: { default: RTL }
    }
  ]
};

let authPages = {
  path: "/",
  component: AuthLayout,
  name: "Authentication",
  children: [
    {
      path: "/login",
      name: "Login",
      component: Login,
      meta: { middleware: guest }
    },
    {
      path: "/register",
      name: "Register",
      component: Register,
      meta: { middleware: guest }
    },
    {
      path: "/password/reset",
      name: "Password Reset",
      component: PasswordReset,
      meta: { middleware: guest }
    },
    {
      path: "/password/email",
      name: "Password Reset",
      component: PasswordEmail,
      meta: { middleware: guest }
    },
    {
      path: "/pricing",
      name: "Pricing",
      component: Pricing
    },
    {
      path: "/lock",
      name: "Lock",
      component: Lock
    }
  ]
};

let examplesMenu = {
  path: "/examples",
  component: DashboardLayout,
  name: "Examples",
  children: [
    {
      path: "user-profile",
      name: "User Profile",
      components: { default: UserProfile },
      meta: { middleware: auth }
    },
    {
      path: "role-management/list-roles",
      name: "List Roles",
      components: { default: ListRolePage },
      meta: { middleware: auth }
    },
    {
      path: "role-management/add-role",
      name: "Add Role",
      components: { default: AddRolePage },
      meta: { middleware: auth }
    },
    {
      path: "role-management/edit-role/:id",
      name: "Edit Role",
      components: { default: EditRolePage },
      meta: { middleware: auth }
    },
    {
      path: "user-management/list-users",
      name: "List Users",
      components: { default: ListUserPage },
      meta: { middleware: auth }
    },
    {
      path: "user-management/add-user",
      name: "Add User",
      components: { default: AddUserPage },
      meta: { middleware: auth }
    },
    {
      path: "user-management/edit-user/:id",
      name: "Edit User",
      components: { default: EditUserPage },
      meta: { middleware: auth }
    },
    {
      path: "category-management/list-categories",
      name: "List Categories",
      components: { default: ListCategoryPage },
      meta: { middleware: admin_creator }
    },
    {
      path: "category-management/add-category",
      name: "Add Category",
      components: { default: AddCategoryPage },
      meta: { middleware: admin_creator }
    },
    {
      path: "category-management/edit-category/:id",
      name: "Edit Category",
      components: { default: EditCategoryPage },
      meta: { middleware: admin_creator }
    },
    {
      path: "tag-management/list-tags",
      name: "List Tags",
      components: { default: ListTagPage },
      meta: { middleware: auth }
    },
    {
      path: "tag-management/add-tag",
      name: "Add Tag",
      components: { default: AddTagPage },
      meta: { middleware: auth }
    },
    {
      path: "tag-management/edit-tag/:id",
      name: "Edit Tag",
      components: { default: EditTagPage },
      meta: { middleware: auth }
    },
    {
      path: "item-management/list-items",
      name: "List Items",
      components: { default: ListItemPage },
      meta: { middleware: auth }
    },
    {
      path: "item-management/add-item",
      name: "Add Item",
      components: { default: AddItemPage },
      meta: { middleware: auth }
    },
    {
      path: "item-management/edit-item/:id",
      name: "Edit Item",
      components: { default: EditItemPage },
      meta: { middleware: auth }
    },
  ]
};
// let authPages = {
//   path: '/',
//   component: AuthLayout,
//   name: 'Authentication',
//   children: [
//     {
//       path: '/login',
//       name: 'Login',
//       component: Login
//     },
//     {
//       path: '/register',
//       name: 'Register',
//       component: Register
//     },
//     {
//       path: '/pricing',
//       name: 'Pricing',
//       component: Pricing
//     },
//     {
//       path: '/lock',
//       name: 'Lock',
//       component: Lock
//     }
//   ]
// };

const routes = [
  {
    path: '/',
    redirect: '/dashboard',
    name: 'Home'
  },
  componentsMenu,
  formsMenu,
  tablesMenu,
  mapsMenu,
  pagesMenu,
  authPages,
  examplesMenu,
  {
    path: '/',
    component: DashboardLayout,
    redirect: '/dashboard',
    name: 'Dashboard layout',
    meta: { middleware: auth },
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        components: { default: Dashboard },
        meta: { middleware: auth }
      },
      {
        path: 'calendar',
        name: 'Calendar',
        components: { default: Calendar },
        meta: { middleware: auth }
      },
      {
        path: 'charts',
        name: 'Charts',
        components: { default: Charts },
        meta: { middleware: auth }
      },
      {
        path: 'widgets',
        name: 'Widgets',
        components: { default: Widgets },
        meta: { middleware: auth }
      }
    ]
  },
  // { path: '*', component: NotFound }
];

export default routes;
